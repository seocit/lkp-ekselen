<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranTransfer extends Model
{
    use HasFactory;

    protected $table = 'pembayaran_transfers';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'tipe_pembayaran',
        'id_referensi',
        'nama_siswa',
        'nominal',
        'status_verifikasi',
        'catatan_admin',
    ];
}
