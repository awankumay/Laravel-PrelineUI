<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head', [
        'title' => $title ?? null
    ])
</head>

<body class="bg-primary">
    <div class="min-h-screen flex flex-col items-center justify-center responsive-padding-md">
        <div class="grid lg:grid-cols-2 items-center gap-6 max-w-6xl w-full">
            <!-- Left Side - Form -->

            {{-- Toggle Switch Dark Mode --}}
            <div class="absolute top-4 right-4 z-10">
                @include('partials.theme-switch')
            </div>

            <div class="max-w-md w-full mx-auto lg:mx-0">
                {{ $slot }}
            </div>

            <!-- Right Side - Illustration/Image -->
            <div class="max-lg:mt-8 hidden lg:block">
                <img src="{{ asset('assets/images/banner-auth.png') }}"
                    class="w-full mx-auto block object-cover rounded-2xl"
                    alt="Login illustration" />
            </div>
        </div>
    </div>

</body>

</html>
