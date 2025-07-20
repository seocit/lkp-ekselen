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
            $table->date('tanggal_konfirmasi')->nullable()->after('status_verifikasi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembayaran_transfers', function (Blueprint $table) {
            $table->dropColumn('tanggal_konfirmasi');
        });
    }
};
