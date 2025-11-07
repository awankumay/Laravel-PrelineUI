<?php

return [

    /*
     * Use this setting to enable the cookie consent dialog.
     */
    'enabled' => env('COOKIE_CONSENT_ENABLED', true),

    /*
     * The name of the cookie in which we store if the user
     * has agreed to accept the conditions.
     */
    'cookie_name' => env('COOKIE_CONSENT_NAME', 'saasflow_cookie_consent'),

    /*
     * Set the cookie duration in days. Default is 365 * 1 (1 year).
     * GDPR recommends maximum 13 months for consent.
     */
    'cookie_lifetime' => env('COOKIE_CONSENT_LIFETIME', 365),

    /*
     * Set the cookie domain. Default is the current domain.
     */
    'cookie_domain' => env('COOKIE_CONSENT_DOMAIN', null),

    /*
     * Set whether the cookie should only be sent over HTTPS.
     */
    'cookie_secure' => env('COOKIE_CONSENT_SECURE', null),

    /*
     * Set the SameSite attribute for the cookie.
     * Options: 'Strict', 'Lax', 'None', or null
     */
    'cookie_same_site' => env('COOKIE_CONSENT_SAME_SITE', 'Lax'),

    /*
     * Enable reject functionality.
     * When true, users can reject cookies instead of only accepting.
     */
    'enable_reject' => env('COOKIE_CONSENT_ENABLE_REJECT', true),

    /*
     * What to do when cookies are rejected.
     * Options: 'essential_only', 'none'
     * - 'essential_only': Only essential cookies are allowed
     * - 'none': No non-essential cookies are set
     */
    'reject_behavior' => env('COOKIE_CONSENT_REJECT_BEHAVIOR', 'essential_only'),

    /*
     * Enable database storage for consent records.
     * When enabled, consent decisions are stored in database for analytics and compliance.
     * Records store IP address, hostname, user agent, and consent details.
     */
    'enable_database_storage' => env('COOKIE_CONSENT_DATABASE_STORAGE', false),

    /*
     * Enable consent analytics and reporting (requires database storage).
     * When enabled, provides consent statistics dashboard for administrators.
     */
    'enable_analytics' => env('COOKIE_CONSENT_ANALYTICS_ENABLED', false),

    /*
     * Automatically clean expired consent records (days).
     * Set to null to disable automatic cleanup.
     */
    'auto_cleanup_days' => env('COOKIE_CONSENT_AUTO_CLEANUP_DAYS', 30),
];
