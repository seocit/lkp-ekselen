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
        Schema::create('biaya_spps', function (Blueprint $table) {
            $table->uuid('id');
            $table->primary('id');
            $table->uuid('id_kelas');
            $table->foreign('id_kelas')->references('id')->on('kelas_programs')->restrictOnDelete()->restrictOnUpdate();
            $table->integer('nominal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biaya_spps');
    }
};
