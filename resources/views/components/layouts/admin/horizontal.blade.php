<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head', [
    'title' => $title ?? null
    ])
</head>

<body class="bg-gray-50 dark:bg-neutral-900">
    <!-- Header with Horizontal Menu -->
    <header class="sticky top-0 inset-x-0 z-20 bg-white border-b border-gray-200 dark:bg-neutral-800 dark:border-neutral-700">
        <nav class="flex items-center justify-between px-4 sm:px-6 lg:px-8 py-3">
            <!-- Logo -->
            <a class="flex-none text-xl inline-block font-semibold focus:outline-hidden focus:opacity-80"
                href="#" aria-label="Brand">
                <svg class="w-28 h-auto" width="116" height="32" viewBox="0 0 116 32" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M33.5696 30.8182V11.3182H37.4474V13.7003H37.6229C37.7952 13.3187 38.0445 12.9309 38.3707 12.5369C38.7031 12.1368 39.134 11.8045 39.6634 11.5398C40.1989 11.2689 40.8636 11.1335 41.6577 11.1335C42.6918 11.1335 43.6458 11.4044 44.5199 11.946C45.3939 12.4815 46.0926 13.291 46.6158 14.3743C47.139 15.4515 47.4006 16.8026 47.4006 18.4276C47.4006 20.0095 47.1451 21.3452 46.6342 22.4347C46.1295 23.518 45.4401 24.3397 44.5661 24.8999C43.6982 25.4538 42.7256 25.7308 41.6484 25.7308C40.8852 25.7308 40.2358 25.6046 39.7003 25.3523C39.1709 25.0999 38.737 24.7829 38.3984 24.4013C38.0599 24.0135 37.8014 23.6226 37.6229 23.2287H37.5028V30.8182H33.5696ZM37.4197 18.4091C37.4197 19.2524 37.5367 19.9879 37.7706 20.6158C38.0045 21.2436 38.343 21.733 38.7862 22.0838C39.2294 22.4285 39.768 22.6009 40.402 22.6009C41.0421 22.6009 41.5838 22.4254 42.027 22.0746C42.4702 21.7176 42.8056 21.2251 43.0334 20.5973C43.2673 19.9633 43.3842 19.2339 43.3842 18.4091C43.3842 17.5904 43.2704 16.8703 43.0426 16.2486C42.8149 15.6269 42.4794 15.1406 42.0362 14.7898C41.593 14.4389 41.0483 14.2635 40.402 14.2635C39.7618 14.2635 39.2202 14.4328 38.777 14.7713C38.34 15.1098 38.0045 15.59 37.7706 16.2116C37.5367 16.8333 37.4197 17.5658 37.4197 18.4091Z"
                        class="fill-gray-800 dark:fill-white" fill="currentColor" />
                    <path
                        d="M1 29.5V16.5C1 9.87258 6.37258 4.5 13 4.5C19.6274 4.5 25 9.87258 25 16.5C25 23.1274 19.6274 28.5 13 28.5H12"
                        class="stroke-gray-800 dark:stroke-white" stroke="currentColor" stroke-width="2" />
                    <circle cx="13" cy="16.5214" r="5" class="fill-gray-800 dark:fill-white" fill="currentColor" />
                </svg>
            </a>

            <!-- Horizontal Menu -->
            <div class="hidden md:flex items-center gap-x-1">
                @foreach(config('menu_admin.menu', []) as $index => $menuItem)
                    @if($menuItem['type'] === 'link')
                        <a class="inline-flex items-center gap-x-2 px-3 py-2 text-sm font-medium text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700 {{ request()->is(ltrim($menuItem['url'], '/')) ? 'bg-gray-100 dark:bg-neutral-700' : '' }}"
                            href="{{ $menuItem['url'] }}">
                            @if(isset($menuItem['icon']))
                                <i class="{{ $menuItem['icon'] }} w-4"></i>
                            @endif
                            {{ $menuItem['text'] }}
                            @if(isset($menuItem['badge']))
                                <span class="py-0.5 px-1.5 inline-flex items-center text-xs bg-blue-600 text-white rounded-full">
                                    {{ $menuItem['badge'] }}
                                </span>
                            @endif
                        </a>
                    @elseif($menuItem['type'] === 'accordion')
                        <!-- Dropdown Menu -->
                        <div class="hs-dropdown relative inline-flex">
                            <button type="button"
                                class="hs-dropdown-toggle inline-flex items-center gap-x-2 px-3 py-2 text-sm font-medium text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                @if(isset($menuItem['icon']))
                                    <i class="{{ $menuItem['icon'] }} w-4"></i>
                                @endif
                                {{ $menuItem['text'] }}
                                <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="m6 9 6 6 6-6" />
                                </svg>
                            </button>

                            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg p-2 mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700"
                                aria-labelledby="hs-dropdown-{{ $index }}">
                                @foreach($menuItem['submenu'] ?? [] as $subItem)
                                    @if($subItem['type'] === 'link')
                                        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-200 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                            href="{{ $subItem['url'] }}">
                                            {{ $subItem['text'] }}
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Right Actions -->
            <div class="flex items-center gap-x-2">
                @include('partials.theme-switch')
            </div>
        </nav>
    </header>
    <!-- End Header -->

    <!-- Content -->
    <main class="w-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            {{ $slot }}
        </div>
    </main>
    <!-- End Content -->
</body>

</html>
