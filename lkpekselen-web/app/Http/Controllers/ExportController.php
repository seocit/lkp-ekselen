<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExportController extends Controller
{
    public function exportSiswa()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Header kolom
        $sheet->setCellValue('A1', 'Nama');
        $sheet->setCellValue('B1', 'Alamat');
        $sheet->setCellValue('C1', 'No WA');
        $sheet->setCellValue('D1', 'Tempat Lahir');
        $sheet->setCellValue('E1', 'Tanggal Lahir');
        $sheet->setCellValue('F1', 'Asal Sekolah');
        $sheet->setCellValue('G1', 'Nama Orangtua');
        $sheet->setCellValue('H1', 'Pekerjaan Orangtua');
        $sheet->setCellValue('I1', 'Program');
        $sheet->setCellValue('J1', 'Kelas');
        $sheet->setCellValue('K1', 'Tanggal Masuk');

        // Ambil data
        $rows = DataSiswa::with('calonSiswa.kelas_choice.program')->get();
        $rowIndex = 2;

        foreach ($rows as $siswa) {
            $sheet->setCellValue("A$rowIndex", $siswa->calonSiswa->nama_siswa ?? '-');
            $sheet->setCellValue("B$rowIndex", $siswa->calonSiswa->alamat ?? '-');
            $sheet->setCellValue("C$rowIndex", $siswa->calonSiswa->no_wa ?? '-');
            $sheet->setCellValue("D$rowIndex", $siswa->calonSiswa->tempat_lahir ?? '-');
            $sheet->setCellValue("E$rowIndex", $siswa->calonSiswa->tanggal_lahir ?? '-');
            $sheet->setCellValue("F$rowIndex", $siswa->calonSiswa->asal_sekolah ?? '-');
            $sheet->setCellValue("G$rowIndex", $siswa->calonSiswa->nama_ortu ?? '-');
            $sheet->setCellValue("H$rowIndex", $siswa->calonSiswa->pekerjaan_ortu ?? '-');
            $sheet->setCellValue("I$rowIndex", $siswa->calonSiswa->kelas_choice->program->nama_program ?? '-');
            $sheet->setCellValue("J$rowIndex", $siswa->calonSiswa->kelas_choice->nama_kelas?? '-');
            $sheet->setCellValue("K$rowIndex", $siswa->tanggal_masuk?? '-');
            $rowIndex++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'data_siswa.xlsx';

        // Simpan ke memory, lalu kirim ke browser
        ob_start();
        $writer->save('php://output');
        $excelOutput = ob_get_clean();

        return response($excelOutput)
            ->header('Content-Type', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet')
            ->header('Content-Disposition', "attachment; filename=\"$filename\"");
    }
}
