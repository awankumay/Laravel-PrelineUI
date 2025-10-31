<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head', [
        'title' => $title ?? null
    ])
</head>

<body class="bg-secondary">
    <div class="relative flex h-screen items-center justify-center responsive-padding-md">
        {{-- Toggle Switch Dark Mode --}}
        <div class="absolute top-4 right-4 z-10">
            @include('partials.theme-switch')
        </div>

        <div class="w-full max-w-md auth-container">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
