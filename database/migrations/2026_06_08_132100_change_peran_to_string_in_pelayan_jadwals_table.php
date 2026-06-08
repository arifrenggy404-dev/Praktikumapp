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
        Schema::table('pelayan_jadwals', function (Blueprint $table) {
            // Mengubah ENUM menjadi STRING agar lebih fleksibel menerima "Pemimpin Ibadah"
            $table->string('peran', 100)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pelayan_jadwals', function (Blueprint $table) {
            $table->enum('peran', ['Pendeta', 'Vikaris', 'Penatua', 'Diaken', 'Pemusik', 'Singer', 'Multimedia'])->change();
        });
    }
};
