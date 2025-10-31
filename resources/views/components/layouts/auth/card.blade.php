<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head', [
        'title' => $title ?? null
    ])
</head>

<body class="bg-primary">
    <div class="relative flex h-screen items-center justify-center responsive-padding-md">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('assets/images/background-light.jpg') }}" alt="Background"
                class="h-full w-full object-cover">
            <div class="absolute inset-0 bg-black/10"></div>
        </div>

        {{-- Toggle Switch Dark Mode --}}
        <div class="absolute top-4 right-4 z-10">
            @include('partials.theme-switch')
        </div>
        <!-- Content -->
        <div class="relative z-10 w-full max-w-md auth-container">
            <div class="auth-card auth-card-md">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
