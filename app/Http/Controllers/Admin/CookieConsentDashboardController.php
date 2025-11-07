<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\CookieConsentService;
use Illuminate\Http\Request;

class CookieConsentDashboardController extends Controller
{
    public function __construct(
        private CookieConsentService $consentService
    ) {}

    /**
     * Display cookie consent analytics dashboard
     */
    public function index(Request $request)
    {
        // Check if analytics is enabled
        if (! config('cookie-consent.enable_analytics', false)) {
            abort(404, 'Cookie consent analytics is disabled');
        }

        // Get date range from request
        $from = $request->get('from', now()->subMonth()->format('Y-m-d'));
        $to = $request->get('to', now()->format('Y-m-d'));

        // Get statistics
        $stats = $this->consentService->getConsentStatistics([
            'from' => $from,
            'to' => $to,
        ]);

        // Get recent consents
        $recentConsents = \App\Models\CookieConsent::whereBetween('created_at', [$from, $to])
            ->latest()
            ->limit(10)
            ->get();

        // Get daily statistics for chart
        $dailyStats = \App\Models\CookieConsent::selectRaw('
                DATE(created_at) as date,
                COUNT(*) as total,
                SUM(CASE WHEN consent_type = "accepted" THEN 1 ELSE 0 END) as accepted,
                SUM(CASE WHEN consent_type = "rejected" THEN 1 ELSE 0 END) as rejected
            ')
            ->whereBetween('created_at', [$from, $to])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Get hostname statistics
        $hostnameStats = $this->consentService->getHostnameStatistics();

        return view('admin.cookie-consent.dashboard', compact(
            'stats',
            'recentConsents',
            'dailyStats',
            'hostnameStats',
            'from',
            'to'
        ));
    }

    /**
     * Export consent data
     */
    public function export(Request $request)
    {
        $from = $request->get('from', now()->subMonth()->format('Y-m-d'));
        $to = $request->get('to', now()->format('Y-m-d'));

        $consents = \App\Models\CookieConsent::whereBetween('created_at', [$from, $to])
            ->orderBy('created_at', 'desc')
            ->get();

        $filename = 'cookie-consents-'.$from.'-to-'.$to.'.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
        ];

        $callback = function () use ($consents) {
            $file = fopen('php://output', 'w');

            // CSV Headers
            fputcsv($file, [
                'ID',
                'Date',
                'IP Address',
                'Hostname',
                'Consent Type',
                'Analytics',
                'Marketing',
                'Personalization',
                'User Agent',
                'Expires At',
            ]);

            // Data rows
            foreach ($consents as $consent) {
                fputcsv($file, [
                    $consent->id,
                    $consent->created_at->format('Y-m-d H:i:s'),
                    $consent->ip_address,
                    $consent->hostname ?? 'N/A',
                    $consent->consent_type,
                    $consent->consent_details['analytics'] ?? 'N/A',
                    $consent->consent_details['marketing'] ?? 'N/A',
                    $consent->consent_details['personalization'] ?? 'N/A',
                    substr($consent->user_agent, 0, 100),
                    $consent->expires_at->format('Y-m-d H:i:s'),
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Clean expired consents
     */
    public function cleanup()
    {
        $deletedCount = $this->consentService->cleanExpiredConsents();

        return redirect()->back()->with('success', "Cleaned up {$deletedCount} expired consent records.");
    }
}
