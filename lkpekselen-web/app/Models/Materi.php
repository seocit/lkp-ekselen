<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = 'materis';
    public function kelas(){
        return $this->belongsTo(KelasProgram::class, 'id_kelas');
    }
}
