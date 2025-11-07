<!-- Fixed Navbar with Blue Theme -->
<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-blue-600 dark:bg-blue-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-6">
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="text-2xl font-bold text-white navbar-brand">SaasFlow</a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8">
                <a href="#features" class="navbar-link text-white/90 hover:text-white transition-colors">Features</a>
                <a href="#pricing" class="navbar-link text-white/90 hover:text-white transition-colors">Pricing</a>
                <a href="#about" class="navbar-link text-white/90 hover:text-white transition-colors">About</a>
                <a href="#contact" class="navbar-link text-white/90 hover:text-white transition-colors">Contact</a>
            </div>

            <!-- Right Side Buttons -->
            <div class="flex items-center gap-4">
                {{-- If Login = Show Dropdown --}}
                @auth
                {{-- Hidden Mobile View --}}
                <div class="relative navbar-link text-white/90 hover:text-white transition-colors hidden sm:block">
                    <div
                        class="hs-dropdown [--strategy:static] sm:[--strategy:fixed] [--adaptive:none] sm:[--adaptive:adaptive] ">
                        <button id="hs-navbar-example-dropdown" type="button"
                            class="hs-dropdown-toggle flex items-center w-full" aria-haspopup="menu"
                            aria-expanded="false" aria-label="Mega Menu">
                            {{ auth()->user()->name }}
                            @svg('heroicon-c-chevron-down', 'inline ms-1 size-4')
                        </button>

                        <div class="hs-dropdown-menu transition-[opacity,margin] ease-in-out duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 sm:w-48 z-10 bg-white sm:shadow-md rounded-lg p-1 space-y-1 dark:bg-neutral-800 sm:dark:border dark:border-neutral-700 dark:divide-neutral-700 before:absolute top-full sm:border border-gray-200 before:-top-5 before:start-0 before:w-full before:h-5 hidden"
                            role="menu" aria-orientation="vertical" aria-labelledby="hs-navbar-example-dropdown">
                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                href="{{ route('welcome') }}">
                                Dashboard
                            </a>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700 dark:focus:text-neutral-300"
                                    href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Logout
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <div class="relative">
                    <a href="{{ route('login') }}"
                        class="navbar-link text-white/90 hover:text-white transition-colors hidden sm:block">Sign In</a>
                </div>
                @endauth
                {{-- End If Login --}}
                <a href="{{ route('register') }}"
                    class="bg-white text-blue-600 px-4 py-2 rounded-lg font-medium hover:bg-blue-50 transition-colors">Get
                    Started</a>
                <!-- Dark Mode Toggle -->
                <div class="hidden sm:flex items-center gap-2">
                    @include('partials.theme-switch')
                </div>
                <!-- End Dark Mode Toggle -->

                <!-- Mobile Menu Button -->
                <button type="button" class="md:hidden navbar-burger text-white focus:outline-none"
                    aria-label="Toggle menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu (Hidden by default) -->
    <div class="md:hidden navbar-menu hidden">
        <div class="px-4 pt-2 pb-4 space-y-2 bg-blue-600 dark:bg-blue-900 border-t border-white/20">
            <a href="#features" class="block px-3 py-2 text-white/90 hover:text-white transition-colors">Features</a>
            <a href="#pricing" class="block px-3 py-2 text-white/90 hover:text-white transition-colors">Pricing</a>
            <a href="#about" class="block px-3 py-2 text-white/90 hover:text-white transition-colors">About</a>
            <a href="#contact" class="block px-3 py-2 text-white/90 hover:text-white transition-colors">Contact</a>
            {{-- If User is Authenticated --}}
            @auth
            {{-- Dropdown Menu --}}
            <div
                class="relative hs-dropdown [--strategy:static] sm:[--strategy:fixed] [--adaptive:none] sm:[--adaptive:adaptive]">
                <a href="#" id="hs-navbar-dropdown"
                    class="block px-3 py-2 text-white/90 hover:text-white transition-colors">
                    {{ auth()->user()->name }}
                    @svg('heroicon-c-chevron-down', 'inline ms-1 size-4')
                </a>
                <div class="hs-dropdown-menu transition-[opacity,margin] ease-in-out duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 sm:w-48 z-10 before:-top-5 before:start-0 before:w-full before:h-5 hidden"
                    role="navbar-dropdown" aria-orientation="vertical" aria-labelledby="hs-navbar-dropdown">
                    <a href="{{ route('welcome') }}"
                        class="block px-3 py-2 text-white/90 hover:text-white transition-colors">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                            class="block px-3 py-2 text-white/90 hover:text-white transition-colors">Logout</a>
                    </form>
                </div>
            </div>
            @else
            <a href="{{ route('login') }}" class="block px-3 py-2 text-white/90 hover:text-white transition-colors">Sign
                In</a>
            @endauth
        </div>
    </div>
</nav>
