<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Libraries;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // $this->call([
            // ProductSeeder::class,
            // StudentSeeder::class,
            // CoursesSeeder::class,
            // LecturersSeeder::class,
            // LibrariesSeeder::class,
            // CategorySeeder::class,
            // ProductSeeder::class,
            // MahasiswaSeeder::class,
            // DosenSeeder::class,
            // MatakuliahSeeder::class,
           // RuanganSeeder::class,
           // PengumumanSeeder::class,
           // BukuSeeder::class,
           // PerpustakaanSeeder::class,
           // KegiatanSeeder::class,
            // User::create([
            //     'name' => 'Admin',
            //     'email' => 'rillyn@gmail.com',
            //     'password' => bcrypt('123456789'),
            // ]);
            // $this->call([
           // UserSeeder::class,
       // ]);
            
           
        // ]);
         $this->call([
            UserSeeder::class,
            KondisiBarangSeeder::class,
            DummyDataSeeder::class,
        ]);


        
    }
}
