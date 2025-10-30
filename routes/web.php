<?php
use App\Livewire;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/counter', Livewire\Counter::class);

// Test routes for error pages (remove in production)
if (app()->environment(['local', 'testing'])) {
    Route::get('/test-error/{code}', function ($code) {
        abort($code);
    })->where('code', '[0-9]+');
}
