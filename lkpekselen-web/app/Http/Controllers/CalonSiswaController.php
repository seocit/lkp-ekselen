<?php

namespace App\Http\Controllers;

use id;
use App\Models\User;
use App\Models\DataSiswa;
use App\Models\CalonSiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriKelas;
use App\Models\PilihanJadwal;
use App\Models\PilihanSession;
use App\Models\ProgramPelatihan;
use Illuminate\Support\Facades\Log;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Auth;

class CalonSiswaController extends Controller
{
    public function index(){
        $calon_siswa = CalonSiswa::all();
        return view('dashboard.bukti_pembayaran', compact('calon_siswa'));
    }
    // public function list_calon_siswa(Request $request){
    //     // dd($request->all());
    //     $list_program = ProgramPelatihan::all();
    //     $query = CalonSiswa::with(['kelas_choice.program', 'kategori_kelas', 'Pembayaran_transfer'])
    //     ->whereDoesntHave('dataSiswa');

    //         // 🔍 Filter search nama
    //     if ($request->filled('search')) {
    //         $query->where('nama_siswa', 'like', '%' . $request->search . '%');
    //     }

    //     // 🧪 Filter program
    //     if ($request->filled('program')) {
    //         $query->whereHas('kelas_choice.program', function ($q) use ($request) {
    //             $q->where('id', $request->program);
    //         });
    //     }

    //     $list_calon_siswa = $query->get();

    //     return view('dashboard.calon_siswa', compact('list_calon_siswa', 'list_program'));
    // }

    public function list_calon_siswa(Request $request)
    {
        $list_program = ProgramPelatihan::all();

        $query = CalonSiswa::with(['kelas_choice.program', 'kategori_kelas', 'Pembayaran_transfer'])
            ->whereDoesntHave('dataSiswa');

        
        if ($request->filled('search')) {
            $searchTerm = $request->search;

            $query->where(function ($q) use ($searchTerm) {
                $q->where('nama_siswa', 'like', "%$searchTerm%")
                ->orWhere('alamat', 'like', "%$searchTerm%")
                ->orWhere('no_wa', 'like', "%$searchTerm%")
                ->orWhere('no_registrasi', 'like', "%$searchTerm%");

                
                $q->orWhereHas('kelas_choice.program', function ($sub) use ($searchTerm) {
                    $sub->where('nama_program', 'like', "%$searchTerm%");
                });

                
                $q->orWhereHas('kelas_choice', function ($sub) use ($searchTerm) {
                    $sub->where('nama_kelas', 'like', "%$searchTerm%");
                });

                
                $q->orWhereHas('kategori_kelas', function ($sub) use ($searchTerm) {
                    $sub->where('nama_kategori', 'like', "%$searchTerm%");
                });
            });
        }

        
        if ($request->filled('program')) {
            $query->whereHas('kelas_choice.program', function ($q) use ($request) {
                $q->where('id', $request->program);
            });
        }

        $list_calon_siswa = $query->get();

        return view('dashboard.calon_siswa', compact('list_calon_siswa', 'list_program'));
    }

