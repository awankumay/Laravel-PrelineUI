<x-layouts.public>
    {{-- Title --}}
    <x-slot name="title">Welcome</x-slot>

    <!-- Include Fixed Navbar -->
    <x-layouts.public.navbar />

    <!-- Hero Section with Full Screen - Simple Blue Background -->
    <div class="relative min-h-screen flex items-center justify-center bg-blue-600">
        <!-- Hero Content - Full Screen Centered -->
        <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center">
                <!-- Main Heading - Responsive Typography -->
                <h1 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-bold text-white mb-4 sm:mb-6 lg:mb-8 leading-tight">
                    Build Your SaaS
                    <span class="block text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-pink-400 mt-2">
                        Faster Than Ever
                    </span>
                </h1>

                <!-- Description - Responsive -->
                <p class="text-base sm:text-lg md:text-xl lg:text-2xl text-white/90 mb-6 sm:mb-8 lg:mb-10 max-w-xs sm:max-w-md md:max-w-2xl lg:max-w-4xl mx-auto leading-relaxed">
                    The complete platform to launch, manage, and scale your SaaS business. Get started with our powerful tools and beautiful components in minutes.
                </p>

                <!-- CTA Buttons - Responsive -->
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 lg:gap-6 justify-center items-center max-w-md sm:max-w-none mx-auto">
                    <a href="#" class="w-full sm:w-auto bg-white text-blue-600 px-6 sm:px-8 lg:px-10 py-3 sm:py-4 lg:py-5 rounded-lg font-semibold text-sm sm:text-base lg:text-lg hover:bg-gray-100 transition-colors">
                        Start Free Trial
                    </a>
                    <a href="#" class="w-full sm:w-auto border-2 border-white text-white px-6 sm:px-8 lg:px-10 py-3 sm:py-4 lg:py-5 rounded-lg font-semibold text-sm sm:text-base lg:text-lg hover:bg-white hover:text-blue-600 transition-colors">
                        Watch Demo
                    </a>
                </div>

                <!-- Optional: Scroll indicator for desktop -->
                <div class="hidden lg:block absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                    <svg class="w-6 h-6 text-white/60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <!-- Features Section -->
    <section id="features" class="py-20 section-bg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">
                    Everything you need to succeed
                </h2>
                <p class="text-xl text-secondary max-w-3xl mx-auto">
                    Our platform provides all the tools and features you need to build, launch, and scale your SaaS business.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="feature-card">
                    <div class="icon-container-blue mb-4">
                        <svg class="w-6 h-6 icon-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary mb-2">Lightning Fast</h3>
                    <p class="text-secondary">Built with performance in mind. Deploy your applications with blazing fast speed and optimal performance.</p>
                </div>

                <!-- Feature 2 -->
                <div class="feature-card">
                    <div class="icon-container-green mb-4">
                        <svg class="w-6 h-6 icon-green" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary mb-2">Secure & Reliable</h3>
                    <p class="text-secondary">Enterprise-grade security with 99.9% uptime guarantee. Your data is safe and always accessible.</p>
                </div>

                <!-- Feature 3 -->
                <div class="feature-card">
                    <div class="icon-container-purple mb-4">
                        <svg class="w-6 h-6 icon-purple" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17v4a2 2 0 002 2h4M13 13h4a2 2 0 012 2v4a2 2 0 01-2 2h-4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary mb-2">Easy Customization</h3>
                    <p class="text-secondary">Fully customizable components and themes. Build your unique brand experience effortlessly.</p>
                </div>

                <!-- Feature 4 -->
                <div class="feature-card">
                    <div class="icon-container-orange mb-4">
                        <svg class="w-6 h-6 icon-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary mb-2">Analytics & Insights</h3>
                    <p class="text-secondary">Comprehensive analytics dashboard to track your growth and make data-driven decisions.</p>
                </div>

                <!-- Feature 5 -->
                <div class="feature-card">
                    <div class="icon-container-pink mb-4">
                        <svg class="w-6 h-6 icon-pink" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary mb-2">Team Collaboration</h3>
                    <p class="text-secondary">Built-in team management and collaboration tools to work efficiently with your team.</p>
                </div>

                <!-- Feature 6 -->
                <div class="feature-card">
                    <div class="icon-container-blue mb-4">
                        <svg class="w-6 h-6 icon-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-primary mb-2">24/7 Support</h3>
                    <p class="text-secondary">Round-the-clock support from our expert team. Get help whenever you need it.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-20 bg-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-primary mb-4">
                    Simple, transparent pricing
                </h2>
                <p class="text-xl text-secondary max-w-3xl mx-auto">
                    Choose the perfect plan for your business. Upgrade or downgrade at any time.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Starter Plan -->
                <div class="bg-secondary p-8 rounded-xl border border-primary">
                    <h3 class="text-xl font-semibold text-primary mb-2">Starter</h3>
                    <p class="text-secondary mb-4">Perfect for small teams</p>
                    <div class="mb-6">
                        <span class="text-3xl font-bold text-primary">$29</span>
                        <span class="text-secondary">/month</span>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-secondary">
                            <svg class="w-5 h-5 text-green-500 dark:text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Up to 5 users
                        </li>
                        <li class="flex items-center text-secondary">
                            <svg class="w-5 h-5 text-green-500 dark:text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            10GB storage
                        </li>
                        <li class="flex items-center text-secondary">
                            <svg class="w-5 h-5 text-green-500 dark:text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Email support
                        </li>
                    </ul>
                    <a href="#" class="w-full btn-secondary py-3 px-4 rounded-lg font-medium text-center block">
                        Get Started
                    </a>
                </div>

                <!-- Professional Plan (Featured) -->
                <div class="bg-blue-600 p-8 rounded-xl text-white relative">
                    <div class="absolute -top-3 left-1/2 transform -translate-x-1/2">
                        <span class="bg-yellow-400 text-blue-900 px-3 py-1 rounded-full text-sm font-medium">Most Popular</span>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Professional</h3>
                    <p class="text-blue-100 mb-4">Best for growing teams</p>
                    <div class="mb-6">
                        <span class="text-3xl font-bold">$99</span>
                        <span class="text-blue-100">/month</span>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Up to 20 users
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            100GB storage
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Priority support
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-green-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Advanced analytics
                        </li>
                    </ul>
                    <a href="#" class="w-full bg-white text-blue-600 py-3 px-4 rounded-lg font-medium text-center block hover:bg-gray-100 transition-colors">
                        Get Started
                    </a>
                </div>

                <!-- Enterprise Plan -->
                <div class="bg-gray-50 dark:bg-zinc-700 p-8 rounded-xl">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Enterprise</h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-4">For large organizations</p>
                    <div class="mb-6">
                        <span class="text-3xl font-bold text-gray-900 dark:text-white">$299</span>
                        <span class="text-gray-600 dark:text-gray-300">/month</span>
                    </div>
                    <ul class="space-y-3 mb-8">
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Unlimited users
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            1TB storage
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            24/7 phone support
                        </li>
                        <li class="flex items-center text-gray-600 dark:text-gray-300">
                            <svg class="w-5 h-5 text-green-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Custom integrations
                        </li>
                    </ul>
                    <a href="#" class="w-full bg-gray-200 dark:bg-zinc-600 text-gray-900 dark:text-white py-3 px-4 rounded-lg font-medium text-center block hover:bg-gray-300 dark:hover:bg-zinc-500 transition-colors">
                        Contact Sales
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section - Simple Blue Background -->
    <section class="py-20 bg-blue-600">
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                Ready to get started?
            </h2>
            <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                Join thousands of companies already using our platform to build amazing SaaS products.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#" class="bg-white text-blue-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                    Start Free Trial
                </a>
                <a href="#" class="border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition-colors">
                    Contact Sales
                </a>
            </div>
        </div>
    </section>

    <!-- Include Footer Component -->
    <x-layouts.public.footer />

    <!-- Add custom styles -->
    <style>
        /* Smooth scroll behavior */
        html {
            scroll-behavior: smooth;
        }

        /* Custom responsive utilities */
        @media (max-width: 640px) {
            .hero-spacing {
                padding-top: 2rem;
                padding-bottom: 2rem;
            }
        }

        @media (min-width: 641px) and (max-width: 1024px) {
            .hero-spacing {
                padding-top: 3rem;
                padding-bottom: 3rem;
            }
        }

        @media (min-width: 1025px) {
            .hero-spacing {
                padding-top: 4rem;
                padding-bottom: 4rem;
            }
        }
    </style>
</x-layouts.public>
