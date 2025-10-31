<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head', [
    'title' => $title ?? null
    ])
</head>

<body class="bg-white dark:bg-black">
    <div class="min-h-screen flex flex-col items-center justify-center responsive-padding-md">
        <div class="grid lg:grid-cols-2 items-center gap-6 max-w-6xl w-full">

            {{-- Toggle Switch Dark Mode --}}
            <div class="absolute top-4 right-4 z-10">
                @include('partials.theme-switch')
            </div>

            <div class="max-w-md w-full mx-auto lg:mx-0">
                <p>it's work!</p>
            </div>

        </div>
    </div>
</body>

</html>
