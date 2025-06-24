<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index($id){
        $pendaftar = CalonSiswa::with(['kelas_choice'])->findOrFail($id);
        return view('frontend.pembayaran.index', compact('pendaftar'));
    }
}
