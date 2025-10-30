# 🌓 Dark Mode Implementation Guide

## Overview
Aplikasi ini menggunakan **class-based dark mode** dengan Tailwind CSS v4. Dark mode toggle sudah terintegrasi dan dapat digunakan di semua halaman.

## 📋 Cara Kerja

### 1. HTML Class Toggle
Dark mode diaktifkan dengan menambahkan class `dark` ke element `<html>`:
```html
<html class="dark">  <!-- Dark mode active -->
<html class="light"> <!-- Light mode active -->
```

### 2. JavaScript Handler
File `resources/js/app.js` menangani:
- ✅ Toggle antara light/dark mode
- ✅ Menyimpan preference user di `localStorage`
- ✅ Deteksi system preference
- ✅ Update visibility button toggle

### 3. CSS Custom Classes
File `resources/css/app.css` menyediakan custom classes yang **konsisten** dan **reusable**.

---

## 🎨 Custom Classes yang Tersedia

### Background Colors

#### `.bg-primary`
Background utama - putih di light mode, neutral-900 di dark mode
```blade
<div class="bg-primary">
    <!-- Konten dengan background primary -->
</div>
```

#### `.bg-secondary`
Background sekunder - gray-50 di light mode, neutral-800 di dark mode
```blade
<div class="bg-secondary">
    <!-- Background lebih soft -->
</div>
```

### Text Colors

#### `.text-primary`
Text warna utama - gray-900 di light mode, white di dark mode
```blade
<h1 class="text-primary">Judul Utama</h1>
```

#### `.text-secondary`
Text warna sekunder - gray-600 di light mode, gray-300 di dark mode
```blade
<p class="text-secondary">Deskripsi atau subtitle</p>
```

#### `.text-muted`
Text warna muted - gray-500 di light mode, gray-400 di dark mode
```blade
<small class="text-muted">Informasi tambahan</small>
```

### Border Colors

#### `.border-primary`
Border warna standard - gray-200 di light mode, neutral-700 di dark mode
```blade
<div class="border border-primary">
    <!-- Element dengan border -->
</div>
```

### Section & Layout

#### `.section-bg`
Background untuk section - gray-50 di light mode, neutral-900 di dark mode
```blade
<section class="section-bg py-20">
    <!-- Section content -->
</section>
```

#### `.feature-card`
Card untuk feature section dengan hover effect
```blade
<div class="feature-card">
    <h3 class="text-primary">Feature Title</h3>
    <p class="text-secondary">Feature description</p>
</div>
```

### Icon Containers

Containers dengan warna background dan responsive terhadap dark mode:

```blade
<!-- Blue Icon -->
<div class="icon-container-blue">
    <svg class="w-6 h-6 icon-blue">...</svg>
</div>

<!-- Green Icon -->
<div class="icon-container-green">
    <svg class="w-6 h-6 icon-green">...</svg>
</div>

<!-- Purple Icon -->
<div class="icon-container-purple">
    <svg class="w-6 h-6 icon-purple">...</svg>
</div>

<!-- Pink Icon -->
<div class="icon-container-pink">
    <svg class="w-6 h-6 icon-pink">...</svg>
</div>

<!-- Orange Icon -->
<div class="icon-container-orange">
    <svg class="w-6 h-6 icon-orange">...</svg>
</div>
```

### Icon Colors

Untuk mewarnai icon SVG:

```blade
<svg class="icon-blue">...</svg>
<svg class="icon-green">...</svg>
<svg class="icon-purple">...</svg>
<svg class="icon-pink">...</svg>
<svg class="icon-orange">...</svg>
```

### Buttons

#### `.btn-secondary`
Button dengan style sekunder yang responsive terhadap dark mode
```blade
<button class="btn-secondary px-6 py-3 rounded-lg">
    Click Me
</button>
```

#### `.theme-toggle-light` & `.theme-toggle-dark`
Untuk dark mode toggle buttons (sudah digunakan di admin layout)
```blade
<button type="button" class="theme-toggle-dark" data-hs-theme-click-value="dark">
    <svg>...</svg>
</button>

<button type="button" class="theme-toggle-light hidden" data-hs-theme-click-value="light">
    <svg>...</svg>
</button>
```

---

## 📝 Best Practices

### ✅ DO (Lakukan):

1. **Gunakan custom classes untuk konsistensi:**
   ```blade
   <!-- GOOD -->
   <div class="bg-primary text-primary">Content</div>
   ```

2. **Gabungkan dengan Tailwind utilities:**
   ```blade
   <!-- GOOD -->
   <div class="bg-primary text-primary p-6 rounded-lg">Content</div>
   ```

3. **Gunakan icon containers untuk consistency:**
   ```blade
   <!-- GOOD -->
   <div class="icon-container-blue mb-4">
       <svg class="icon-blue w-6 h-6">...</svg>
   </div>
   ```

