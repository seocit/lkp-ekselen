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
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('admin');
            $table->uuid('id_calonSiswa')->nullable()->after('id');
            $table->uuid('id_siswa')->nullable()->after('id');
            $table->foreign('id_calonSiswa')->references('id')->on('calon_siswas')->restrictOnDelete()->restrictOnUpdate();
            $table->foreign('id_siswa')->references('id')->on('data_siswas')->restrictOnDelete()->restrictOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['id_siswa']);
            $table->dropColumn(['role', 'id_siswa']);
        });
    }
};
