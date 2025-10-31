<x-layouts.admin.default title="Dynamic Menu Demo" menu="Admin">
    <div class="space-y-6">
        <!-- Header -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 dark:bg-neutral-800 dark:border-neutral-700">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Dynamic Menu System</h1>
            <p class="text-gray-600 dark:text-neutral-400 mt-2">
                Menu sidebar kini dikelola secara dinamis melalui <code class="px-2 py-1 bg-gray-100 dark:bg-neutral-700 rounded">config/menu_admin.php</code>
            </p>
        </div>

        <!-- Features -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Feature 1 -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 dark:bg-neutral-800 dark:border-neutral-700">
                <div class="flex items-center gap-x-3 mb-3">
                    <div class="icon-container-blue">
                        <svg class="icon-blue" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 20h9" />
                            <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Config Based</h3>
                </div>
                <p class="text-gray-600 dark:text-neutral-400 text-sm">
                    Menu dikelola melalui file konfigurasi, mudah untuk diubah tanpa edit Blade template.
                </p>
            </div>

            <!-- Feature 2 -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 dark:bg-neutral-800 dark:border-neutral-700">
                <div class="flex items-center gap-x-3 mb-3">
                    <div class="icon-container-green">
                        <svg class="icon-green" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" />
                            <polyline points="7.5 4.21 12 6.81 16.5 4.21" />
                            <polyline points="7.5 19.79 7.5 14.6 3 12" />
                            <polyline points="21 12 16.5 14.6 16.5 19.79" />
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96" />
                            <line x1="12" x2="12" y1="22.08" y2="12" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Recursive</h3>
                </div>
                <p class="text-gray-600 dark:text-neutral-400 text-sm">
                    Mendukung nested menu dengan kedalaman tidak terbatas menggunakan komponen rekursif.
                </p>
            </div>

            <!-- Feature 3 -->
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 dark:bg-neutral-800 dark:border-neutral-700">
                <div class="flex items-center gap-x-3 mb-3">
                    <div class="icon-container-purple">
                        <svg class="icon-purple" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Flexible</h3>
                </div>
                <p class="text-gray-600 dark:text-neutral-400 text-sm">
                    Mendukung badge, icon custom, dan mudah untuk ditambahkan fitur seperti permission.
                </p>
            </div>
        </div>

        <!-- How it Works -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 dark:bg-neutral-800 dark:border-neutral-700">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Cara Kerja</h2>

            <div class="space-y-4">
                <div class="flex gap-x-4">
                    <div class="shrink-0">
                        <span class="flex items-center justify-center size-8 bg-blue-600 text-white rounded-full text-sm font-semibold">
                            1
                        </span>
                    </div>
                    <div class="grow">
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-white">Konfigurasi Menu</h3>
                        <p class="text-sm text-gray-600 dark:text-neutral-400">
                            Edit <code class="px-1.5 py-0.5 bg-gray-100 dark:bg-neutral-700 rounded text-xs">config/menu_admin.php</code> untuk menambah, menghapus, atau mengubah menu.
                        </p>
                    </div>
                </div>

                <div class="flex gap-x-4">
                    <div class="shrink-0">
                        <span class="flex items-center justify-center size-8 bg-blue-600 text-white rounded-full text-sm font-semibold">
                            2
                        </span>
                    </div>
                    <div class="grow">
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-white">Komponen Rekursif</h3>
                        <p class="text-sm text-gray-600 dark:text-neutral-400">
                            <code class="px-1.5 py-0.5 bg-gray-100 dark:bg-neutral-700 rounded text-xs">menu-item.blade.php</code> merender menu secara rekursif untuk nested submenu.
                        </p>
                    </div>
                </div>

                <div class="flex gap-x-4">
                    <div class="shrink-0">
                        <span class="flex items-center justify-center size-8 bg-blue-600 text-white rounded-full text-sm font-semibold">
                            3
                        </span>
                    </div>
                    <div class="grow">
                        <h3 class="text-sm font-semibold text-gray-800 dark:text-white">Layout Integration</h3>
                        <p class="text-sm text-gray-600 dark:text-neutral-400">
                            Layout admin menggunakan <code class="px-1.5 py-0.5 bg-gray-100 dark:bg-neutral-700 rounded text-xs">@foreach</code> untuk loop semua menu dari config.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Code Example -->
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 dark:bg-neutral-800 dark:border-neutral-700">
            <h2 class="text-xl font-bold text-gray-800 dark:text-white mb-4">Contoh Konfigurasi</h2>

            <pre class="bg-gray-900 text-gray-100 p-4 rounded-lg overflow-x-auto text-xs"><code>[
    'text' => 'Dashboard',
    'url' => '/dashboard',
    'icon' => '&lt;path d="..." /&gt;',
    'type' => 'link',
],
[
    'text' => 'Users',
    'icon' => '&lt;path d="..." /&gt;',
    'type' => 'accordion',
    'submenu' => [
        ['text' => 'All Users', 'url' => '/users', 'type' => 'link'],
        ['text' => 'Add New', 'url' => '/users/create', 'type' => 'link'],
    ],
]</code></pre>
        </div>

        <!-- Documentation Link -->
        <div class="bg-linear-to-br from-blue-600 to-blue-800 rounded-xl shadow-sm p-6 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-bold mb-2">Dokumentasi Lengkap</h2>
                    <p class="text-blue-100 text-sm">
                        Pelajari lebih lanjut tentang sistem menu dinamis di dokumentasi lengkap.
                    </p>
                </div>
                <a href="#"
                   class="inline-flex items-center gap-x-2 px-4 py-2 bg-white text-blue-600 font-semibold rounded-lg hover:bg-blue-50 transition-colors">
                    <span>Baca Docs</span>
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M5 12h14" />
                        <path d="m12 5 7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</x-layouts.admin.default>
