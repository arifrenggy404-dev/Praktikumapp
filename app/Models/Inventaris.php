<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $table = 'inventaris';

    // PERBAIKAN: Sesuaikan dengan nama kolom asli di database Anda
    protected $fillable = [
        'nama_barang', 
        'jumlah_kuantitas', 
        'kondisi_id', 
    ];

    public function kondisi()
    {
        return $this->belongsTo(KondisiBarang::class, 'kondisi_id');
    }
}