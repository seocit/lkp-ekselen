<?php

namespace App\Http\Controllers;


use auth;
use App\Models\Materi;
use Illuminate\Support\Str;
use App\Models\KelasProgram;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;


class MateriController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user(); // Ambil user login

        $searchTerm = $request->input('search');
        $selectedKelasId = $request->input('kelas');

        // Ambil semua kelas + kategori + program (untuk dropdown filter)
        $kelas_program = KelasProgram::with(['kategori', 'program'])
            ->get()
            ->map(function ($kelas) {
                $kelas->label_unik = $kelas->nama_kelas . ($kelas->kategori ? ' - ' . $kelas->kategori->nama_kategori : '');
                return $kelas;
            })
            ->unique('label_unik')
            ->values();

        //  Jika user adalah siswa
        if ($user->hasRole('siswa')) {
            // Ambil ID kelas siswa (pastikan relasi `calonSiswa.kelas_choice` tersedia)
            $idKelasSiswa = optional($user->calonSiswa->kelas_choice)->id;

            // Cegah akses ke kelas lain
            if ($selectedKelasId && $selectedKelasId != $idKelasSiswa) {
                abort(403, 'Anda tidak memiliki akses ke kelas ini.');
            }

            $query = Materi::with('kelas')
                ->where('id_kelas', $idKelasSiswa);

            if ($searchTerm) {
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('nama_materi', 'like', "%$searchTerm%")
                    ->orWhere('deskripsi', 'like', "%$searchTerm%");
                });
            }

            $materi = $query->get();
            $selectedKelasId = $idKelasSiswa;
        }

        // Jika user adalah admin
        else {
            $query = Materi::with('kelas');

            if ($selectedKelasId) {
                $query->where('id_kelas', $selectedKelasId);
            }

            if ($searchTerm) {
                $query->where(function ($q) use ($searchTerm) {
                    $q->where('nama_materi', 'like', "%$searchTerm%")
                    ->orWhere('deskripsi', 'like', "%$searchTerm%")
                    ->orWhereHas('kelas', function ($kelasQuery) use ($searchTerm) {
                        $kelasQuery->where('nama_kelas', 'like', "%$searchTerm%");
                    });
                });
            }

            $materi = $query->get();
        }

        return view('dashboard.materi_kelas.index', [
            'materi' => $materi,
            'kelas_program' => $kelas_program,
            'selectedKelasId' => $selectedKelasId,
        ]);
    }



   



    public function create()
    {
        $kelas_programs = KelasProgram::with(['program', 'kategori'])->orderBy('nama_kelas')->get();

        return view('dashboard.materi_kelas.create', compact('kelas_programs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_materi' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'id_kelas' => 'required|exists:kelas_programs,id',
            'nama_file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx|max:2048',
        ]);

        $materi = new Materi();
        $materi->id = Str::uuid();
        $materi->nama_materi = $request->nama_materi;
        $materi->deskripsi = $request->deskripsi;
        $materi->id_kelas = $request->id_kelas;

        if ($request->hasFile('nama_file')) {
            $file = $request->file('nama_file');
            $filename = date('Ym') . '_' . $file->getClientOriginalName();
            $file->storeAs('public/materi', $filename);
            $materi->nama_file = $filename;
        }

        $materi->save();

        return redirect()->route('materi.index')->with('success', 'Materi berhasil ditambahkan, Baginda!');
    }

    public function edit($id)
    {
        $materi = Materi::findOrFail($id);
        $kelas = KelasProgram::distinct('nama_kelas')->get(['id', 'nama_kelas']); // untuk dropdown

        return view('dashboard.materi_kelas.edit', compact('materi', 'kelas'));
    }

    public function update(Request $request, $id)
    {
        $materi = Materi::findOrFail($id);

        $request->validate([
            'nama_materi' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'id_kelas' => 'required|exists:kelas_programs,id',
            'nama_file' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx|max:2048'
        ]);

        $materi->nama_materi = $request->nama_materi;
        $materi->deskripsi = $request->deskripsi;
        $materi->id_kelas = $request->id_kelas;

        if ($request->hasFile('nama_file')) {
            $file = $request->file('nama_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/materi', $filename);
            $materi->nama_file = $filename;
        }

        $materi->save();

        return redirect()->route('materi.index')->with('success', 'Materi berhasil diperbarui.');
    }

    public function download($id)
    {
        $materi = Materi::findOrFail($id);

        if (!$materi->nama_file || !Storage::exists('public/materi/' . $materi->nama_file)) {
            return back()->with('error', 'File tidak ditemukan.');
        }

        return Storage::download('public/materi/' . $materi->nama_file, $materi->nama_file);
    }
    public function destroy($id)
    {
        $materi = Materi::findOrFail($id);

        // Jika ada file, hapus dari penyimpanan
        if ($materi->file && Storage::exists('public/materi/' . $materi->file)) {
            Storage::delete('public/materi/' . $materi->file);
        }

        $materi->delete();

        return redirect()->route('materi.index')->with('success', 'Materi berhasil dihapus.');
    }

}
