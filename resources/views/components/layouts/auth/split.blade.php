<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('partials.head', ['title' => $title ?? null])
</head>

<body class="bg-secondary">
    <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4">
        <div class="grid lg:grid-cols-2 items-center gap-6 max-w-6xl w-full">
            <!-- Left Side - Form -->
            <div class="max-w-md w-full mx-auto lg:mx-0">
                {{ $slot }}
            </div>

            <!-- Right Side - Illustration/Image -->
            <div class="max-lg:mt-8">
                <img src="https://readymadeui.com/login-image.webp"
                     class="w-full aspect-71/50 max-lg:w-4/5 mx-auto block object-cover rounded-2xl"
                     alt="Login illustration" />
            </div>
        </div>
    </div>
</body>
</html>
