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
        Schema::create('pembayaran_transfers', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->enum('tipe_pembayaran', ['pendaftaran', 'spp']);
            $table->uuid('id_refrensi')->nullable();
            $table->string('nama_siswa')->nullable();
            $table->decimal('nominal', 12, 2);
            $table->enum('status_verifikasi', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran_transfers');
    }
};
