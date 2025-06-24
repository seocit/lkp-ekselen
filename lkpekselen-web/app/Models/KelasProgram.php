<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KelasProgram extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'kelas_programs';
    protected $fillable = [
        'nama_kelas',
        'id_program',
        'biaya'
    ];
    public function program(){
        return $this->belongsTo(ProgramPelatihan::class, 'id_program');
    }
    public function pendaftarans(){
        return $this->hasMany(CalonSiswa::class);
    }
    public function kategori(){
        return $this->belongsTo(KategoriKelas::class, 'id_kategori');
    }
}
