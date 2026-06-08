<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KondisiBarangSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('kondisi_barangs')->insert([
            ['nama_kondisi' => 'Bagus', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kondisi' => 'Rusak', 'created_at' => now(), 'updated_at' => now()],
            ['nama_kondisi' => 'Dibuang', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}