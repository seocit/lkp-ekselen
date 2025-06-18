<?php

use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\KelasProgramController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProgramPelatihanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('frontend.home');
})->name('home');

Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

Route::get('/bing', function () {
    return view('frontend.bing');
})->name('bing');

Route::get('/mipa', function () {
    return view('frontend.mipa');
})->name('mipa');

Route::get('/komputer', function () {
    return view('frontend.komputer');
})->name('komputer');

Route::get('/form', function () {
    return view('frontend.form');
})->name('form');

Route::get('/login', function () {
    return view('frontend.login');
})->name('login');

Route::get('/pembayaran_daftar', function () {
    return view('frontend.pembayaran_daftar');
})->name('pembayaran daftar');

Route::get('/pembayaran_ditempat', function () {
    return view('frontend.pembayaran_ditempat');
})->name('pembayaran ditempat');

Route::get('/pembayaran_transfer', function () {
    return view('frontend.pembayaran_transfer');
})->name('pembayaran transfer');

Route::get('/bukti_pembayaran_siswa',[CalonSiswaController::class, 'index'])->name('bukti pembayaran');

Route::get('/inbox', [PengumumanController::class, 'index'])->name('inbox');

Route::get('/inbox/create', [PengumumanController::class, 'create'])->name('pengumuman.create');

Route::post('/inbox', [PengumumanController::class, 'store'])->name('pengumuman.store');

Route::get('/inbox/{id}/edit', [PengumumanController::class, 'edit'])
->where('id', '[0-9a-fA-F\-]+')
->name('pengumuman.edit');

Route::put('/inbox/{id}', [PengumumanController::class, 'update'])
->where('id', '[0-9a-fA-F\-]+')
->name('pengumuman.update');

Route::delete('/pengumuman/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');

Route::get('/materi', [KelasProgramController::class, 'index'])->name('materi');

Route::get('/materi_kelas/{kelas}', [MateriController::class, 'showByKelas'])->name('materi kelas');

Route::get('/materi_kelas/create', [MateriController::class, 'create'])->name('tambah materi');

Route::post('/materi', [MateriController::class, ''])->name('materi.store');

Route::get('/siswa', [ProgramPelatihanController::class, 'index'])->name('siswa');

Route::get('/siswa_program', [DataSiswaController::class, 'index'])->name('siswa_program.index');

// Route::get('/siswa_program/{siswa:id}', [DataSiswaController::class, 'show'])->name('siswa_program.show');

Route::get('/detail_siswa', [DataSiswaController::class, 'show'])->name('siswa_program.show');

Route::get('/pembayaran_spp', function () {
    return view('dashboard.pembayaran_spp');
})->name('pembayaran spp');
