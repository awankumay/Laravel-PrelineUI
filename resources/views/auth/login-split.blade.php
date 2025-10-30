<x-layouts.auth.split>
    {{-- Title --}}
    <x-slot name="title">Login - Split Layout</x-slot>

    <div class="bg-white border border-primary rounded-2xl shadow-xl p-6 dark:bg-neutral-900">
        <form class="space-y-6">
            <div class="mb-8">
                <h1 class="text-primary text-3xl font-semibold">Sign in</h1>
                <p class="text-secondary text-[15px] mt-4 leading-relaxed">
                    Sign in to your account and explore a world of possibilities. Your journey begins here.
                </p>
            </div>

            <!-- Email -->
            <div>
                <label class="text-primary text-sm font-medium mb-2 block">Email address</label>
                <input name="email" type="email" required
                       class="w-full text-sm text-primary bg-primary border border-primary px-4 py-3 rounded-lg outline-blue-600"
                       placeholder="Enter email address" />
            </div>

            <!-- Password -->
            <div>
                <label class="text-primary text-sm font-medium mb-2 block">Password</label>
                <input name="password" type="password" required
                       class="w-full text-sm text-primary bg-primary border border-primary px-4 py-3 rounded-lg outline-blue-600"
                       placeholder="Enter password" />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex flex-wrap items-center justify-between gap-4">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox"
                           class="h-4 w-4 shrink-0 text-blue-600 focus:ring-blue-500 border-gray-300 rounded dark:bg-neutral-800 dark:border-neutral-700" />
                    <label for="remember-me" class="ml-3 block text-sm text-primary">
                        Remember me
                    </label>
                </div>
                <div class="text-sm">
                    <a href="#" class="text-blue-600 hover:underline font-medium dark:text-blue-500">
                        Forgot your password?
                    </a>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-8!">
                <button type="submit"
                        class="w-full shadow-xl py-2.5 px-4 text-[15px] font-medium tracking-wide rounded-lg text-white bg-blue-600 hover:bg-blue-700 focus:outline-hidden">
                    Sign in
                </button>
                <p class="text-sm mt-6! text-center text-secondary">
                    Don't have an account
                    <a href="#" class="text-blue-600 font-medium hover:underline ml-1 whitespace-nowrap dark:text-blue-500">Register here</a>
                </p>
            </div>
        </form>
    </div>
</x-layouts.auth.split>
