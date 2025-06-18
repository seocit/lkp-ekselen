<?php

namespace App\Http\Controllers;


use App\Models\KelasProgram;
use App\Models\Materi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MateriController extends Controller
{
    public function showByKelas(KelasProgram $kelas){
        $materi = Materi::where('id_kelas', $kelas->id)->get();
        return view('dashboard.materi_kelas.index', compact('kelas', 'materi'));
    }
    public function create(Request $request){
        $id_kelas = $request->query('id_kelas');
        $kelas = KelasProgram::findOrFail($id_kelas);

        return view('dashboard.materi_kelas.create', compact('kelas'));
    }
    public function store(Request $request){
        $request->validate([
            'nama_materi' => 'required|string|max:255',
            'nama_file' => 'nullable|file|mimes:pdf,doc,ppt,pptx|max:2048',
            'id_kelas' => 'required|exists:kelas_programs,id'
        ]);

        $materi = new Materi();
        $materi->id = Str::uuid();
        $materi->nama_materi = $request->nama_materi;
        $materi->id_kelas = $request->id_kelas;

        if($request->hasFile('nama_file')){
            $file = $request->file('nama_file');
            $filename = time(). '_' .$file->getClientOriginalName();
            $file->storeAs('public/materi', $filename);
            $materi->file = $filename;
        }

        $materi->save();

        return redirect()->route('materi.byKelas', $materi->id_kelas)->with('Success', 'Materi Berhasil Ditambahkan');
    }
}
