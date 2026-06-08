<?php

namespace App\Models;

// KOREKSI DI SINI: Gunakan Authenticatable dari Foundation, bukan Model biasa
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    // Nama tabel di database MySQL Anda
    protected $table = 'users';

    // Kolom yang diizinkan untuk pengisian massal
    protected $fillable = [
        'jemaat_id', 
        'username', 
        'password',
        'role'
    ];

    /**
     * Relasi Balik ke Data Jemaat
     */
    public function jemaat(): BelongsTo
    {
        return $this->belongsTo(Jemaat::class, 'jemaat_id');
    }
}