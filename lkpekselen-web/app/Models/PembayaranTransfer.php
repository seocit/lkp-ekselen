<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PembayaranTransfer extends Model
{
    use HasFactory;

    protected $table = 'pembayaran_transfers';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'tipe_pembayaran',
        'id_refrensi',
        'bukti_transfer',
        'status_verifikasi',
    ];
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->id) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function calonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class, 'id_refrensi', 'id');
    }


   
}
