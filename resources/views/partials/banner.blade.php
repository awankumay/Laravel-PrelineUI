{{-- Banner Modal - Auto Show on Page Load --}}
<div id="hs-banner-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-banner-modal-label">
    <div class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
        <div class="w-full flex flex-col bg-primary border border-primary shadow-2xl rounded-xl pointer-events-auto">
            <div class="flex justify-between items-center py-3 px-4 border-b border-primary">
                <h3 id="hs-banner-modal-label" class="font-bold text-primary">
                    Announcement
                </h3>
                <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-secondary text-primary hover:bg-gray-300 dark:hover:bg-neutral-600 focus:outline-hidden focus:bg-gray-300 dark:focus:bg-neutral-600 disabled:opacity-50 disabled:pointer-events-none" aria-label="Close" data-hs-overlay="#hs-banner-modal">
                    <span class="sr-only">Close</span>
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>
            <div class="p-4 overflow-y-auto">
                {{-- Banner Image --}}
                <div class="mb-4">
                    @if(isset($bannerImage) && $bannerImage)
                        <img src="{{ $bannerImage }}" alt="Banner" class="w-full h-auto rounded-lg object-cover">
                    @else
                        <img src="https://placehold.co/600x400/3b82f6/ffffff?text=Banner+Image" alt="Placeholder Banner" class="w-full h-auto rounded-lg object-cover">
                    @endif
                </div>

                {{-- Banner Content --}}
                <div class="space-y-3">
                    <h4 class="text-lg font-semibold text-primary">
                        {{ $bannerTitle ?? 'Welcome to Our Platform!' }}
                    </h4>
                    <p class="text-secondary">
                        {{ $bannerDescription ?? 'Discover amazing features and start your journey with us today. We\'re excited to have you here!' }}
                    </p>
                </div>
            </div>
            <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-primary">
                <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 dark:border-neutral-700 bg-primary text-primary shadow-2xs hover:bg-secondary focus:outline-hidden focus:bg-secondary disabled:opacity-50 disabled:pointer-events-none" data-hs-overlay="#hs-banner-modal">
                    Close
                </button>
                @if(isset($bannerActionUrl) && $bannerActionUrl)
                    <a href="{{ $bannerActionUrl }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        {{ $bannerActionText ?? 'Learn More' }}
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Auto-open modal - Always show on page load --}}
<script>
(function() {
    'use strict';

    let modalOpened = false;

    function openBannerModal() {
        if (modalOpened) return;

        const modal = document.getElementById('hs-banner-modal');
        if (!modal) return;

        try {
            // Method 1: Try HSOverlay API
            if (window.HSOverlay && typeof window.HSOverlay.open === 'function') {
                window.HSOverlay.open(modal);
                modalOpened = true;
                return;
            }

            // Method 2: Try HSStaticMethods if available
            if (window.HSStaticMethods && window.HSStaticMethods.autoInit) {
                window.HSStaticMethods.autoInit(['overlay']);
                setTimeout(function() {
                    if (window.HSOverlay) {
                        window.HSOverlay.open(modal);
                        modalOpened = true;
                    }
                }, 100);
                return;
            }

            // Method 3: Manual trigger using data attribute
            const openEvent = new Event('click', { bubbles: true });
            modal.dispatchEvent(openEvent);
            modal.classList.remove('hidden');
            modal.classList.add('open', 'opened');
            modalOpened = true;

        } catch (error) {
            console.error('Error opening banner modal:', error);
        }
    }

    // Try immediately if DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(openBannerModal, 800);
        });
    } else {
        setTimeout(openBannerModal, 800);
    }

    // Backup: Try on window load
    window.addEventListener('load', function() {
        if (!modalOpened) {
            setTimeout(openBannerModal, 1000);
        }
    });

    // If Preline loads later, reinitialize
    setTimeout(function() {
        if (!modalOpened && window.HSOverlay) {
            openBannerModal();
        }
    }, 2000);

})();
</script>