    public function create(){
        $programs = ProgramPelatihan::with('kelas')->get();
        $sessions = PilihanSession::orderby('label')->get();
        $jadwals = PilihanJadwal::all();
        $kategori_kelas = KategoriKelas::all();

        return view('frontend.form', compact('programs', 'sessions', 'jadwals', 'kategori_kelas'));
    }
    public function store(Request $request)
    {
        // Ambil program terlebih dahulu
        $program = ProgramPelatihan::find($request->id_program);

        // Validasi dasar
        $rules = [
        'nama_siswa' => 'required|string|max:255',
        
        'alamat' => 'required|string|max:255',
        'no_wa' => 'required|string|max:14',
        'tempat_lahir' => 'required|string|max:100',
        'tanggal_lahir' => 'required|date',
        'asal_sekolah' => 'nullable|string|max:255',
        'nama_ortu' => 'nullable|string|max:255',
        'pekerjaan_ortu' => 'nullable|string|max:255',
        
        'id_program' => 'required|exists:program_pelatihans,id',
        'id_kelas' => 'required|exists:kelas_programs,id',
        'id_session' => 'required|exists:pilihan_sessions,id',
        'id_jadwal' => 'required|exists:pilihan_jadwals,id',
        ];

        // Jika program adalah MIPA, tambahkan validasi kategori
        if ($program && strtolower($program->nama_program) === 'mipa') {
        $rules['id_kategori_kelas'] = 'required|exists:kategori_kelas,id';
        }
        
        if (Auth::user()->calonSiswa) {
            return redirect()->route('home')->with('error', 'Anda sudah mendaftar.');
        }
        

        $today = now()->format('Ymd');
        $jumlahHariIni = CalonSiswa::whereDate('created_at', today())->count() + 1;
        $noReg = 'REG-' . $today . '-' . str_pad($jumlahHariIni, 4, '0', STR_PAD_LEFT);

        
        // Lakukan validasi lengkap
        $validated = $request->validate($rules);

        // Simpan data
        $pendaftar = CalonSiswa::create([
        'id' => Str::uuid(),
        ...$validated,
        'id_kategori_kelas' => $request->id_kategori_kelas ?? null,
        'tanggal_daftar' => now(),
        'user_id' => Auth::id(),
        'no_registrasi' => $noReg,
        ]);

        $user = Auth::user();
        $user->id_calonSiswa = $pendaftar->id;
        $user->save();

        // Redirect ke halaman pembayaran
        return redirect()->route('pembayaran.index', ['id' => $pendaftar->id])
            ->with('success', 'Pendaftaran berhasil. Silakan lanjutkan ke pembayaran!');
    }
    public function createFromAdmin(){
        $programs = ProgramPelatihan::with('kelas')->get();
        $sessions = PilihanSession::orderby('label')->get();
        $jadwals = PilihanJadwal::all();
        $kategori_kelas = KategoriKelas::all();

        return view('dashboard.tambah_siswa', compact('programs', 'sessions', 'jadwals', 'kategori_kelas'));
    }
    public function storeFromAdmin(Request $request)
    {
        // Ambil program terlebih dahulu
        $program = ProgramPelatihan::find($request->id_program);

        // Validasi dasar
        $rules = [
        'no_registrasi' => 'required|string|max:50|unique:calon_siswas,no_registrasi',
        'nama_siswa' => 'required|string|max:255',
        'alamat' => 'required|string|max:255',
        'no_wa' => 'required|string|max:14',
        'tempat_lahir' => 'required|string|max:100',
        'tanggal_lahir' => 'required|date',
        'asal_sekolah' => 'nullable|string|max:255',
        'nama_ortu' => 'nullable|string|max:255',
        'pekerjaan_ortu' => 'nullable|string|max:255',
        'user_id' => 'required|exists:users,id',
        'id_program' => 'required|exists:program_pelatihans,id',
        'id_kelas' => 'required|exists:kelas_programs,id',
        'id_session' => 'required|exists:pilihan_sessions,id',
        'id_jadwal' => 'required|exists:pilihan_jadwals,id',
        ];

        // Jika program adalah MIPA, tambahkan validasi kategori
        if ($program && strtolower($program->nama_program) === 'mipa') {
        $rules['id_kategori_kelas'] = 'required|exists:kategori_kelas,id';
        }

        // Lakukan validasi lengkap
        $validated = $request->validate($rules);

        // Simpan data
        $pendaftar = CalonSiswa::create([
        'id' => Str::uuid(),
        ...$validated,
        'id_kategori_kelas' => $request->id_kategori_kelas ?? null,
        'tanggal_daftar' => now()
        ]);

        User::where('id', $request->user_id)->update([
            'id_siswa' => $pendaftar->id,
        ]);

        // Redirect ke halaman pembayaran
        return redirect()->route('tambah-siswa')
            ->with('success', 'Pendaftaran berhasil. Silakan lanjutkan ke pembayaran!');
    }
    public function promoteToSiswa(Request $request)
    {
        // dd($request->all());
        $request->validate([
        'calon_siswa_ids' => 'required|array',
        ]);

        foreach ($request->calon_siswa_ids as $idCalon) {
            try {
                $calon = CalonSiswa::with('user')->findOrFail($idCalon);
                if (!DataSiswa::where('id_calon_siswa', $idCalon)->exists()) {
                    $datasiswa = DataSiswa::create([
                        'id' => Str::uuid(),
                        'id_calon_siswa' => $idCalon,
                        'status' => 'aktif',
                        'tanggal_masuk' => now(), // atau now()->toDateString() jika kolomnya DATE
                    ]);

                    if ($calon->user) {
                        $user = $calon->user;
                        $user->id_siswa = $datasiswa->id;
                        $user->save();

                        // Update role user ke "siswa"
                        $user->syncRoles('siswa');
                    }
                    Log::info("Berhasil mempromosikan calon siswa: " . $idCalon);
                }
            } catch (\Exception $e) {
                Log::error("Gagal mempromosikan calon siswa $idCalon: " . $e->getMessage());
            }
        }

        return redirect()->back()->with('success', 'Calon siswa berhasil dipindahkan menjadi siswa aktif.');
    }

    public function cekStatus($id)
    {
        $user = User::findOrFail($id); 

        $pendaftar = $user->calonSiswa;
        return view('frontend/cekPendaftaran', compact('pendaftar'));
    }
    
}
