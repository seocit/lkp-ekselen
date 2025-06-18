<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    public function index(){
        $data_siswa = DataSiswa::all();
        return view('dashboard.siswa_program.index', compact('data_siswa'));
    }

    public function show(){
        $siswa = DataSiswa::first();
        return view('dashboard.siswa_program.show', compact('siswa'));
    }

    // public function show(DataSiswa $siswa){
    //     return view('dashboard.siswa_program.show', compact('siswa'));
    // }
}
