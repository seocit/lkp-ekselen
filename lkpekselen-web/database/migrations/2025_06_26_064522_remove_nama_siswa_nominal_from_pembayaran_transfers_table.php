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
        Schema::table('pembayaran_transfers', function (Blueprint $table) {
            $table->dropColumn(['nama_siswa', 'nominal']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembayaran_transfers', function (Blueprint $table) {
            $table->string('nama_siswa')->nullable();
            $table->decimal('nominal', 12, 2)->nullable();
        });
    }
};