### ❌ DON'T (Jangan):

1. **Jangan hardcode colors tanpa dark mode:**
   ```blade
   <!-- BAD - tidak ada dark mode support -->
   <div class="bg-white text-gray-900">Content</div>
   
   <!-- GOOD - gunakan custom classes -->
   <div class="bg-primary text-primary">Content</div>
   ```

2. **Jangan mix zinc/neutral tanpa konsistensi:**
   ```blade
   <!-- BAD - tidak konsisten -->
   <div class="bg-zinc-800 text-neutral-100">...</div>
   
   <!-- GOOD -->
   <div class="bg-secondary text-primary">...</div>
   ```

---

## 🔧 Menambah Toggle Button ke Page Baru

### Public Pages (Marketing):
```blade
<!-- Di navbar atau header -->
<button type="button"
    class="size-9 flex justify-center items-center hover:bg-gray-100 dark:hover:bg-neutral-700 rounded-lg"
    data-hs-theme-click-value="dark">
    <svg class="size-5">
        <path d="M12 3a6 6 0 0 0 9 9 9 9 0 1 1-9-9Z"></path>
    </svg>
</button>

<button type="button"
    class="size-9 flex justify-center items-center hover:bg-gray-100 dark:hover:bg-neutral-700 rounded-lg hidden"
    data-hs-theme-click-value="light">
    <svg class="size-5">
        <circle cx="12" cy="12" r="4"></circle>
        <path d="M12 2v2"></path>
        <!-- ... sun icon paths ... -->
    </svg>
</button>
```

### Admin Pages:
```blade
<!-- Sudah tersedia di components/admin/default.blade.php -->
<button type="button" class="theme-toggle-dark" data-hs-theme-click-value="dark">
    <!-- Moon icon -->
</button>

<button type="button" class="theme-toggle-light hidden" data-hs-theme-click-value="light">
    <!-- Sun icon -->
</button>
```

---

## 🎯 Contoh Implementasi Lengkap

### Feature Section:
```blade
<section class="section-bg py-20">
    <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-primary mb-4">
            Our Features
        </h2>
        <p class="text-secondary mb-8">
            Everything you need to succeed
        </p>

        <div class="grid md:grid-cols-3 gap-8">
            <!-- Feature Card 1 -->
            <div class="feature-card">
                <div class="icon-container-blue mb-4">
                    <svg class="icon-blue w-6 h-6">
                        <!-- Icon SVG -->
                    </svg>
                </div>
                <h3 class="text-primary font-semibold mb-2">Feature Title</h3>
                <p class="text-secondary">Feature description here</p>
            </div>

            <!-- More cards... -->
        </div>
    </div>
</section>
```

### Pricing Cards:
```blade
<section class="bg-primary py-20">
    <div class="max-w-7xl mx-auto px-4">
        <div class="bg-secondary p-8 rounded-xl border border-primary">
            <h3 class="text-primary font-semibold mb-2">Plan Name</h3>
            <p class="text-secondary mb-4">Plan description</p>
            
            <button class="btn-secondary w-full py-3 rounded-lg">
                Get Started
            </button>
        </div>
    </div>
</section>
```

---

## 🐛 Troubleshooting

### Toggle Button Tidak Berfungsi
**Solusi:**
1. Pastikan `resources/js/app.js` sudah ter-import
2. Check console browser untuk error JavaScript
3. Pastikan button memiliki attribute `data-hs-theme-click-value="dark"` atau `"light"`
4. Run `npm run build` untuk rebuild assets

### Dark Mode Tidak Persisten
**Solusi:**
1. Check localStorage di browser devtools
2. Pastikan `HSThemeAppearance.init()` dipanggil
3. Clear browser cache

### Custom Classes Tidak Bekerja
**Solusi:**
1. Run `npm run build` untuk compile CSS
2. Pastikan tidak ada typo di class name
3. Check file `public/build/manifest.json` sudah updated

---

## 📚 Resources

- [Tailwind CSS v4 Dark Mode](https://tailwindcss.com/docs/dark-mode)
- [Preline UI Components](https://preline.co/)
- File Implementation:
  - `resources/css/app.css` - Custom dark mode classes
  - `resources/js/app.js` - Theme toggle logic
  - `resources/views/components/layouts/public.blade.php` - Public layout
  - `resources/views/components/admin/default.blade.php` - Admin layout

---

## 🎉 Summary

✅ Dark mode sudah terintegrasi dengan baik  
✅ Custom classes tersedia untuk konsistensi  
✅ Toggle button berfungsi di public & admin  
✅ Preference tersimpan di localStorage  
✅ Support system preference detection  
✅ Semua component reusable untuk halaman baru  

**Happy coding! 🚀**
