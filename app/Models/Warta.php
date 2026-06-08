<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warta extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'tanggal_terbit',
        'file_path',
    ];

    protected $casts = [
        'tanggal_terbit' => 'date',
    ];
}