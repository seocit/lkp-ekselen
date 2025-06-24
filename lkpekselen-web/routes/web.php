<?php

use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\KelasProgramController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PembayaranController;
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

Route::get('/login', function () {
    return view('frontend.login');
})->name('login');

Route::get('/pembayaran/{id}', [PembayaranController::class, 'index'])->name('pembayaran.index');

Route::get('/pembayaran/transfer', function () {
    return view('frontend.pembayaran.transfer');
})->name('pembayaran.transfer');

Route::get('/pendaftaran', [CalonSiswaController::class, 'create'])->name('pendaftaran.create');

Route::post('/pendaftaran', [CalonSiswaController::class, 'store'])->name('pendaftaran.store');

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

Route::get('/materi/create', [MateriController::class, 'create'])->name('materi.create');

Route::post('/materi', [MateriController::class, 'store'])->name('materi.store');

Route::get('/materi/{kelas}', [MateriController::class, 'showByKelas'])->name('materi.kelas');

Route::get('/siswa', [ProgramPelatihanController::class, 'index'])->name('siswa');

Route::get('/siswa_program', [DataSiswaController::class, 'index'])->name('siswa_program.index');

// Route::get('/siswa_program/{siswa:id}', [DataSiswaController::class, 'show'])->name('siswa_program.show');

Route::get('/detail_siswa', [DataSiswaController::class, 'show'])->name('siswa_program.show');

Route::get('/pembayaran_spp', function () {
    return view('dashboard.pembayaran_spp');
})->name('pembayaran spp');
