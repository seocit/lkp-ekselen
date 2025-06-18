<?php

namespace App\Http\Controllers;

use App\Models\CalonSiswa;
use Illuminate\Http\Request;

class CalonSiswaController extends Controller
{
    public function index(){
        $calon_siswa = CalonSiswa::all();
        return view('dashboard.bukti_pembayaran', compact('calon_siswa'));
    }
}
