<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jemaats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kartu_keluarga_id')->nullable()->constrained('kartu_keluargas')->cascadeOnDelete();
            $table->string('nama_lengkap', 150);
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->text('alamat_domisili');
            $table->string('no_hp', 20)->nullable();
            $table->enum('status_baptis', ['Sudah', 'Belum'])->default('Belum');
            $table->enum('status_sidi', ['Sudah', 'Belum'])->default('Belum');
            $table->date('tanggal_baptis')->nullable();
            $table->date('tanggal_sidi')->nullable();
            $table->string('nama_orang_tua', 150)->nullable();
            $table->string('file_dokumen', 255)->nullable();
            $table->timestamps();
        });

        Schema::table('kartu_keluargas', function (Blueprint $table) {
            $table->foreign('kepala_keluarga_id')->references('id')->on('jemaats')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('kartu_keluargas', function (Blueprint $table) {
            $table->dropForeign(['kepala_keluarga_id']);
        });
        Schema::dropIfExists('jemaats');
    }
};