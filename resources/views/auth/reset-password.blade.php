<x-layouts.auth>
    {{-- Title --}}
    <x-slot name="title">Reset Password</x-slot>

    <div class="bg-white rounded-2xl shadow-xl p-8 dark:bg-white/10">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-primary mb-2">Reset Password</h1>
            <p class="text-secondary">
                {{-- Reset Password Form --}}
                Enter your new password.
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
        @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 dark:bg-red-800/10 dark:border-red-900 dark:text-red-500"
            role="alert" tabindex="-1">
            <ul class="space-y-1">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            {{-- Token --}}
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="space-y-4">
                {{-- Email Field - Read Only --}}
                <div>
                    <label for="email" class="block text-sm font-medium mb-2 text-primary">Email Address</label>
                    <input type="email" id="email" name="email" value="{{ request('email') ?? old('email') }}" readonly
                        class="py-3 px-4 block w-full border border-primary rounded-lg text-sm bg-secondary text-secondary cursor-not-allowed"
                        required autocomplete="email">
                </div>
                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium mb-2 text-primary">New Password</label>
                    <input type="password" id="password" name="password"
                        class="py-3 px-4 block w-full border @error('password') border-red-500 @else border-primary @enderror rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 bg-primary text-primary"
                        placeholder="Enter your new password" required autofocus>
                </div>
                {{-- Confirm Password --}}
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium mb-2 text-primary">Confirm New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="py-3 px-4 block w-full border @error('password_confirmation') border-red-500 @else border-primary @enderror rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 bg-primary text-primary"
                        placeholder="Confirm your new password" required>
                </div>

                {{-- Submit Button --}}
                <button type="submit"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Reset Password
                </button>
            </div>
        </form>
        {{-- End Form --}}
    </div>


</x-layouts.auth>
