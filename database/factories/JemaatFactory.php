<?php

namespace Database\Factories;

use App\Models\Jemaat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jemaat>
 */
class JemaatFactory extends Factory
{
    protected $model = Jemaat::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kartu_keluarga_id' => null, // Biarkan kosong untuk data fake
            'nama_lengkap'    => $this->faker->name(),
            'jenis_kelamin'   => $this->faker->randomElement(['Laki-laki', 'Perempuan']),
            'tempat_lahir'    => $this->faker->city(),
            'tanggal_lahir'   => $this->faker->date('Y-m-d', '-18 years'), // Minimal 18 tahun ke atas
            'alamat_domisili' => $this->faker->address(),
            'no_hp'           => $this->faker->phoneNumber(),
            'status_baptis'   => $this->faker->randomElement(['Sudah', 'Belum']),
            'status_sidi'     => $this->faker->randomElement(['Sudah', 'Belum']),
            'tanggal_baptis'  => null,
            'tanggal_sidi'    => null,
            'nama_orang_tua'  => $this->faker->name(),
        ];
    }
}
