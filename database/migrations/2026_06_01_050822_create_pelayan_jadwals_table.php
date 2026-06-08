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
        Schema::create('pelayan_jadwals', function (Blueprint $table) {
            $table->id();
            
            // KOREKSI 1: Pastikan menggunakan 'jadwal_pelayanans' (jamak)
            $table->foreignId('jadwal_id')->constrained('jadwal_pelayanans')->cascadeOnDelete();
            
            // KOREKSI 2: Pastikan menggunakan 'jemaats' (jamak) sesuai nama tabel jemaat Anda
            $table->foreignId('jemaat_id')->constrained('jemaats')->cascadeOnDelete();
            
            $table->enum('peran', ['Pendeta', 'Vikaris', 'Penatua', 'Diaken', 'Pemusik', 'Singer', 'Multimedia']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelayan_jadwals');
    }
};