<x-layouts.app title="Dashboard" menu="Admin">
        {{-- Card Style --}}
    <div class="bg-white rounded-2xl shadow-xl p-8 dark:bg-white/10 max-w-3xl mx-auto mt-24">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-primary mb-2">Welcome to SaasFlow!</h1>
            <p class="text-secondary">
                Hello, <strong>{{ auth()->user()->name }}</strong>
                <hr />
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="mt-4 w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                        Logout
                    </button>
                </form>
            </p>
        </div>
    </div>
</x-layouts.app>
