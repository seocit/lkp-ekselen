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
            $table->string('status')->nullable()->after('id');
            $table->uuid('id_calon_siswa')->unique();
            $table->foreign('id_calon_siswa')->references('id')->on('calon_siswas')->restrictOnDelete()->restrictOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_siswas', function (Blueprint $table) {
            $table->dropForeign(['id_calon_siswa']);
            $table->dropColumn(['status', 'id_calon_siswa']);
        });
    }
};
