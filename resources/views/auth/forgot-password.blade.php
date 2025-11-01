<x-layouts.auth>
    {{-- Title --}}
    <x-slot name="title">Forgot Password</x-slot>

    <div class="bg-white rounded-2xl shadow-xl p-8 dark:bg-white/10">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-primary mb-2">Forgot password</h1>
            <p class="text-secondary">
                Enter your email to receive a password reset link.
            </p>
        </div>

        {{-- Success Alert --}}
        @if (session('status'))
        <div class="mb-4 bg-green-100 border border-green-200 text-sm text-green-800 rounded-lg p-4 dark:bg-green-800/10 dark:border-green-900 dark:text-green-500"
            role="alert" tabindex="-1" aria-labelledby="hs-soft-color-success-label">
            <span id="hs-soft-color-success-label" class="font-bold">{{ session('status') }}</span>
        </div>
        @endif

        {{-- Error Alert --}}
        {{-- @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500"
            role="alert" tabindex="-1">
            <ul class="space-y-1">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif --}}

        {{-- Form --}}
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div class="space-y-4">
                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium mb-2 text-primary">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="py-3 px-4 block w-full border @error('email') border-red-500 @else border-primary @enderror rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none bg-primary text-primary"
                        placeholder="name@example.com" required>
                </div>

                {{-- Submit Button --}}
                <button type="submit"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Email Password Reset Link
                </button>

                {{-- Divider --}}
                <div class="py-3 flex items-center text-xs text-gray-400 uppercase before:flex-1 before:border-t before:border-primary before:me-6 after:flex-1 after:border-t after:border-primary after:ms-6 dark:text-neutral-500"
                    hidden>
                    Or
                </div>

                {{-- Social Login --}}
                <div class="space-y-3" hidden>
                    <button type="button"
                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-primary bg-primary text-primary shadow-sm hover:bg-secondary focus:outline-hidden focus:bg-secondary disabled:opacity-50 disabled:pointer-events-none">
                        <svg class="w-4 h-auto" width="46" height="47" viewBox="0 0 46 47" fill="none">
                            <path
                                d="M46 24.0287C46 22.09 45.8533 20.68 45.5013 19.2112H23.4694V27.9356H36.4069C36.1429 30.1094 34.7347 33.37 31.5957 35.5731L31.5663 35.8669L38.5191 41.2719L38.9885 41.3306C43.4477 37.2181 46 31.1669 46 24.0287Z"
                                fill="#4285F4" />
                            <path
                                d="M23.4694 47C29.8061 47 35.1161 44.9144 39.0179 41.3012L31.625 35.5437C29.6301 36.9244 26.9898 37.8937 23.4987 37.8937C17.2793 37.8937 12.0281 33.7812 10.1505 28.1412L9.88649 28.1706L2.61097 33.7812L2.52296 34.0456C6.36608 41.7125 14.287 47 23.4694 47Z"
                                fill="#34A853" />
                            <path
                                d="M10.1212 28.1413C9.62245 26.6725 9.32908 25.1156 9.32908 23.5C9.32908 21.8844 9.62245 20.3275 10.0918 18.8588V18.5356L2.75765 12.8369L2.52296 12.9544C0.909439 16.1269 0 19.7106 0 23.5C0 27.2894 0.909439 30.8731 2.49362 34.0456L10.1212 28.1413Z"
                                fill="#FBBC05" />
                            <path
                                d="M23.4694 9.07688C27.8699 9.07688 30.8622 10.9863 32.5344 12.5725L39.1645 6.11C35.0867 2.32063 29.8061 0 23.4694 0C14.287 0 6.36607 5.2875 2.49362 12.9544L10.0918 18.8588C11.9987 13.1894 17.25 9.07688 23.4694 9.07688Z"
                                fill="#EB4335" />
                        </svg>
                        Sign in with Google
                    </button>
                </div>

                {{-- Return to Login --}}
                <div class="text-center">
                    <a href="{{ route('login') }}"
                        class="text-sm text-blue-600 hover:underline font-medium dark:text-blue-500">Return to login</a>
                </div>
            </div>
        </form>
        {{-- End Form --}}
    </div>
</x-layouts.auth>
