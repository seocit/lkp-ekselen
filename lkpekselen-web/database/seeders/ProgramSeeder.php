<?php

namespace Database\Seeders;

use App\Models\PilihanJadwal;
use App\Models\ProgramPelatihan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //bikin seeder program pelatihan
        $programs = ['English Program', 'MIPA', 'Komputer', 'TOEFL'];

        foreach ($programs as $program) {
            ProgramPelatihan::firstOrCreate([
                'nama_program' => $program
            ]);
        }

        $pilihan_jadwals = ['Senin - Rabu - Jumat', 'Selasa - Kamis - Sabtu'];
        $kode = ['SRJ', 'SKS'];
        foreach ($programs as $program) {
            PilihanJadwal::firstOrCreate([
                'kode' => $kode,
                'nama_keterangan' => $pilihan_jadwals
            ]);
        }

        
        
    }
}
