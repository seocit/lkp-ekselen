<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PilihanJadwal extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'pilihan_jadwals';
    protected $fillable = ['kode', 'keterangan'];

    public function pendaftarans()
    {
        return $this->hasMany(CalonSiswa::class);
    }
}
