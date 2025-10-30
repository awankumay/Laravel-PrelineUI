@extends('errors::layout')

@section('title', __('Too Many Requests'))

@section('content')
    <!-- 429 Icon -->
    <div class="mb-6">
        <div class="mx-auto flex items-center justify-center size-[120px] bg-linear-to-tr from-purple-600 to-pink-600 rounded-full">
            <svg class="shrink-0 size-12 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18.37 2.63 14 7l-1.59-1.59a2 2 0 0 0-2.82 0L8 7l9 9 1.59-1.59a2 2 0 0 0 0-2.82L17 10l4.37-4.37a2.12 2.12 0 1 0-3-3Z"/>
                <path d="M9 7 4 2l3 3"/>
                <path d="m13 13 5 5-3-3"/>
                <path d="m13 13-1-1"/>
            </svg>
        </div>
    </div>

    <!-- Error Code -->
    <div class="mb-4">
        <h1 class="text-6xl sm:text-7xl font-bold text-gray-900 dark:text-white">
            429
        </h1>
    </div>

    <!-- Error Message -->
    <div class="mb-8">
        <h2 class="text-xl sm:text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-2">
            Too Many Requests
        </h2>
        <p class="text-gray-500 dark:text-gray-400 max-w-sm mx-auto">
            You've made too many requests in a short period. Please wait a moment before trying again.
        </p>
    </div>

    <!-- Countdown Timer (Optional) -->
    <div class="mb-6">
        <div class="inline-flex items-center gap-x-2 bg-yellow-50 border border-yellow-200 text-yellow-800 text-sm rounded-lg px-4 py-3 dark:bg-yellow-800/30 dark:border-yellow-700 dark:text-yellow-500">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/>
                <polyline points="12,6 12,12 16,14"/>
            </svg>
            Please wait before making another request
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="space-y-3">
        <button type="button" onclick="setTimeout(() => window.location.reload(), 5000)"
                class="w-full sm:w-auto inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none px-6 py-3">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/>
                <polyline points="12,6 12,12 16,14"/>
            </svg>
            Wait & Retry
        </button>

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
