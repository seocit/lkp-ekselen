<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasProgram extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'kelas_programs';
    public function program(){
        return $this->belongsTo(ProgramPelatihan::class, 'id_program');
    }
}
