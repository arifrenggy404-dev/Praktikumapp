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
        Schema::table('jadwal_pelayanans', function (Blueprint $table) {
            $table->string('lokasi_ibadah', 255)->change();
        });
    }

    public function down(): void
    {
        Schema::table('jadwal_pelayanans', function (Blueprint $table) {
            $table->enum('lokasi_ibadah', ['Pusat', 'Cabang'])->change();
        });
    }
};
