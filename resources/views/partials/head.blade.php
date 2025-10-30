<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

@hasSection('title')
    <title>@yield('title') - {{ config('app.name') }}</title>
@else
    <title>{{ $title ?? config('app.name') }}</title>
@endif

<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

<!-- Theme Script - Prevent FOUC and set default light mode -->
<script>
    (function() {
        const savedTheme = localStorage.getItem('hs_theme');
        const html = document.documentElement;

        // Default to light mode unless explicitly set to dark
        if (savedTheme === 'dark') {
            html.classList.add('dark');
            html.classList.remove('light');
        } else {
            html.classList.add('light');
            html.classList.remove('dark');
            // Set default to light if not previously set
            if (!savedTheme) {
                localStorage.setItem('hs_theme', 'light');
            }
        }
    })();
</script>

@vite(['resources/css/app.css', 'resources/js/app.js'])
