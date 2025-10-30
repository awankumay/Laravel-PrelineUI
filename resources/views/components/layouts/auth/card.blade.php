<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head', ['title' => $title ?? null])
</head>

<body class="bg-slate-900">
    <div class="flex h-screen items-center justify-center p-4">
        <div class="w-full max-w-md">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
