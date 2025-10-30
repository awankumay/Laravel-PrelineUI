<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">

<head>
    @include('partials.head')
</head>

<body class="bg-gray-50 dark:bg-gray-900">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full text-center">
            <!-- Error Code -->
            <div class="mb-4">
                <h1 class="text-6xl sm:text-7xl font-bold text-gray-900 dark:text-white">
                    @yield('code')
                </h1>
            </div>

            <!-- Error Message -->
            <div class="mb-8">
                <h2 class="text-xl sm:text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    @yield('message')
                </h2>
                <p class="text-gray-500 dark:text-gray-400">
                    @yield('description', 'Sorry, the page you are looking for could not be found.')
                </p>
            </div>

            <!-- Back Button -->
            <div class="space-y-3">
                <button type="button" onclick="history.back()"
                        class="w-full sm:w-auto inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none px-4 py-3 sm:px-6">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m15 18-6-6 6-6"/>
                    </svg>
                    Go Back
                </button>

                <div>
                    <a href="{{ url('/') }}"
                       class="inline-flex items-center gap-x-1 text-sm text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium dark:text-blue-500">
                        Back to Homepage
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m9 18 6-6-6-6"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
