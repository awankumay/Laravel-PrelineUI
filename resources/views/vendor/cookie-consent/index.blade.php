@if($cookieConsentConfig['enabled'] && ! $alreadyConsentedWithCookies)

    @include('cookie-consent::dialogContents')

    <script>

        window.laravelCookieConsent = (function () {

            const COOKIE_VALUE_ACCEPTED = 1;
            const COOKIE_VALUE_REJECTED = 0;
            const COOKIE_DOMAIN = '{{ config('session.domain') ?? request()->getHost() }}';

            function consentWithCookies() {
                setCookie('{{ $cookieConsentConfig['cookie_name'] }}', COOKIE_VALUE_ACCEPTED, {{ $cookieConsentConfig['cookie_lifetime'] }});

                // Record consent in database
                recordConsentInDatabase('accepted', {
                    analytics: true,
                    marketing: true,
                    personalization: true
                });

                hideCookieDialog();

                // Dispatch event for analytics/marketing initialization
                window.dispatchEvent(new CustomEvent('cookieConsentChanged', {
                    detail: {
                        consent: 'accepted',
                        accepted: true,
                        rejected: false
                    }
                }));
            }

            function rejectCookies() {
                setCookie('{{ $cookieConsentConfig['cookie_name'] }}', COOKIE_VALUE_REJECTED, {{ $cookieConsentConfig['cookie_lifetime'] }});

                // Record consent in database
                recordConsentInDatabase('rejected', {
                    analytics: false,
                    marketing: false,
                    personalization: false
                });

                hideCookieDialog();

                // Dispatch event for cleanup/disable analytics
                window.dispatchEvent(new CustomEvent('cookieConsentChanged', {
                    detail: {
                        consent: 'rejected',
                        accepted: false,
                        rejected: true
                    }
                }));
            }

            function cookieExists(name) {
                return (document.cookie.split('; ').indexOf(name + '=' + COOKIE_VALUE_ACCEPTED) !== -1);
            }

            function cookieRejected(name) {
                return (document.cookie.split('; ').indexOf(name + '=' + COOKIE_VALUE_REJECTED) !== -1);
            }

            function hideCookieDialog() {
                const dialogs = document.getElementsByClassName('js-cookie-consent');

                for (let i = 0; i < dialogs.length; ++i) {
                    dialogs[i].style.transform = 'translateY(100%)';
                    setTimeout(() => {
                        dialogs[i].style.display = 'none';
                    }, 300);
                }
            }

            function setCookie(name, value, expirationInDays) {
                const date = new Date();
                date.setTime(date.getTime() + (expirationInDays * 24 * 60 * 60 * 1000));
                document.cookie = name + '=' + value
                    + ';expires=' + date.toUTCString()
                    + ';domain=' + COOKIE_DOMAIN
                    + ';path=/{{ config('session.secure') ? ';secure' : null }}'
                    + '{{ config('session.same_site') ? ';samesite='.config('session.same_site') : null }}';
            }

            /**
             * Record consent in database via API
             */
            function recordConsentInDatabase(consentType, details = {}) {
                // Get CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

                if (!csrfToken) {
                    console.warn('CSRF token not found, skipping database storage');
                    return;
                }

                // Prepare data
                const data = {
                    consent_type: consentType,
                    details: details,
                    timestamp: new Date().toISOString(),
                    user_agent: navigator.userAgent,
                    url: window.location.href,
                    referrer: document.referrer
                };

                // Send to API
                fetch('/api/cookie-consent', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(result => {
                    if (result.success) {
                        console.log('✅ Cookie consent recorded in database:', result);

                        // Dispatch database event
                        window.dispatchEvent(new CustomEvent('cookieConsentDatabaseRecorded', {
                            detail: {
                                consent_type: consentType,
                                database_id: result.id,
                                database_storage: result.database_storage
                            }
                        }));
                    } else {
                        console.warn('⚠️ Failed to record consent in database:', result.message);
                    }
                })
                .catch(error => {
                    console.error('❌ Error recording consent in database:', error);
                    // Don't block user experience if database fails
                });
            }

            // Hide dialog if user has already made a choice (accepted or rejected)
            if (cookieExists('{{ $cookieConsentConfig['cookie_name'] }}') || cookieRejected('{{ $cookieConsentConfig['cookie_name'] }}')) {
                hideCookieDialog();
            }

            // Accept buttons event listeners
            const acceptButtons = document.getElementsByClassName('js-cookie-consent-agree');
            for (let i = 0; i < acceptButtons.length; ++i) {
                acceptButtons[i].addEventListener('click', consentWithCookies);
            }

            // Reject buttons event listeners
            const rejectButtons = document.getElementsByClassName('js-cookie-consent-reject');
            for (let i = 0; i < rejectButtons.length; ++i) {
                rejectButtons[i].addEventListener('click', rejectCookies);
            }

            return {
                consentWithCookies: consentWithCookies,
                rejectCookies: rejectCookies,
                hideCookieDialog: hideCookieDialog,
                recordConsentInDatabase: recordConsentInDatabase,
                cookieExists: function(name) { return cookieExists(name); },
                cookieRejected: function(name) { return cookieRejected(name); }
            };
        })();
    </script>

@endif
