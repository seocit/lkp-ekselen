<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tagihan extends Model
{
    /** @use HasFactory<\Database\Factories\TagihanFactory> */
    use HasFactory;
    protected $fillable = [
        'no_tagihan',
        'user_id',
        'tanggal',
        'jatuh_tempo',
        'status',
        'jumlah'
    ];

    public function pembayaranTransfers()
    {
        return $this->hasMany(PembayaranTransfer::class, 'id_tagihan');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
