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

Route::get('/test', function () {
    return view('test');
});

Route::get('/dark', function () {
    return view('dark');
});
