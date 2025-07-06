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
        Schema::create('data_siswas', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('nama_siswa', 30);
            $table->string('alamat');
            $table->string('no_wa', 14);
            $table->string('tempat_lahir', 20);
            $table->date('tanggal_lahir');
            $table->string('asal_sekolah', 40);
            $table->string('nama_ortu', 30);
            $table->string('pekerjaan_ortu', 30);
            $table->uuid('id_kelas');
            $table->uuid('id_session');
            $table->uuid('id_jadwal');
            $table->foreign('id_kelas')->references('id')->on('kelas_programs')->restrictOnDelete()->restrictOnUpdate();
            $table->foreign('id_session')->references('id')->on('pilihan_sessions')->restrictOnDelete()->restrictOnUpdate();
            $table->foreign('id_jadwal')->references('id')->on('pilihan_jadwals')->restrictOnDelete()->restrictOnUpdate();
            $table->date('tanggal_masuk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_siswas');
    }
};
