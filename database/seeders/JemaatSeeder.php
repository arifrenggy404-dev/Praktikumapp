<?php

namespace Database\Seeders;

use App\Models\Jemaat;
use Illuminate\Database\Seeder;

class JemaatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jemaat::factory()->count(100)->create();
    }
}
