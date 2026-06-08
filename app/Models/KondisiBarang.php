<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\HasMany;

use Illuminate\Database\Eloquent\Model;

class KondisiBarang extends Model
{
    protected $table = 'kondisi_barangs';
    protected $fillable = ['nama_kondisi'];

    public function inventaris(): HasMany
    {
        return $this->hasMany(Inventaris::class, 'kondisi_id');
    }
}
