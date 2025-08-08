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
        Schema::table('tagihans', function (Blueprint $table) {
            // Ubah kolom status menjadi enum baru
            $table->enum('status', ['pending', 'menunggu_verifikasi', 'terlambat', 'lunas'])->default('pending')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tagihans', function (Blueprint $table) {
            // Kembalikan ke enum sebelumnya jika perlu
            $table->enum('status', ['pending', 'terlambat', 'lunas'])->default('pending')->change();
        });
    }
};
