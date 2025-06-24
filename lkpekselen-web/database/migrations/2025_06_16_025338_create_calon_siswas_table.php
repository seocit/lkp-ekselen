<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('calon_siswas', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('nama_siswa', 30);
            $table->string('alamat', 100);
            $table->string('no_wa', 14);
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->string('asal_sekolah')->nullable();
            $table->string('nama_ortu', 30)->nullable();
            $table->string('pekerjaan_ortu')->nullable();
            $table->uuid('id_kelas');
            $table->uuid('id_session');
            $table->uuid('id_jadwal');
            $table->foreign('id_kelas')->references('id')->on('kelas_programs')->restrictOnDelete()->restrictOnUpdate();
            $table->foreign('id_session')->references('id')->on('pilihan_sessions')->restrictOnDelete()->restrictOnUpdate();
            $table->foreign('id_jadwal')->references('id')->on('pilihan_jadwals')->restrictOnDelete()->restrictOnUpdate();
            $table->date('tanggal_daftar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calon_siswas');
    }
};
