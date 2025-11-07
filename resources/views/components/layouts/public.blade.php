<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">

<head>
    @include('partials.head')
</head>

<body class="text-primary">
    {{ $slot }}

    <!-- Cookie Consent -->
    @include('cookie-consent::index')
</body>
</html>
