<?php

namespace Database\Seeders;

use App\Models\KategoriKelas;
use App\Models\KelasProgram;
use App\Models\PilihanJadwal;
use Illuminate\Database\Seeder;
use App\Models\ProgramPelatihan;


class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        // ======================
        // Program Pelatihan
        // ======================
        $english = ProgramPelatihan::firstOrCreate(['nama_program' => 'English Program']);
        $mipa    = ProgramPelatihan::firstOrCreate(['nama_program' => 'MIPA']);
        $komputer = ProgramPelatihan::firstOrCreate(['nama_program' => 'Komputer']);
        $toefl   = ProgramPelatihan::firstOrCreate(['nama_program' => 'TOEFL']);

        $semester = KategoriKelas::firstOrCreate([
            'nama_kategori' => '1 semester',            
        ]);
        $satuTahun = KategoriKelas::firstOrCreate([
            'nama_kategori' => '1 tahun',            
        ]);
        $enamBulan = KategoriKelas::firstOrCreate([
            'nama_kategori' => '6 bulan',            
        ]);
        $tigaBulan = KategoriKelas::firstOrCreate([
            'nama_kategori' => '3 bulan',            
        ]);
        // ======================
        // Kelas English Program
        // ======================
        KelasProgram::firstOrCreate([
            'id_program' => $english->id,
            'nama_kelas' => 'Beginner',
            'biaya_pendaftaran' => 500000
        ]);
        KelasProgram::firstOrCreate([
            'id_program' => $english->id,
            'nama_kelas' => 'Intermediate',
            'biaya_pendaftaran' => 600000
        ]);
        KelasProgram::firstOrCreate([
            'id_program' => $english->id,
            'nama_kelas' => 'Advanced',
            'biaya_pendaftaran' => 700000
        ]);

        // ======================
        // Kelas MIPA
        // ======================
        KelasProgram::firstOrCreate([
            'id_program' => $mipa->id,
            'nama_kelas' => 'Kelas 4 SD',
            'biaya_pendaftaran' => 400000
        ]);
        KelasProgram::firstOrCreate([
            'id_program' => $mipa->id,
            'nama_kelas' => 'Kelas 5 SD',
            'biaya_pendaftaran' => 450000
        ]);
        KelasProgram::firstOrCreate([
            'id_program' => $mipa->id,
            'nama_kelas' => 'Kelas 6 SD',
            'biaya_pendaftaran' => 450000
        ]);
        KelasProgram::firstOrCreate([
            'id_program' => $mipa->id,
            'nama_kelas' => 'SMP',
            'biaya_pendaftaran' => 500000
        ]);
        KelasProgram::firstOrCreate([
            'id_program' => $mipa->id,
            'nama_kelas' => 'SMA',
            'biaya_pendaftaran' => 550000
        ]);

        // ======================
        // Kelas Komputer
        // ======================
        KelasProgram::firstOrCreate([
            'id_program' => $komputer->id,
            'nama_kelas' => 'Komputer Dasar',
            'biaya_pendaftaran' => 300000
        ]);
        KelasProgram::firstOrCreate([
            'id_program' => $komputer->id,
            'nama_kelas' => 'Desain Grafis',
            'biaya_pendaftaran' => 350000
        ]);
        KelasProgram::firstOrCreate([
            'id_program' => $komputer->id,
            'nama_kelas' => 'Microsoft Office',
            'biaya_pendaftaran' => 350000
        ]);

        // ======================
        // Kelas TOEFL
        // ======================
        KelasProgram::firstOrCreate([
            'id_program' => $toefl->id,
            'nama_kelas' => 'Persiapan TOEFL',
            'biaya_pendaftaran' => 600000
        ]);
       

        

        PilihanJadwal::firstOrCreate([
            'kode' => 'SRJ',
            'nama_keterangan' => 'Senin - Rabu - Jumat'
        ]);
        PilihanJadwal::firstOrCreate([
            'kode' => 'SKS',
            'nama_keterangan' => 'Selasa - Kamis - Sabtu'
        ]);
    }
}
