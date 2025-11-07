<?php

use App\Http\Controllers\Admin\CookieConsentDashboardController;
use App\Livewire;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

// Route::get('/admin', function () {
//     return view('admin');
// });

Route::get('/counter', Livewire\Counter::class);

Route::get('/test', function () {
    return view('test');
});

Route::get('/dark', function () {
    return view('dark');
});

// Middleware Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');
});

// Admin Routes (you can add middleware like 'auth' here)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/cookie-consent', [CookieConsentDashboardController::class, 'index'])
        ->name('cookie-consent.dashboard');
    Route::get('/cookie-consent/export', [CookieConsentDashboardController::class, 'export'])
        ->name('cookie-consent.export');
    Route::post('/cookie-consent/cleanup', [CookieConsentDashboardController::class, 'cleanup'])
        ->name('cookie-consent.cleanup');
});
