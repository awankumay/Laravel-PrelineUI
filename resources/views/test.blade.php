<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">

<head>
    @include('partials.head')
</head>

<body class="m-0 p-0 overflow-x-hidden">
    {{-- Navbar: Fixed di atas --}}
    <nav class="fixed top-0 left-0 right-0 z-50 bg-white shadow-md responsive-padding-md flex justify-between items-center">
        <div class="font-bold responsive-text-xl">Logo</div>
        <ul class="hidden md:flex space-x-6">
            <li><a href="#hero" class="hover:text-blue-600">Beranda</a></li>
            <li><a href="#solusi" class="hover:text-blue-600">Solusi</a></li>
            <li><a href="#testimonial" class="hover:text-blue-600">Testimoni</a></li>
            <li><a href="#kontak" class="hover:text-blue-600">Kontak</a></li>
        </ul>
        <button class="md:hidden text-gray-700">☰</button> <!-- Untuk mobile menu -->
    </nav>

    {{-- Hero: Full screen, dengan offset untuk navbar --}}
    <section id="hero" class="min-h-screen bg-blue-600 text-white flex items-center justify-center pt-16">
        <div class="responsive-container text-center">
            <h1 class="responsive-text-4xl md:responsive-text-5xl font-bold">Selamat Datang di Platform Kami</h1>
        </div>
    </section>

    {{-- Solusi --}}
    <section id="solusi" class="min-h-screen bg-gray-50 flex flex-col items-center justify-center pt-16">
        <div class="responsive-container">
            <h2 class="responsive-text-3xl font-bold text-gray-800 responsive-padding-xl mb-8 md:mb-12">Solusi Kami</h2>

            {{-- Grid 3 kolom --}}
            <div class="responsive-grid responsive-grid-md-3 max-w-6xl w-full">
                <!-- Solusi A -->
                <div class="bg-white responsive-padding-lg rounded-lg shadow-md text-center">
                    <h3 class="responsive-text-xl font-semibold text-gray-700">Solusi A</h3>
                    <p class="mt-3 text-gray-600">Fitur lengkap untuk kebutuhan dasar.</p>
                </div>

                <!-- Solusi B (Promo / Prioritas) -->
                <div class="bg-gradient-to-br from-blue-500 to-indigo-600 responsive-padding-lg rounded-lg shadow-xl text-center text-white relative">
                    <!-- Optional: badge -->
                    <span class="absolute -top-3 left-1/2 transform -translate-x-1/2 bg-yellow-400 text-black text-xs font-bold px-3 py-1 rounded-full">
                        PROMO
                    </span>
                    <h3 class="responsive-text-xl font-bold mt-4">Solusi B</h3>
                    <p class="mt-3 opacity-90">Fitur premium + prioritas support.</p>
                    <button class="mt-4 bg-white text-blue-600 font-semibold responsive-padding-sm responsive-padding-lg rounded-full hover:bg-gray-100 transition">
                        Pilih Sekarang
                    </button>
                </div>

                <!-- Solusi C -->
                <div class="bg-white responsive-padding-lg rounded-lg shadow-md text-center">
                    <h3 class="responsive-text-xl font-semibold text-gray-700">Solusi C</h3>
                    <p class="mt-3 text-gray-600">Solusi enterprise untuk tim besar.</p>
                </div>
        </div>
    </section>

            </div>
        </div>
    </section>

    {{-- Testimonial --}}
    <section id="testimonial" class="min-h-screen bg-yellow-50 flex items-center justify-center pt-16">
        <div class="responsive-container text-center">
            <blockquote class="responsive-text-2xl italic text-gray-700">"Layanan luar biasa dan responsif!"</blockquote>
        </div>
    </section>

    {{-- Kontak + Footer --}}
    <section id="kontak" class="min-h-screen bg-gray-900 text-white flex flex-col justify-between responsive-padding-lg pt-16">
        <div class="flex-1 flex items-center justify-center">
            <div class="responsive-container text-center">
                <h2 class="responsive-text-3xl">Butuh Bantuan? Hubungi Kami!</h2>
            </div>
        </div>
        <footer class="text-center text-gray-400 responsive-padding-md">
            &copy; {{ date('Y') }} Nama Perusahaan. Semua hak dilindungi.
        </footer>
    </section>
</body>

</html>

<script>
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                window.scrollTo({
                    top: target.offsetTop - 60, // offset untuk navbar tinggi ~65px
                    behavior: 'smooth'
                });
            }
        });
    });

</script>
