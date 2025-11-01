<?php

use App\Livewire;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/admin', function () {
    return view('admin');
});

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
