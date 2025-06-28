<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

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
    public function calon_siswas()
    {
        return $this->hasMany(CalonSiswa::class, 'id_kelas');
    }
    protected static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        if (empty($model->id)) {
            $model->id = Str::uuid();
        }
    });
}
}
