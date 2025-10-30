@extends('errors::layout')

@section('title', __('Server Error'))

@section('content')
    <!-- 500 Icon -->
    <div class="mb-6">
        <div class="mx-auto flex items-center justify-center size-[120px] bg-linear-to-tr from-gray-600 to-gray-800 rounded-full">
            <svg class="shrink-0 size-12 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M6 20h0a4 4 0 0 1-4-4V8a4 4 0 0 1 4-4h2.5L12 8.5 15.5 4H18a4 4 0 0 1 4 4v8a4 4 0 0 1-4 4h0"/>
                <path d="M18 20a4 4 0 0 1-4-4V8a4 4 0 0 1 4-4"/>
                <path d="M6 20a4 4 0 0 0 4-4V8a4 4 0 0 0-4-4"/>
                <circle cx="9" cy="12" r="1"/>
                <circle cx="15" cy="12" r="1"/>
            </svg>
        </div>
    </div>

    <!-- Error Code -->
    <div class="mb-4">
        <h1 class="text-6xl sm:text-7xl font-bold text-gray-900 dark:text-white">
            500
        </h1>
    </div>

    <!-- Error Message -->
    <div class="mb-8">
        <h2 class="text-xl sm:text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-2">
            Internal Server Error
        </h2>
        <p class="text-gray-500 dark:text-gray-400 max-w-sm mx-auto">
            Something went wrong on our end. We're working to fix this issue. Please try again later.
        </p>
    </div>

    <!-- Action Buttons -->
    <div class="space-y-3">
        <button type="button" onclick="window.location.reload()"
                class="w-full sm:w-auto inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none px-6 py-3">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/>
                <path d="M21 3v5h-5"/>
                <path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/>
                <path d="M8 16H3v5"/>
            </svg>
            Try Again
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
