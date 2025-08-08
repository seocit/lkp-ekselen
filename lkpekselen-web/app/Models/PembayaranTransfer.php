<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PembayaranTransfer extends Model
{
    use HasFactory;

    protected $table = 'pembayaran_transfers';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'tipe_pembayaran',
        'id_tagihan',
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

    public function tagihan()
    {
        return $this->belongsTo(Tagihan::class, 'id_tagihan', 'id');
    }

    public function getNamaSiswaAttribute()
    {
        // Jika id_refrensi tersedia (biasanya untuk pendaftaran)
        if ($this->calonSiswa) {
            return $this->calonSiswa->nama_siswa;
        }

        // Jika pembayaran melalui tagihan
        if ($this->tagihan && $this->tagihan->user && $this->tagihan->user->calonSiswa) {
            return $this->tagihan->user->calonSiswa->nama_siswa;
        }

        return '-'; // fallback
    }

    public function getEmailSiswaAttribute()
    {
        if ($this->calonSiswa && $this->calonSiswa->user) {
            return $this->calonSiswa->user->email;
        }

        if ($this->tagihan && $this->tagihan->user) {
            
            return $this->tagihan->user->email;

            
        }

        return '-';
    }

   


   
}
