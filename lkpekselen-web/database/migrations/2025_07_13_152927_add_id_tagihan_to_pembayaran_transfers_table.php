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
            $table->unsignedBigInteger('id_tagihan')->nullable()->after('id');
            $table->foreign('id_tagihan')->references('id')->on('tagihans')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pembayaran_transfers', function (Blueprint $table) {
            //
        });
    }
};
