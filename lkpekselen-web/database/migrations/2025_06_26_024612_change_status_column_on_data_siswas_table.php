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
        Schema::table('data_siswas', function (Blueprint $table) {
            // Ubah kolom status menjadi enum
            $table->dropColumn('status');
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_siswas', function (Blueprint $table) {
            // Kembalikan jadi string biasa
            $table->string('status')->nullable();
        });
    }
};
