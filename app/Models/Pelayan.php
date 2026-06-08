<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pelayan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jemaat_id',
        'jabatan',
        'tanggal_mulai',
        'tanggal_selesai',
        'is_aktif',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
        'is_aktif' => 'boolean',
    ];

    /**
     * Relasi ke data Jemaat
     */
    public function jemaat(): BelongsTo
    {
        return $this->belongsTo(Jemaat::class, 'jemaat_id');
    }
}