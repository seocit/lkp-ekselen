<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use App\Models\KategoriKelas;
use App\Models\PilihanJadwal;
use App\Models\PilihanSession;
use App\Models\ProgramPelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CalonSiswaController extends Controller
{
    public function index(){
        $calon_siswa = CalonSiswa::all();
        return view('dashboard.bukti_pembayaran', compact('calon_siswa'));
    }
    public function create(){
        $programs = ProgramPelatihan::with('kelas')->get();
        $sessions = PilihanSession::orderby('label')->get();
        $jadwals = PilihanJadwal::all();
        $kategori_kelas = KategoriKelas::all();

        return view('frontend.form', compact('programs', 'sessions', 'jadwals', 'kategori_kelas'));
    }
    public function store(Request $request){
        // dd(['STORE MASUK', $request->all()]);


        $validated = $request->validate([
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
        ]);

        // dd($request->all());

        $pendaftar = CalonSiswa::create([
            'id' => Str::uuid(),
            ...$validated,
            'tanggal_daftar' => now()
        ]);

        return redirect()->route('pembayaran.index', ['id' => $pendaftar->id])
        ->with('success', 'Pendaftaran berhasil. Silakan lanjutkan ke pembayaran!');
    }
}
