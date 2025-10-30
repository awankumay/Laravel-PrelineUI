@extends('errors::layout')

@section('title', __('Payment Required'))

@section('content')
    <!-- 402 Icon -->
    <div class="mb-6">
        <div class="mx-auto flex items-center justify-center size-[120px] bg-linear-to-tr from-green-600 to-emerald-600 rounded-full">
            <svg class="shrink-0 size-12 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="20" height="14" x="2" y="5" rx="2"/>
                <line x1="2" x2="22" y1="10" y2="10"/>
            </svg>
        </div>
    </div>

    <!-- Error Code -->
    <div class="mb-4">
        <h1 class="text-6xl sm:text-7xl font-bold text-gray-900 dark:text-white">
            402
        </h1>
    </div>

    <!-- Error Message -->
    <div class="mb-8">
        <h2 class="text-xl sm:text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-2">
            Payment Required
        </h2>
        <p class="text-gray-500 dark:text-gray-400 max-w-sm mx-auto">
            Payment is required to access this resource. Please check your subscription or payment method.
        </p>
    </div>

    <!-- Action Buttons -->
    <div class="space-y-3">
        <a href="{{ url('/billing') ?? url('/payment') }}"
           class="w-full sm:w-auto inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none px-6 py-3">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="20" height="14" x="2" y="5" rx="2"/>
                <line x1="2" x2="22" y1="10" y2="10"/>
            </svg>
            Update Payment
        </a>

        <div>
            <button type="button" onclick="history.back()"
                    class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6"/>
                </svg>
                Go Back
            </button>
        </div>

        <div>
            <a href="{{ url('/') }}"
               class="inline-flex items-center gap-x-1 text-sm text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700 font-medium dark:text-gray-400 dark:hover:text-gray-300 dark:focus:text-gray-300">
                Back to Homepage
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"/>
                </svg>
            </a>
        </div>
    </div>
@endsection
