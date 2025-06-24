<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PilihanSession extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'pilihan_sessions';
    protected $fillable = ['label', 'jam'];

    public function pendaftarans()
    {
        return $this->hasMany(CalonSiswa::class);
    }
}
