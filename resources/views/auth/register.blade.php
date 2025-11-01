<x-layouts.auth>
    {{-- Title --}}
    <x-slot name="title">Register</x-slot>

    <div class="bg-white rounded-2xl shadow-xl p-8 dark:bg-white/10">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-primary mb-2">Create an account</h1>
            <p class="text-secondary">
                Already have an account?
                <a href="#" class="text-blue-600 hover:underline font-medium dark:text-blue-500">Log in</a>.
            </p>
        </div>

        <!-- Form -->
        <form>
            <div class="space-y-4">
                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium mb-2 text-primary">Name</label>
                    <input type="text" id="name" name="name"
                        class="py-3 px-4 block w-full border border-primary rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none bg-primary text-primary"
                        placeholder="Your full name" required>
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium mb-2 text-primary">Email</label>
                    <input type="email" id="email" name="email"
                        class="py-3 px-4 block w-full border border-primary rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none bg-primary text-primary"
                        placeholder="Your email address" required>
                </div>
                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium mb-2 text-primary">Password</label>
                    <input type="password" id="password" name="password"
                        class="py-3 px-4 block w-full border border-primary rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none bg-primary text-primary"
                        placeholder="Create a password" required>
                </div>
                <!-- Submit Button -->
                <button type="submit"
                    class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                    Register
                </button>
            </div>
        </form>
    </div>
</x-layouts.auth>
