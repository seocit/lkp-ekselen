<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{
    protected $table = 'data_siswas';
    public function kelas_choice(){
        return $this->belongsTo(KelasProgram::class, 'id_kelas');
    }
    public function session_choice(){
        return $this->belongsTo(PilihanSession::class, 'id_session');
    }
    public function jadwal_choice(){
        return $this->belongsTo(PilihanJadwal::class, 'id_jadwal');
    }
    // public function getRouteKeyName()
    // {
    //     return 'id';
    // }

}
