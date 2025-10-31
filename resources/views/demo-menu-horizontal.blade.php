<x-layouts.admin.horizontal title="Horizontal Menu Demo">
    <div class="space-y-6">
        <!-- Header -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 dark:bg-neutral-800 dark:border-neutral-700">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Horizontal Menu Layout</h1>
            <p class="text-gray-600 dark:text-neutral-400 mt-2">
                Menu yang sama dari <code class="px-2 py-1 bg-gray-100 dark:bg-neutral-700 rounded">config/menu_admin.php</code>
                ditampilkan dengan style horizontal di header.
            </p>
        </div>

        <!-- Comparison -->
        <div class="grid md:grid-cols-2 gap-6">
            <!-- Sidebar Layout -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 dark:bg-neutral-800 dark:border-neutral-700">
                <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Sidebar Layout</h2>
                <ul class="space-y-2 text-sm text-gray-600 dark:text-neutral-400">
                    <li class="flex items-start gap-x-2">
                        <svg class="size-5 text-green-600 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 6 9 17l-5-5"/>
                        </svg>
                        <span>Menu vertikal di sidebar kiri</span>
                    </li>
                    <li class="flex items-start gap-x-2">
                        <svg class="size-5 text-green-600 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 6 9 17l-5-5"/>
                        </svg>
                        <span>Accordion untuk nested menu</span>
                    </li>
                    <li class="flex items-start gap-x-2">
                        <svg class="size-5 text-green-600 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 6 9 17l-5-5"/>
                        </svg>
                        <span>Fixed sidebar dengan scroll</span>
                    </li>
                    <li class="flex items-start gap-x-2">
                        <svg class="size-5 text-green-600 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 6 9 17l-5-5"/>
                        </svg>
                        <span>Cocok untuk dashboard kompleks</span>
                    </li>
                </ul>
                <a href="/demo-menu" class="inline-block mt-4 px-4 py-2 text-sm bg-gray-900 text-white rounded-lg hover:bg-gray-800 dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100">
                    Lihat Sidebar Layout
                </a>
            </div>

            <!-- Horizontal Layout -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 dark:bg-neutral-800 dark:border-neutral-700">
                <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Horizontal Layout</h2>
                <ul class="space-y-2 text-sm text-gray-600 dark:text-neutral-400">
                    <li class="flex items-start gap-x-2">
                        <svg class="size-5 text-blue-600 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 6 9 17l-5-5"/>
                        </svg>
                        <span>Menu horizontal di header</span>
                    </li>
                    <li class="flex items-start gap-x-2">
                        <svg class="size-5 text-blue-600 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 6 9 17l-5-5"/>
                        </svg>
                        <span>Dropdown untuk nested menu</span>
                    </li>
                    <li class="flex items-start gap-x-2">
                        <svg class="size-5 text-blue-600 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 6 9 17l-5-5"/>
                        </svg>
                        <span>Sticky header tetap di atas</span>
                    </li>
                    <li class="flex items-start gap-x-2">
                        <svg class="size-5 text-blue-600 mt-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 6 9 17l-5-5"/>
                        </svg>
                        <span>Cocok untuk landing page/marketing</span>
                    </li>
                </ul>
                <span class="inline-block mt-4 px-4 py-2 text-sm bg-blue-600 text-white rounded-lg cursor-default">
                    Current Layout ✓
                </span>
            </div>
        </div>

        <!-- Key Benefits -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 dark:bg-neutral-800 dark:border-neutral-700">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Keuntungan Arsitektur Decoupled</h2>

            <div class="grid sm:grid-cols-2 gap-4">
                <div class="flex gap-x-3">
                    <div class="shrink-0">
                        <div class="size-10 flex items-center justify-center rounded-full bg-green-100 dark:bg-green-900/30">
                            <svg class="size-5 text-green-600 dark:text-green-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 9a2 2 0 0 1-2 2H6l-4 4V4c0-1.1.9-2 2-2h8a2 2 0 0 1 2 2v5Z"/>
                                <path d="M18 9h2a2 2 0 0 1 2 2v11l-4-4h-6a2 2 0 0 1-2-2v-1"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-white">Flexible Styling</h3>
                        <p class="text-sm text-gray-600 dark:text-neutral-400">Setiap layout handle styling sendiri</p>
                    </div>
                </div>

                <div class="flex gap-x-3">
                    <div class="shrink-0">
                        <div class="size-10 flex items-center justify-center rounded-full bg-blue-100 dark:bg-blue-900/30">
                            <svg class="size-5 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                                <path d="m9 11 3 3L22 4"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-white">No Errors</h3>
                        <p class="text-sm text-gray-600 dark:text-neutral-400">Tidak ada undefined key errors</p>
                    </div>
                </div>

                <div class="flex gap-x-3">
                    <div class="shrink-0">
                        <div class="size-10 flex items-center justify-center rounded-full bg-purple-100 dark:bg-purple-900/30">
                            <svg class="size-5 text-purple-600 dark:text-purple-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 20h9"/>
                                <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-white">Easy Customization</h3>
                        <p class="text-sm text-gray-600 dark:text-neutral-400">Edit langsung di layout, tidak di komponen</p>
                    </div>
                </div>

                <div class="flex gap-x-3">
                    <div class="shrink-0">
                        <div class="size-10 flex items-center justify-center rounded-full bg-orange-100 dark:bg-orange-900/30">
                            <svg class="size-5 text-orange-600 dark:text-orange-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="18" height="18" x="3" y="3" rx="2"/>
                                <path d="M3 9h18"/>
                                <path d="M9 21V9"/>
                            </svg>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-white">Layout-Specific</h3>
                        <p class="text-sm text-gray-600 dark:text-neutral-400">Struktur berbeda per layout</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Code Example -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 dark:bg-neutral-800 dark:border-neutral-700">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Usage</h2>

            <div class="space-y-4">
                <div>
                    <h3 class="text-sm font-semibold text-gray-800 dark:text-white mb-2">Sidebar Layout:</h3>
                    <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto text-xs"><code>&lt;x-layouts.admin.default title="Dashboard" menu="Admin"&gt;
    {{-- Your content --}}
&lt;/x-layouts.admin.default&gt;</code></pre>
                </div>

                <div>
                    <h3 class="text-sm font-semibold text-gray-800 dark:text-white mb-2">Horizontal Layout:</h3>
                    <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto text-xs"><code>&lt;x-layouts.admin.horizontal title="Dashboard"&gt;
    {{-- Your content --}}
&lt;/x-layouts.admin.horizontal&gt;</code></pre>
                </div>
            </div>
        </div>
    </div>
</x-layouts.admin.horizontal>
