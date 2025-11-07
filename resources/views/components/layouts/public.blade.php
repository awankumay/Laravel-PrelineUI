<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">

<head>
    @include('partials.head')
</head>

<body class="text-primary">
    {{ $slot }}

    {{-- Banner --}}
    @include('partials.banner')

    {{-- Cookie Consent Banner --}}
    @include('cookie-consent::index')
</body>
</html>
