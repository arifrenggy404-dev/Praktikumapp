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
        Schema::create('pelayans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jemaat_id')->constrained('jemaats')->cascadeOnDelete();
            $table->enum('jabatan', ['Pendeta', 'Vikaris', 'Penatua', 'Diaken', 'Majelis']);
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->boolean('is_aktif')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelayans');
    }
};
