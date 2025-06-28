<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use App\Models\KelasProgram;
use App\Models\ProgramPelatihan;
use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    public function index(Request $request)
    {
    $list_program = ProgramPelatihan::all();

    $query = DataSiswa::with('calonSiswa.kelas_choice.program', 'calonSiswa.kategori_kelas');

    // 🎯 Filter status siswa
    if ($request->filled('status') && in_array($request->status, ['aktif', 'nonaktif'])) {
        $query->where('status', $request->status);
    }

    // 🎯 Filter program
    if ($request->filled('id_program')) {
        $query->whereHas('calonSiswa.kelas_choice', function ($q) use ($request) {
            $q->where('id_program', $request->id_program);
        });
    }

    $list_siswa = $query->get();

    $semua_kelas = KelasProgram::with(['kategori', 'calon_siswas.dataSiswa'])->get();
    $program_pelatihans = ProgramPelatihan::with(['kelas.calon_siswas.dataSiswa'])->get();

    return view('dashboard.siswa_program.index', compact(
        'list_siswa',
        'list_program',
        'semua_kelas',
        'program_pelatihans'
    ));
    }
    public function show($id)
    {
        $siswa = DataSiswa::with('calonSiswa.kelas_choice.program', 'calonSiswa.kategori_kelas')
            ->findOrFail($id);

        return view('dashboard.siswa_program.show', compact('siswa'));
    }
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:aktif,nonaktif',
        ]);

        $siswa = DataSiswa::findOrFail($id);
        $siswa->status = $request->status;
        $siswa->save();

        return redirect()->route('siswa_program.index')->with('success', 'Status diperbarui.');
    }



    // public function show(DataSiswa $siswa){
    //     return view('dashboard.siswa_program.show', compact('siswa'));
    // }
}
