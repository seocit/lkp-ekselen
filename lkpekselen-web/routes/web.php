<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
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

Route::post('/pembayaran/transfer', [PembayaranController::class, 'store'])->name('pembayaran.transfer.store');

Route::get('/pembayaran/{id}', [PembayaranController::class, 'index'])->name('pembayaran.index');

Route::get('/pendaftaran', [CalonSiswaController::class, 'create'])->name('pendaftaran.create');

Route::post('/pendaftaran', [CalonSiswaController::class, 'store'])->name('pendaftaran.store');

Route::middleware(['auth', IsAdmin::class])->group(function (){

    Route::prefix('inbox')->name('pengumuman.')->controller(PengumumanController::class)->group(function() {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->where('id', '[0-9a-fA-F\-]+')->name('edit');
        Route::put('/{id}', 'update')->where('id', '[0-9a-fA-F\-]+')->name('update');
        Route::delete('/{id}', 'destroy')->name('destroy');
    });

    // Route::get('/inbox', [PengumumanController::class, 'index'])->name('pengumuman.index');

    // Route::get('/inbox/create', [PengumumanController::class, 'create'])->name('pengumuman.create');

    // Route::post('/inbox', [PengumumanController::class, 'store'])->name('pengumuman.store');

    // Route::get('/inbox/{id}/edit', [PengumumanController::class, 'edit'])
    // ->where('id', '[0-9a-fA-F\-]+')
    // ->name('pengumuman.edit');

    // Route::put('/inbox/{id}', [PengumumanController::class, 'update'])
    // ->where('id', '[0-9a-fA-F\-]+')
    // ->name('pengumuman.update');

    // Route::delete('/inbox/{id}', [PengumumanController::class, 'destroy'])->name('pengumuman.destroy');

    Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');

    Route::get('/materi/create', [MateriController::class, 'create'])->name('materi.create');

    Route::post('/materi', [MateriController::class, 'store'])->name('materi.store');

    Route::get('/materi/download/{id}', [MateriController::class, 'download'])->name('materi.download');

    Route::get('/materi/{id}/edit', [MateriController::class, 'edit'])->name('materi.edit');

    Route::put('/materi/{id}', [MateriController::class, 'update'])->name('materi.update');

    Route::delete('/materi/{id}', [MateriController::class, 'destroy'])->name('materi.destroy');

});

// Route::middleware([IsAdmin::class])->get('/tes-admin', function () {
//     return 'Halo Admin';
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
