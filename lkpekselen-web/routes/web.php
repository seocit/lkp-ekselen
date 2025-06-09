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

Route::get('/form', function () {
    return view('form');
})->name('form');

Route::get('/inbox', function () {
    return view('inbox');
})->name('inbox');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/materi', function () {
    return view('materi');
})->name('materi');

Route::get('/materi_kelas', function () {
    return view('materi_kelas');
})->name('materi kelas');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/tambah_inbox', function () {
    return view('tambah_inbox');
})->name('tambah inbox');

Route::get('/tambah_materi', function () {
    return view('tambah_materi');
})->name('tambah materi');

Route::get('/siswa', function () {
    return view('siswa');
})->name('siswa');

Route::get('/siswa_program', function () {
    return view('siswa_program');
})->name('siswa program');

Route::get('/pembayaran_daftar', function () {
    return view('pembayaran_daftar');
})->name('pembayaran daftar');

Route::get('/pembayaran_ditempat', function () {
    return view('pembayaran_ditempat');
})->name('pembayaran ditempat');

Route::get('/pembayaran_transfer', function () {
    return view('pembayaran_transfer');
})->name('pembayaran transfer');

Route::get('/pembayaran_spp', function () {
    return view('pembayaran_spp');
})->name('pembayaran spp');

Route::get('/profile_siswa', function () {
    return view('profile_siswa');
})->name('profile siswa');
