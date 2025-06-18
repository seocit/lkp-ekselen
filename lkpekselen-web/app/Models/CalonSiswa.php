<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalonSiswa extends Model
{
    protected $table = 'calon_siswas';
    public function kelas_choice(){
        return $this->belongsTo(KelasProgram::class, 'id_kelas');
    }
    public function session_choice(){
        return $this->belongsTo(PilihanSession::class, 'id_session');
    }
    public function jadwal_choice(){
        return $this->belongsTo(PilihanJadwal::class, 'id_jadwal');
    }
}
