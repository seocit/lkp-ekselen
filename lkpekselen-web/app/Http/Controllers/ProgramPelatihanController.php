<?php

namespace App\Http\Controllers;

use App\Models\KelasProgram;
use App\Models\ProgramPelatihan;
use Illuminate\Http\Request;

class ProgramPelatihanController extends Controller
{
    public function index(){
        $program_pelatihans = ProgramPelatihan::with('kelas.calon_siswas')->get();
        $semua_kelas = KelasProgram::with('kategori', 'calon_siswas')->orderBy('nama_kelas')->get();
        return view('dashboard.siswa', compact('program_pelatihans', 'semua_kelas'));
    }
}
