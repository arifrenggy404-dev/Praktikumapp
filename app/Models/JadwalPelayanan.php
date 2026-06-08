<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class JadwalPelayanan extends Model
{
    protected $table = 'jadwal_pelayanans';

    // Kolom yang boleh diisi massal (pastikan 'semester' juga ada di sini)
    protected $fillable = ['nama_ibadah', 'tanggal_waktu', 'jam_selesai', 'lokasi_ibadah', 'semester', 'warta_digital'];

    /**
     * Relasi Many-to-Many ke Jemaat sebagai Pelayan Ibadah
     */
    public function pelayan(): BelongsToMany
    {
        // KOREKSI DI BARIS INI: Tambahkan 'pelayan_jadwals' sebagai parameter kedua
        return $this->belongsToMany(Jemaat::class, 'pelayan_jadwals', 'jadwal_id', 'jemaat_id')
                    ->withPivot('peran');
    }
}