<?php

namespace App\Http\Controllers;

use App\Models\ProgramPelatihan;
use Illuminate\Http\Request;

class ProgramPelatihanController extends Controller
{
    public function index(){
        $program_pelatihan = ProgramPelatihan::all();
        return view('dashboard.siswa', compact('program_pelatihan'));
    }
}
