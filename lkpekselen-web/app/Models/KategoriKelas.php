<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriKelas extends Model
{
    use HasFactory;

    protected $table = 'kategori_kelas'; // nama tabel

    protected $keyType = 'string'; // jika ID-nya UUID
    public $incrementing = false;

    protected $fillable = [
        'id',
        'nama_kategori'
    ];

    // Relasi ke kelas_programs (satu kategori bisa punya banyak kelas)
    public function kelasPrograms()
    {
        return $this->hasMany(KelasProgram::class, 'id_kategori');
    }
}
