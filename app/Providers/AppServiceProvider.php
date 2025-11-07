<?php

namespace App\Providers;

use App\Helpers\CookieConsentHelper;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Debugbar', \Barryvdh\Debugbar\Facades\Debugbar::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Cookie Consent Blade Directives
        $this->registerCookieConsentDirectives();
    }

    /**
     * Register custom Blade directives for cookie consent
     */
    private function registerCookieConsentDirectives(): void
    {
        // @cookiesAccepted
        Blade::if('cookiesAccepted', function () {
            return CookieConsentHelper::hasAcceptedCookies();
        });

        // @cookiesRejected
        Blade::if('cookiesRejected', function () {
            return CookieConsentHelper::hasRejectedCookies();
        });

        // @canUseAnalytics
        Blade::if('canUseAnalytics', function () {
            return CookieConsentHelper::canUseAnalytics();
        });

        // @canUseMarketing
        Blade::if('canUseMarketing', function () {
            return CookieConsentHelper::canUseMarketing();
        });

        // @hasMadeChoice
        Blade::if('hasMadeChoice', function () {
            return CookieConsentHelper::hasMadeChoice();
        });
    }
}
