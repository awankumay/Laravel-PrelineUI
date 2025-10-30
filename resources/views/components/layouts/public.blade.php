<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">>

<head>
    @include('partials.head')
</head>

<body>
    {{ $slot }}
</body>
</html>
