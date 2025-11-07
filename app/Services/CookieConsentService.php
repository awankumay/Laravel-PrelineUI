<?php

namespace App\Services;

use App\Models\CookieConsent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CookieConsentService
{
    /**
     * Record cookie consent in database
     */
    public function recordConsent(Request $request, string $consentType, array $details = []): CookieConsent
    {
        return CookieConsent::create([
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'user_id' => Auth::id(),
            'consent_type' => $consentType,
            'consent_details' => $details,
            'session_id' => $request->hasSession() ? $request->session()->getId() : null,
            'expires_at' => now()->addDays((int) config('cookie-consent.cookie_lifetime', 365)),
        ]);
    }

    /**
     * Get latest consent for current user/IP
     */
    public function getLatestConsent(Request $request): ?CookieConsent
    {
        $query = CookieConsent::active()->latest();

        if (Auth::check()) {
            return $query->byUser(Auth::id())->first();
        }

        return $query->byIp($request->ip())->first();
    }

    /**
     * Check if user has accepted cookies (from database)
     */
    public function hasAcceptedFromDatabase(Request $request): bool
    {
        $consent = $this->getLatestConsent($request);

        return $consent && $consent->isAccepted();
    }

    /**
     * Check if user has rejected cookies (from database)
     */
    public function hasRejectedFromDatabase(Request $request): bool
    {
        $consent = $this->getLatestConsent($request);

        return $consent && $consent->isRejected();
    }

    /**
     * Get consent statistics
     */
    public function getConsentStatistics(array $filters = []): array
    {
        $query = CookieConsent::query();

        // Apply date filters
        if (isset($filters['from'])) {
            $query->where('created_at', '>=', $filters['from']);
        }

        if (isset($filters['to'])) {
            $query->where('created_at', '<=', $filters['to']);
        }

        $total = $query->count();
        $accepted = $query->clone()->accepted()->count();
        $rejected = $query->clone()->rejected()->count();

        return [
            'total' => $total,
            'accepted' => $accepted,
            'rejected' => $rejected,
            'acceptance_rate' => $total > 0 ? round(($accepted / $total) * 100, 2) : 0,
            'rejection_rate' => $total > 0 ? round(($rejected / $total) * 100, 2) : 0,
        ];
    }

    /**
     * Clean expired consents
     */
    public function cleanExpiredConsents(): int
    {
        return CookieConsent::where('expires_at', '<', now())->delete();
    }

    /**
     * Export consent data for GDPR requests
     */
    public function exportUserConsents(int $userId): array
    {
        return CookieConsent::byUser($userId)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($consent) {
                return [
                    'date' => $consent->created_at->format('Y-m-d H:i:s'),
                    'consent_type' => $consent->consent_type,
                    'details' => $consent->consent_details,
                    'ip_address' => $consent->ip_address,
                    'expires_at' => $consent->expires_at->format('Y-m-d H:i:s'),
                ];
            })
            ->toArray();
    }
}
