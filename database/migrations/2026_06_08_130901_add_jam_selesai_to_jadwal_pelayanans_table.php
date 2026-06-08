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
            $table->time('jam_selesai')->nullable()->after('tanggal_waktu');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jadwal_pelayanans', function (Blueprint $table) {
            $table->dropColumn('jam_selesai');
        });
    }
};
