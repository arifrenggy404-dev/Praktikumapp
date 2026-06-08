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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            
            // KOREKSI DI BARIS INI: Tambahkan 'jemaats' di dalam constrained()
            $table->foreignId('jemaat_id')->unique()->constrained('jemaats')->cascadeOnDelete();
            
            $table->string('username', 50)->unique();
            $table->string('password', 255);
            $table->timestamps();
        });

        // Catatan: Jika di bawahnya ada Schema::create untuk 'password_reset_tokens' atau 'sessions' bawaan Laravel, 
        // biarkan saja dan jangan dihapus.
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};