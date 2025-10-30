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

// Authentication Layout Examples
Route::get('/login-simple', function () {
    return view('auth.login-simple');
})->name('login.simple');

Route::get('/login-card', function () {
    return view('auth.login-card');
})->name('login.card');

Route::get('/login-split', function () {
    return view('auth.login-split');
})->name('login.split');

Route::get('/login-split-dark', function () {
    return view('auth.login-split-dark');
})->name('login.split.dark');

Route::get('/login-split-gradient', function () {
    return view('auth.login-split-gradient');
})->name('login.split.gradient');

Route::get('/login-split-image', function () {
    return view('auth.login-split-image');
})->name('login.split.image');
