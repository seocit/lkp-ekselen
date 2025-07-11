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
        Schema::create('kelas_programs', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->string('nama_kelas', 15);
            $table->integer('biaya_pendaftaran');
            $table->uuid('id_program');
            $table->foreign('id_program')->references('id')->on('program_pelatihans')->restrictOnDelete()->restrictOnUpdate();
            $table->uuid('id_kategori')->nullable();
            $table->foreign('id_kategori')->references('id')->on('kategori_kelas')->restrictOnDelete()->restrictOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas_programs');
    }
};
