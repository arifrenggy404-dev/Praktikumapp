<?php

namespace Database\Seeders;

use App\Models\Jemaat;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Masukkan data fisik Jemaat sebagai Sekretaris terlebih dahulu
        // Kolom 'id' akan digenerasikan otomatis secara incremental oleh MySQL
        $jemaat = Jemaat::create([
            'nama_lengkap' => 'Martina Pauwila',
            'tempat_lahir' => 'Waingapu',
            'tanggal_lahir' => '1985-01-01',
            'alamat_domisili' => 'Kandara',
            'status_baptis' => 'Sudah',
            'status_sidi' => 'Sudah',
        ]);

        // 2. Buat akun login Sekretaris yang mengikat/terelasi ke jemaat_id di atas
        User::create([
            'jemaat_id' => $jemaat->id, // Mengambil ID dari jemaat Martina Pauwila otomatis
            'username' => 'sekretaris_kandara',
            'password' => Hash::make('rahasia123'), // Mengubah rahasia123 menjadi hash Bcrypt di database
        ]);
    }
}