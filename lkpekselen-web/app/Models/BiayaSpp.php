<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BiayaSpp extends Model
{
    use HasFactory;

    protected $table = 'biaya_spps';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'id_kelas',
        'nominal'
    ];

    protected static function boot()
    {
        parent::boot();

        // Set UUID otomatis
        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = Str::uuid();
            }
        });
    }

    public function kelas()
    {
        return $this->belongsTo(KelasProgram::class, 'id_kelas');
    }
}
