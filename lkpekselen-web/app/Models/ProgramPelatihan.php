<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramPelatihan extends Model
{
    use HasFactory;
    protected $table = 'program_pelatihans';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['id', 'nama_program'];

    public function kelas(){
        return $this->hasMany(KelasProgram::class, 'id_program');
    }
}
