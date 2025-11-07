<!-- Spatie Cookie Consent - Preline UI Style -->
<div class="js-cookie-consent cookie-consent fixed bottom-0 left-0 right-0 z-50 transform translate-y-0 transition-transform duration-300 ease-in-out">
    <div class="bg-primary border-t border-primary shadow-xl p-4 md:p-6">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <!-- Content -->
                <div class="flex-1">
                    <div class="flex items-start gap-3">
                        <!-- Cookie Icon -->
                        <div class="shrink-0 mt-0.5">
                            <svg class="size-5 text-primary opacity-70" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V4a2 2 0 00-2-2H6zm1 2a1 1 0 000 2h6a1 1 0 100-2H7zm6 7a1 1 0 11-2 0 1 1 0 012 0zm-3 3a1 1 0 11-2 0 1 1 0 012 0zm-4-3a1 1 0 11-2 0 1 1 0 012 0zm2 3a1 1 0 11-2 0 1 1 0 012 0z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-primary mb-1">{{ trans('cookie-consent::texts.title') }}</h3>
                            <p class="text-xs text-secondary leading-relaxed cookie-consent__message">
                                {!! trans('cookie-consent::texts.message') !!}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row gap-2 sm:gap-3 shrink-0">
                    <!-- Reject Button -->
                    <button 
                        type="button"
                        class="js-cookie-consent-reject cookie-consent__reject inline-flex justify-center items-center gap-x-2 text-xs font-medium rounded-lg px-3 py-2 border border-primary text-secondary hover:bg-secondary transition-colors focus:outline-hidden focus:ring-2 focus:ring-gray-300 dark:focus:ring-neutral-600 cursor-pointer">
                        <svg class="size-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        {{ trans('cookie-consent::texts.reject') }}
                    </button>
                    
                    <!-- Accept Button -->
                    <button
                        type="button"
                        class="js-cookie-consent-agree cookie-consent__agree inline-flex justify-center items-center gap-x-2 text-xs font-semibold rounded-lg px-4 py-2 bg-blue-600 text-white hover:bg-blue-700 transition-colors focus:outline-hidden focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-neutral-900 cursor-pointer">
                        <svg class="size-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        {{ trans('cookie-consent::texts.agree') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
