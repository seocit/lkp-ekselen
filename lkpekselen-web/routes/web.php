    <?php

    use App\Http\Controllers\Auth\RegisterController;
    use App\Http\Controllers\CalonSiswaController;
use App\Http\Controllers\DataSiswaController;
use App\Http\Controllers\ExportController;
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

        //pengumuman 
        Route::prefix('inbox')->name('pengumuman.')->controller(PengumumanController::class)->group(function() {
            Route::get('/', 'index')->name('index');
            Route::get('/create', 'create')->name('create')->middleware('can:view_tambah_siswa');
            Route::post('/', 'store')->name('store')->middleware('can:view_tambah_siswa');
            Route::get('/{id}/edit', 'edit')->where('id', '[0-9a-fA-F\-]+')->name('edit')->middleware('can:view_tambah_siswa');
            Route::put('/{id}', 'update')->where('id', '[0-9a-fA-F\-]+')->name('update')->middleware('can:view_tambah_siswa');
            Route::delete('/{id}', 'destroy')->name('destroy')->middleware('can:view_tambah_siswa');;
        });
        //pengumuman end

        //materi
        Route::prefix('materi')->name('materi.')->controller(MateriController::class)->group(function() {
            Route::get('/','index')->name('index');
            Route::get('/create', 'create')->name('create');
            Route::post('/','store')->name('store');
            Route::get('/download/{id}', 'download')->name('download');
            Route::get('/materi/{id}/edit', 'edit')->name('edit');
            Route::put('/{id}','update')->name('update');
            Route::delete('/{id}','destroy')->name('destroy');
        });
        //materi end

        // dataSiswa
        Route::prefix('data-siswa')->name('data-siswa.')->controller(DataSiswaController::class)->group(function() {
            Route::get('/','index')->name('index')->middleware('can:view_data_siswa');
            Route::get('/{id}','show')->name('show')->middleware('can:view_data_siswa');
            Route::put('/{id}/update-status', 'updateStatus')->name('update-status')->middleware('can:view_data_siswa');
           
        });

        Route::get('/export-siswa', [ExportController::class, 'exportSiswa'])->name('export.siswa');
        //dataSiswa end

        //pembayaran spp
        Route::get('pembayaran_spp', function (){
            return view('dashboard.pembayaran_spp');
        })->name('pembayaran_spp');
        //pembayaran spp end

        //pembayaran siswa
        Route::get('/data_calon_siswa', [CalonSiswaController::class, 'list_calon_siswa'])->name('calon-siswa.list')->middleware('can:view_calon_siswa');
        
        Route::post('/data_calon_siswa/promote', [CalonSiswaController::class, 'promoteToSiswa'])->name('calon-siswa.promote')->middleware('can:view_calon_siswa');
        //pembayaran siswa end
        
        //bukti pembayaran siswa
        Route::get('/bukti-pembayaran-siswa', [CalonSiswaController::class, 'index'])->name('bukti-pembayaran-siswa')->middleware('can:view_bukti_pembayaran');
        //bukti pembayaran siswa end

        //tambah siswa admin
        Route::get('/tambah-siswa', [CalonSiswaController::class, 'createFromAdmin'])->name('tambah-siswa')->middleware('can:view_tambah_siswa');
        Route::post('/tambah-siswa', [CalonSiswaController::class, 'storeFromAdmin'])->name('tambah-siswa.store')->middleware('can:view_tambah_siswa');
        // tambah siswa admin end

        

       

        

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
