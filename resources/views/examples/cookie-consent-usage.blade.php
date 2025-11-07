{{-- Example usage of cookie consent in layouts --}}

{{-- Only load analytics if cookies are accepted --}}
@cookiesAccepted
    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=GA_MEASUREMENT_ID"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'GA_MEASUREMENT_ID');
    </script>
@endcookiesAccepted

{{-- Show different content based on consent status --}}
@hasMadeChoice
    @cookiesAccepted
        <div class="alert alert-success">
            Thank you for accepting cookies! This helps us improve your experience.
        </div>
    @endcookiesAccepted

    @cookiesRejected
        <div class="alert alert-info">
            You've opted out of non-essential cookies. You can change this in your browser settings.
        </div>
    @endcookiesRejected
@else
    <div class="alert alert-warning">
        Please review our cookie policy below.
    </div>
@endhasMadeChoice

{{-- Load marketing scripts only if allowed --}}
@canUseMarketing
    <!-- Meta Pixel -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', 'YOUR_PIXEL_ID');
        fbq('track', 'PageView');
    </script>
@endcanUseMarketing

{{-- JavaScript for handling consent changes --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Listen for cookie consent changes
    window.addEventListener('cookieConsentChanged', function(event) {
        const { consent, accepted, rejected } = event.detail;

        console.log('Cookie consent changed:', consent);

        if (accepted) {
            // Initialize analytics and marketing scripts
            console.log('Initializing analytics and marketing...');

            // Example: Initialize Google Analytics
            if (typeof gtag !== 'undefined') {
                gtag('consent', 'update', {
                    'analytics_storage': 'granted',
                    'ad_storage': 'granted'
                });
            }

            // Example: Initialize Meta Pixel
            if (typeof fbq !== 'undefined') {
                fbq('consent', 'grant');
            }

        } else if (rejected) {
            // Disable/cleanup analytics and marketing
            console.log('Disabling analytics and marketing...');

            // Example: Disable Google Analytics
            if (typeof gtag !== 'undefined') {
                gtag('consent', 'update', {
                    'analytics_storage': 'denied',
                    'ad_storage': 'denied'
                });
            }

            // Example: Disable Meta Pixel
            if (typeof fbq !== 'undefined') {
                fbq('consent', 'revoke');
            }
        }
    });
});
</script>
