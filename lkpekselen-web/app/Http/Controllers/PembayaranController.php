<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use App\Models\PembayaranTransfer;
use Illuminate\Http\Request;

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

    $path = $request->file('bukti_transfer')->store('bukti_transfer', 'public');

    PembayaranTransfer::create([
        'tipe_pembayaran' => $request->tipe_pembayaran,
        'id_refrensi' => $request->id_refrensi,
        'bukti_transfer' => $path,
        'status_verifikasi' => 'pending',
    ]);

    return redirect()->back()->with('success', 'Bukti pembayaran berhasil diunggah. Tunggu verifikasi dari admin.');
    }

}
