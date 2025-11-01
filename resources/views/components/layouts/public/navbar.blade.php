<!-- Fixed Navbar with Blue Theme -->
<nav id="navbar" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-6">
            <div class="flex items-center">
                <a href="/" class="text-2xl font-bold text-white navbar-brand">SaasFlow</a>
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
                <a href="#" class="navbar-link text-white/90 hover:text-white transition-colors hidden sm:block">Sign In</a>
                <a href="#" class="bg-white text-blue-600 px-4 py-2 rounded-lg font-medium hover:bg-blue-50 transition-colors">Get Started</a>

                <!-- Dark Mode Toggle -->
                <div class="hidden sm:flex items-center gap-2">
                    @include('partials.theme-switch')
                </div>
                <!-- End Dark Mode Toggle -->

                <!-- Mobile Menu Button -->
                <button type="button" class="md:hidden navbar-burger text-white focus:outline-none" aria-label="Toggle menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu (Hidden by default) -->
    <div class="md:hidden navbar-menu hidden">
        <div class="px-4 pt-2 pb-4 space-y-2 bg-blue-600/30 dark:bg-blue-400/10 border-t border-white/20">
            <a href="#features" class="block px-3 py-2 text-white/90 hover:text-white transition-colors">Features</a>
            <a href="#pricing" class="block px-3 py-2 text-white/90 hover:text-white transition-colors">Pricing</a>
            <a href="#about" class="block px-3 py-2 text-white/90 hover:text-white transition-colors">About</a>
            <a href="#contact" class="block px-3 py-2 text-white/90 hover:text-white transition-colors">Contact</a>
            <a href="#" class="block px-3 py-2 text-white/90 hover:text-white transition-colors">Sign In</a>
        </div>
    </div>
</nav>
