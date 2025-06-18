<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pengumuman extends Model
{
    public $incrementing = false;
    protected $keyType ='string';

    protected $table = 'pengumumans';
    protected $fillable = ['judul', 'isi', 'tanggal_pengumuman'];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model){
            $model->id = Str::uuid();
        });
    }

}
