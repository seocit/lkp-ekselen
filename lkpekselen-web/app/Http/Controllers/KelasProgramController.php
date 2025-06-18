<?php

namespace App\Http\Controllers;

use App\Models\KelasProgram;
use Illuminate\Http\Request;

class KelasProgramController extends Controller
{
    public function index(){
        $kelas_program = KelasProgram::all();
        return view('dashboard.materi', compact('kelas_program'));
    }
}
