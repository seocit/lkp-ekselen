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

    // 🔍 Search nama siswa
    if ($request->filled('search')) {
        $query->whereHas('calonSiswa', function ($q) use ($request) {
            $q->where('nama_siswa', 'like', '%' . $request->search . '%');
        });
    }

    $list_siswa = $query->get();

    // Ambil data chart: jumlah siswa per tahun per program
$data_chart = DataSiswa::selectRaw('YEAR(tanggal_masuk) as tahun, program_pelatihans.nama_program, COUNT(*) as jumlah')
    ->join('calon_siswas', 'data_siswas.id_calon_siswa', '=', 'calon_siswas.id')
    ->join('kelas_programs', 'calon_siswas.id_kelas', '=', 'kelas_programs.id')
    ->join('program_pelatihans', 'kelas_programs.id_program', '=', 'program_pelatihans.id')
    ->groupBy('tahun', 'program_pelatihans.nama_program')
    ->orderBy('tahun')
    ->get();

$tahunList = $data_chart->pluck('tahun')->unique()->sort()->values();

$warnaProgram = [
    'MIPA' => '#4F46E5',
    'Bahasa' => '#22C55E',
    'Komputer' => '#F59E0B',
    'Lainnya' => '#EF4444',
];

$groupedChart = $data_chart->groupBy('nama_program');

$datasets = [];

foreach ($groupedChart as $program => $items) {
    $dataPerTahun = [];

    foreach ($tahunList as $tahun) {
        $found = $items->firstWhere('tahun', $tahun);
        $dataPerTahun[] = $found ? $found->jumlah : 0;
    }

    $datasets[] = [
        'label' => $program,
        'data' => $dataPerTahun,
        'backgroundColor' => $warnaProgram[$program] ?? '#888888'
    ];
}

    return view('dashboard.siswa_program.index', compact(
        'list_siswa',
        'list_program',
        'tahunList',
        'datasets'
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

        return redirect()->route('data-siswa.index')->with('success', 'Status diperbarui.');
    }



    // public function show(DataSiswa $siswa){
    //     return view('dashboard.siswa_program.show', compact('siswa'));
    // }
}
