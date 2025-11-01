<x-layouts.auth>
    {{-- Title --}}
    <x-slot name="title">Register</x-slot>

    <div class="bg-white rounded-2xl shadow-xl p-8 dark:bg-white/10">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-primary mb-2">Create an account</h1>
            <p class="text-secondary">
                Already have an account?
                <a href="{{ route('login') }}" class="text-blue-600 hover:underline font-medium dark:text-blue-500">Log
                    in</a>.
            </p>
        </div>

        {{-- Form --}}
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="space-y-4">
                {{-- Name --}}
                <div>
                    <label for="name" class="block text-sm font-medium mb-2 text-primary">Name</label>
                    <input type="text" id="name" name="name"
                        class="py-3 px-4 block w-full border border-primary rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none bg-primary text-primary"
                        placeholder="Your full name" required>
                    @error('name')
                    <div class="mt-2 bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500"
                        role="alert" tabindex="-1" aria-labelledby="hs-soft-color-danger-label">
                        <span id="hs-soft-color-danger-label" class="font-bold">{{ $message }}</span>
                    </div>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium mb-2 text-primary">Email</label>
                    <input type="email" id="email" name="email"
                        class="py-3 px-4 block w-full border border-primary rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none bg-primary text-primary"
                        placeholder="Your email address" required>
                    @error('email')
                    <div class="mt-2 bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500"
                        role="alert" tabindex="-1" aria-labelledby="hs-soft-color-danger-label">
                        <span id="hs-soft-color-danger-label" class="font-bold">{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium mb-2 text-primary">Password</label>
                    <input type="password" id="password" name="password"
                        class="py-3 px-4 block w-full border border-primary rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none bg-primary text-primary"
                        placeholder="Create a password" required>
                    @error('password')
                    <div class="mt-2 bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500"
                        role="alert" tabindex="-1" aria-labelledby="hs-soft-color-danger-label">
                        <span id="hs-soft-color-danger-label" class="font-bold">{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                {{-- Confirm Password --}}
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium mb-2 text-primary">Confirm
                        Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="py-3 px-4 block w-full border border-primary rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none bg-primary text-primary"
                        placeholder="Confirm your password" required>
                    @error('password_confirmation')
                    <div class="mt-2 bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500"
                        role="alert" tabindex="-1" aria-labelledby="hs-soft-color-danger-label">
                        <span id="hs-soft-color-danger-label" class="font-bold">{{ $message }}</span>
                    </div>
                    @enderror
                </div>
                <div>
                    <label for="terms" class="flex items-center gap-2">
                        <input id="terms" name="terms" type="checkbox"
                            class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                        <span class="text-sm text-primary">I agree to the <a href="#"
                                class="text-blue-600 hover:underline font-medium dark:text-blue-500">Terms of
                                Service</a>
                            and <a href="#" class="text-blue-600 hover:underline font-medium dark:text-blue-500">Privacy
                                Policy</a>.
                        </span>
                    </label>
                </div>
                {{-- Submit Button --}}
                <button type="submit"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Register
                </button>
            </div>
        </form>
    </div>
</x-layouts.auth>
