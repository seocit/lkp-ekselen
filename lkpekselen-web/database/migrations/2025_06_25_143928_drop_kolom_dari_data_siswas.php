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
            // Hapus foreign key terlebih dahulu
            $table->dropForeign(['id_kelas']);
            $table->dropForeign(['id_session']);
            $table->dropForeign(['id_jadwal']);

            // Hapus kolom
            $table->dropColumn([
                'nama_siswa',
                'alamat',
                'no_wa',
                'tempat_lahir',
                'tanggal_lahir',
                'asal_sekolah',
                'nama_ortu',
                'pekerjaan_ortu',
                'id_kelas',
                'id_session',
                'id_jadwal'
            ]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('data_siswas', function (Blueprint $table) {
            $table->string('nama_siswa');
            $table->text('alamat')->nullable();
            $table->string('no_wa', 20)->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('nama_ortu')->nullable();
            $table->string('pekerjaan_ortu')->nullable();

            $table->foreignId('id_kelas')->constrained('kelas')->onDelete('set null')->nullable();
            $table->foreignId('id_session')->constrained('sessions')->onDelete('set null')->nullable();
            $table->foreignId('id_jadwal')->constrained('jadwal')->onDelete('set null')->nullable();
        });
    }
};
