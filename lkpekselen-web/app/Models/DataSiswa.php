<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataSiswa extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'data_siswas';
    protected $fillable = [
    'id',
    'id_calon_siswa',
    'status',
    'tanggal_masuk',
    ];

    public function calonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class, 'id_calon_siswa');
    }

}
