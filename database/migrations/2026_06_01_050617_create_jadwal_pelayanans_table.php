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
        Schema::create('jadwal_pelayanans', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nama_ibadah', 100);
            $table->string('semester', 20); // Contoh: Jan-Jun 2026
            $table->dateTime('tanggal_waktu');
            $table->enum('lokasi_ibadah', ['Pusat', 'Cabang']);
            $table->string('warta_digital', 255)->nullable(); // Path file PDF pengumuman ibadah
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pelayanans');
    }
};
