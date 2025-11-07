<?php

namespace App\Helpers;

use App\Services\CookieConsentService;
use Illuminate\Http\Request;

class CookieConsentHelper
{
    /**
     * Check if user has accepted cookies (with database fallback)
     */
    public static function hasAcceptedCookies(?Request $request = null): bool
    {
        $request = $request ?? request();
        $cookieName = config('cookie-consent.cookie_name');

        // First check browser cookie (fastest)
        $browserConsent = $request->cookie($cookieName) === '1';

        // If database storage is enabled and no browser cookie, check database
        if (! $browserConsent && config('cookie-consent.enable_database_storage', false)) {
            $consentService = new CookieConsentService;

            return $consentService->hasAcceptedFromDatabase($request);
        }

        return $browserConsent;
    }

    /**
     * Check if user has rejected cookies (with database fallback)
     */
    public static function hasRejectedCookies(?Request $request = null): bool
    {
        $request = $request ?? request();
        $cookieName = config('cookie-consent.cookie_name');

        // First check browser cookie (fastest)
        $browserRejected = $request->cookie($cookieName) === '0';

        // If database storage is enabled and no browser cookie, check database
        if (! $browserRejected && config('cookie-consent.enable_database_storage', false)) {
            $consentService = new CookieConsentService;

            return $consentService->hasRejectedFromDatabase($request);
        }

        return $browserRejected;
    }

    /**
     * Check if user has made any choice (accepted or rejected)
     */
    public static function hasMadeChoice(?Request $request = null): bool
    {
        return self::hasAcceptedCookies($request) || self::hasRejectedCookies($request);
    }

    /**
     * Get detailed consent information from database
     */
    public static function getConsentDetails(?Request $request = null): ?array
    {
        if (! config('cookie-consent.enable_database_storage', false)) {
            return null;
        }

        $request = $request ?? request();
        $consentService = new CookieConsentService;
        $consent = $consentService->getLatestConsent($request);

        if (! $consent) {
            return null;
        }

        return [
            'id' => $consent->id,
            'consent_type' => $consent->consent_type,
            'details' => $consent->consent_details,
            'created_at' => $consent->created_at,
            'expires_at' => $consent->expires_at,
            'is_expired' => $consent->isExpired(),
            'analytics' => $consent->consent_details['analytics'] ?? false,
            'marketing' => $consent->consent_details['marketing'] ?? false,
            'personalization' => $consent->consent_details['personalization'] ?? false,
        ];
    }

    /**
     * Check if analytics cookies are allowed
     */
    public static function canUseAnalytics(?Request $request = null): bool
    {
        // Check if user explicitly accepted cookies
        if (! self::hasAcceptedCookies($request)) {
            return false;
        }

        // If database storage enabled, check granular permissions
        if (config('cookie-consent.enable_database_storage', false)) {
            $details = self::getConsentDetails($request);

            return $details['analytics'] ?? true; // Default to true if accepted
        }

        return true; // Browser-only, accepted means all allowed
    }

    /**
     * Check if marketing cookies are allowed
     */
    public static function canUseMarketing(?Request $request = null): bool
    {
        // Check if user explicitly accepted cookies
        if (! self::hasAcceptedCookies($request)) {
            return false;
        }

        // If database storage enabled, check granular permissions
        if (config('cookie-consent.enable_database_storage', false)) {
            $details = self::getConsentDetails($request);

            return $details['marketing'] ?? true; // Default to true if accepted
        }

        return true; // Browser-only, accepted means all allowed
    }

    /**
     * Check if personalization cookies are allowed
     */
    public static function canUsePersonalization(?Request $request = null): bool
    {
        // Check if user explicitly accepted cookies
        if (! self::hasAcceptedCookies($request)) {
            return false;
        }

        // If database storage enabled, check granular permissions
        if (config('cookie-consent.enable_database_storage', false)) {
            $details = self::getConsentDetails($request);

            return $details['personalization'] ?? true; // Default to true if accepted
        }

        return true; // Browser-only, accepted means all allowed
    }

    /**
     * Get consent status as string
     */
    public static function getConsentStatus(?Request $request = null): string
    {
        if (self::hasAcceptedCookies($request)) {
            return 'accepted';
        }

        if (self::hasRejectedCookies($request)) {
            return 'rejected';
        }

        return 'pending';
    }

    /**
     * Check if essential cookies are allowed
     * Essential cookies are always allowed regardless of choice
     */
    public static function canUseEssential(): bool
    {
        return true;
    }
}
