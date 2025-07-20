<?php

namespace App\Http\Controllers;

use auth;

use App\Models\CalonSiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PembayaranTransfer;
use App\Http\Controllers\Controller;



class PembayaranController extends Controller
{
    public function index($id){
        $pendaftar = CalonSiswa::with(['kelas_choice'])->findOrFail($id);
        return view('frontend.pembayaran.index', compact('pendaftar'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'tipe_pembayaran' => 'required|in:pendaftaran,spp',
            'id_refrensi' => 'required|uuid',
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $filename = now()->format('Y-m') . '_' . Str::random(8) . '.' . $request->file('bukti_transfer')->getClientOriginalExtension();
        $path = $request->file('bukti_transfer')->storeAs('bukti_transfer', $filename, 'public');

        PembayaranTransfer::create([
            'tipe_pembayaran' => $request->tipe_pembayaran,
            'id_refrensi' => $request->id_refrensi,
            'bukti_transfer' => $path,
            'status_verifikasi' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diunggah. Tunggu verifikasi dari admin.');
    }

    public function indexSpp()
    {
        $user = auth()->user();

        // Pastikan user dan id_siswa tersedia
        if (!$user || !$user->id_siswa) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan.');
        }

        // Ambil data siswa dan relasi ke calon siswa dan kelasnya
        $siswa = \App\Models\DataSiswa::with('calonSiswa.kelas_choice')->find($user->id_siswa);

        if (!$siswa || !$siswa->calonSiswa) {
            return redirect()->back()->with('error', 'Data pendaftar tidak ditemukan.');
        }

        // Ambil data kelas
        $kelas = $siswa->calonSiswa->kelas_choice;

        return view('dashboard.pembayaran_siswa.pembayaran_spp', [
            'pendaftar' => $siswa->calonSiswa,
            'kelas' => $kelas,
        ]);
    }


    public function storeSpp(Request $request)
    {
        $request->validate([
            'id_refrensi' => 'required|uuid',
            'bukti_transfer' => 'required|mimes:jpeg,png,jpg|max:2048',
        ]);

        $bukti = $request->file('bukti_transfer');
        $filename = date('Y-m-d') . '_' . Str::random(8) . '.' . $bukti->getClientOriginalExtension();
        $path = $bukti->storeAs('bukti_transfer', $filename, 'public'); // ✅ Aman

        PembayaranTransfer::create([
            'tipe_pembayaran' => 'spp',
            'id_refrensi' => $request->id_refrensi,
            'bukti_transfer' => $path,
            'status_verifikasi' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Bukti pembayaran SPP berhasil diunggah. Tunggu verifikasi dari admin.');
    }

    

    public function download($id)
    {
        $pembayaran = PembayaranTransfer::findOrFail($id);
        $filePath = $pembayaran->bukti_transfer; // contoh: 'bukti_transfer/foto.jpg'
        $fullPath = storage_path('app/public/' . $filePath);

        if (!file_exists($fullPath)) {
            return back()->with('error', 'File tidak ditemukan.');
        }

        // Solusi untuk kasus file corrupt
        if (ob_get_level()) {
            ob_end_clean(); // Matikan output buffering
        }

        return response()->download($fullPath, basename($fullPath), [
            'Content-Type' => mime_content_type($fullPath),
            'Content-Length' => filesize($fullPath),
        ])->deleteFileAfterSend(false);
    }
    
    public function view($id)
    {
        $pembayaran = PembayaranTransfer::findOrFail($id);

        $filePath = storage_path('app/public/' . $pembayaran->bukti_transfer);

        if (!file_exists($filePath)) {
            return back()->with('error', 'File tidak ditemukan.');
        }

        $mime = mime_content_type($filePath);
        return response()->file($filePath, ['Content-Type' => $mime]);
    }

    public function showPembayaran()
    {         
        $pembayarans = PembayaranTransfer::with(['calonSiswa.kelas_choice'])->latest()->get();        
        return view('dashboard.pembayaran.bukti_pembayaran', compact('pembayarans'));
    }

}
