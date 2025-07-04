<?php

use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\KelasProgramController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProgramPelatihanController;
use App\Models\CalonSiswa;
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

Route::get('/pembayaran/transfer', function () {
    return view('frontend.pembayaran.transfer');
})->name('pembayaran.transfer');


Route::post('/pembayaran/transfer', [PembayaranController::class, 'store'])->name('pembayaran.transfer.store');

Route::get('/pembayaran/{id}', [PembayaranController::class, 'index'])->name('pembayaran.index');



Route::get('/pendaftaran', [CalonSiswaController::class, 'create'])->name('pendaftaran.create');

Route::post('/pendaftaran', [CalonSiswaController::class, 'store'])->name('pendaftaran.store');

Route::get('/tambah-siswa', [CalonSiswaController::class, 'createFromAdmin'])->name('add.siswa');

Route::post('/tambah-siswa', [CalonSiswaController::class, 'storeFromAdmin'])->name('store.siswa');

Route::get('/bukti_pembayaran_siswa',[CalonSiswaController::class, 'index'])->name('bukti pembayaran');

Route::get('/export-siswa', [ExportController::class, 'exportSiswa'])->name('export.siswa');

Route::get('/data-siswa', [DataSiswaController::class, 'index'])->name('data-siswa.index');

Route::get('/data-siswa/{id}', [DataSiswaController::class, 'show'])->name('data-siswa.show');

Route::put('/data-siswa/{id}/update-status', [DataSiswaController::class, 'updateStatus'])->name('data-siswa.update-status');

Route::get('/data_calon_siswa', [CalonSiswaController::class, 'list_calon_siswa'])->name('calon_siswa.list');

Route::post('/calon-siswa/promote', [CalonSiswaController::class, 'promoteToSiswa'])->name('calon-siswa.promote');

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

// Route::get('/materi', [KelasProgramController::class, 'index'])->name('materi');

Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');

Route::get('/materi/create', [MateriController::class, 'create'])->name('materi.create');

Route::post('/materi', [MateriController::class, 'store'])->name('materi.store');

Route::get('/materi/download/{id}', [MateriController::class, 'download'])->name('materi.download');

// Route::get('/materi/{kelas}', [MateriController::class, 'showByKelas'])->name('materi.kelas');

Route::get('/materi/{id}/edit', [MateriController::class, 'edit'])->name('materi.edit');

Route::put('/materi/{id}', [MateriController::class, 'update'])->name('materi.update');

Route::delete('/materi/{id}', [MateriController::class, 'destroy'])->name('materi.destroy');

// Route::get('/siswa', [ProgramPelatihanController::class, 'index'])->name('siswa');

Route::get('/siswa_program', [DataSiswaController::class, 'index'])->name('siswa_program.index');

// Route::get('/siswa_program/{siswa:id}', [DataSiswaController::class, 'show'])->name('siswa_program.show');

Route::get('/detail_siswa', [DataSiswaController::class, 'show'])->name('siswa_program.show');

Route::get('/pembayaran_spp', function () {
    return view('dashboard.pembayaran_spp');
})->name('pembayaran spp');
