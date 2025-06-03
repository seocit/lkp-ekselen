<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
})->name('home');

Route::get('/about', function () {
    return view('About');
})->name('about');

Route::get('/bing', function () {
    return view('Bing');
})->name('bing');

Route::get('/mipa', function () {
    return view('Mipa');
})->name('mipa');

Route::get('/komputer', function () {
    return view('Komputer');
})->name('komputer');

