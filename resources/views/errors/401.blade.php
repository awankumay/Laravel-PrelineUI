@extends('errors::layout')

@section('title', __('Unauthorized'))

@section('content')
    <!-- 401 Icon -->
    <div class="mb-6">
        <div class="mx-auto flex items-center justify-center size-[120px] bg-linear-to-tr from-red-600 to-orange-600 rounded-full">
            <svg class="shrink-0 size-12 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="18" height="11" x="3" y="11" rx="2" ry="2"/>
                <circle cx="12" cy="16" r="1"/>
                <path d="m7 11V7a5 5 0 0 1 10 0v4"/>
            </svg>
        </div>
    </div>

    <!-- Error Code -->
    <div class="mb-4">
        <h1 class="text-6xl sm:text-7xl font-bold text-gray-900 dark:text-white">
            401
        </h1>
    </div>

    <!-- Error Message -->
    <div class="mb-8">
        <h2 class="text-xl sm:text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-2">
            Unauthorized Access
        </h2>
        <p class="text-gray-500 dark:text-gray-400 max-w-sm mx-auto">
            You don't have permission to access this resource. Please log in or contact the administrator.
        </p>
    </div>

    <!-- Action Buttons -->
    <div class="space-y-3">
        <a href="/login"
           class="w-full sm:w-auto inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none px-6 py-3">
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"/>
                <polyline points="10,17 15,12 10,7"/>
                <line x1="15" x2="3" y1="12" y2="12"/>
            </svg>
            Sign In
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
