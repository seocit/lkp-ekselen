<?php

namespace App\Http\Controllers;

use auth;
use App\Models\Materi;
use App\Models\CalonSiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PembayaranTransfer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


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

        return view('dashboard.pembayaran_spp', [
            'pendaftar' => $siswa->calonSiswa,
            'kelas' => $kelas,
        ]);
    }

    public function storeSpp(Request $request)
    {
        $request->validate([
            // Hapus 'tipe_pembayaran' dari validasi karena kita akan set secara manual
            'id_refrensi' => 'required|uuid',
            'bukti_transfer' => 'required|mimes:jpeg,png,jpg|max:2048',
        ]);

        // $filename = now()->format('Y-m') . '_' . Str::random(8) . '.' . $request->file('bukti_transfer')->getClientOriginalExtension();
        // $path = $request->file('bukti_transfer')->storeAs('bukti_transfer', $filename, 'public');
        // dd($request->all());

        $bukti = $request->file('bukti_transfer');
        $filename = date('Y-m-d').$bukti->getClientOriginalName();
        $path = 'bukti_transfer/'.$filename;


        Storage::disk('public')->put($path, file_get_contents($bukti));

        PembayaranTransfer::create([
            'tipe_pembayaran' => 'spp', // <-- Diset langsung di sini
            'id_refrensi' => $request->id_refrensi,
            'bukti_transfer' => $path,
            'status_verifikasi' => 'pending',
        ]);

        return redirect()->back()->with('success', 'Bukti pembayaran SPP berhasil diunggah. Tunggu verifikasi dari admin.');
    }

    public function download($id)
    {
        $pembayaran = PembayaranTransfer::findOrFail($id);

        $filePath = $pembayaran->bukti_transfer;

        if (!Storage::disk('public')->exists($filePath)) {
            return back()->with('error', 'File tidak ditemukan.');
        }

        return response()->download(storage_path('app/public/' . $filePath));
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
        return view('dashboard.bukti_pembayaran', compact('pembayarans'));
    }

}
