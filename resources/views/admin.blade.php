<x-layouts.app title="Dashboard" menu="Admin">

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Card 1 -->
        <div
            class="bg-white dark:bg-neutral-800 overflow-hidden shadow rounded-lg border border-gray-200 dark:border-neutral-700">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-neutral-400 truncate">Total Users
                            </dt>
                            <dd class="text-lg font-medium text-gray-900 dark:text-white">1,234</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div
            class="bg-white dark:bg-neutral-800 overflow-hidden shadow rounded-lg border border-gray-200 dark:border-neutral-700">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-neutral-400 truncate">Active Projects
                            </dt>
                            <dd class="text-lg font-medium text-gray-900 dark:text-white">42</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div
            class="bg-white dark:bg-neutral-800 overflow-hidden shadow rounded-lg border border-gray-200 dark:border-neutral-700">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <svg class="h-6 w-6 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-neutral-400 truncate">Revenue</dt>
                            <dd class="text-lg font-medium text-gray-900 dark:text-white">$12,345</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div
            class="bg-white dark:bg-neutral-800 overflow-hidden shadow rounded-lg border border-gray-200 dark:border-neutral-700">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="shrink-0">
                        <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor"
                            stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-neutral-400 truncate">Growth</dt>
                            <dd class="text-lg font-medium text-gray-900 dark:text-white">+23.5%</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sample Content -->
    <div class="bg-white dark:bg-neutral-800 shadow rounded-lg border border-gray-200 dark:border-neutral-700">
        <div class="px-4 py-5 sm:p-6">
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Dark Mode Test</h3>
            <p class="text-sm text-gray-700 dark:text-neutral-400 mb-4">
                Halaman ini dibuat untuk menguji functionality dark mode toggle.
                Klik tombol toggle di breadcrumb untuk mengubah antara light dan dark mode.
            </p>
            <div class="flex items-center space-x-4">
                <button type="button"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-neutral-800">
                    Primary Button
                </button>
                <button type="button"
                    class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-neutral-600 text-sm font-medium rounded-md text-gray-700 dark:text-neutral-200 bg-white dark:bg-neutral-700 hover:bg-gray-50 dark:hover:bg-neutral-600 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 dark:focus:ring-offset-neutral-800">
                    Secondary Button
                </button>
            </div>
        </div>
    </div>
</x-layouts.app>
