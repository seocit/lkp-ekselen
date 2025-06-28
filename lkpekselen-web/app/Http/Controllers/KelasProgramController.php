<?php

namespace App\Http\Controllers;

use App\Models\KelasProgram;
use App\Models\ProgramPelatihan;
use Illuminate\Http\Request;

class KelasProgramController extends Controller
{
    public function index(Request $request){
        $programId = $request->query('program');

        $kelas_program = KelasProgram::with(['program', 'kategori'])
        ->when($programId, function ($query) use ($programId) {
        $query->where('id_program', $programId);})
        ->orderBy('nama_kelas')
        ->get();

        $programs = ProgramPelatihan::orderBy('nama_program')->get();

        return view('dashboard.materi', compact('kelas_program', 'programs'));
    }
}
