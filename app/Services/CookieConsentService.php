<?php

namespace App\Services;

use App\Models\CookieConsent;
use Illuminate\Http\Request;

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
            'hostname' => $request->getHost(),
            'consent_type' => $consentType,
            'consent_details' => $details,
            'expires_at' => now()->addDays((int) config('cookie-consent.cookie_lifetime', 365)),
        ]);
    }

    /**
     * Get latest consent for current IP address and hostname
     */
    public function getLatestConsent(Request $request): ?CookieConsent
    {
        return CookieConsent::active()
            ->byIpAndHostname($request->ip(), $request->getHost())
            ->latest()
            ->first();
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

        // Apply hostname filter if provided
        if (isset($filters['hostname'])) {
            $query->where('hostname', $filters['hostname']);
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
     * Export consent data for compliance requests by IP address
     */
    public function exportConsentsByIp(string $ipAddress): array
    {
        return CookieConsent::byIp($ipAddress)
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function ($consent) {
                return [
                    'date' => $consent->created_at->format('Y-m-d H:i:s'),
                    'consent_type' => $consent->consent_type,
                    'details' => $consent->consent_details,
                    'hostname' => $consent->hostname,
                    'expires_at' => $consent->expires_at->format('Y-m-d H:i:s'),
                ];
            })
            ->toArray();
    }

    /**
     * Get unique hostnames with consent data
     */
    public function getHostnameStatistics(): array
    {
        return CookieConsent::selectRaw('
                hostname,
                COUNT(*) as total,
                SUM(CASE WHEN consent_type = "accepted" THEN 1 ELSE 0 END) as accepted,
                SUM(CASE WHEN consent_type = "rejected" THEN 1 ELSE 0 END) as rejected
            ')
            ->whereNotNull('hostname')
            ->groupBy('hostname')
            ->orderBy('total', 'desc')
            ->get()
            ->map(function ($stat) {
                return [
                    'hostname' => $stat->hostname,
                    'total' => $stat->total,
                    'accepted' => $stat->accepted,
                    'rejected' => $stat->rejected,
                    'acceptance_rate' => $stat->total > 0 ? round(($stat->accepted / $stat->total) * 100, 2) : 0,
                ];
            })
            ->toArray();
    }
}
