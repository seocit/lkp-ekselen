<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalonSiswa extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $table = 'calon_siswas';
     protected $fillable = [
        'id',
        'no_registrasi',
        'user_id',
        'nama_siswa',
        'alamat',
        'no_wa',
        'tempat_lahir',
        'tanggal_lahir',
        'asal_sekolah',
        'nama_ortu',
        'pekerjaan_ortu',
        'id_kelas',
        'id_kategori_kelas',
        'id_session',
        'id_jadwal',
        'tanggal_daftar'
    ];
    public function kelas_choice(){
        return $this->belongsTo(KelasProgram::class, 'id_kelas');
    }
    public function session_choice(){
        return $this->belongsTo(PilihanSession::class, 'id_session');
    }
    public function jadwal_choice(){
        return $this->belongsTo(PilihanJadwal::class, 'id_jadwal');
    }
    public function kategori_kelas(){
        return $this->belongsTo(KategoriKelas::class, 'id_kategori_kelas');
    }
    public function dataSiswa()
    {
        return $this->hasOne(DataSiswa::class, 'id_calon_siswa');
    }
    // Di model CalonSiswa.php
    public function pembayaran_transfer()
    {
        return $this->hasOne(PembayaranTransfer::class, 'id_refrensi', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    

}
