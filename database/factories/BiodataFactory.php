<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BiodataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'noreg_ppdb' => 'PPDB-' . date('y') . date('y') + 1 . '-' . $this->faker->unique()->numberBetween(10000, 99999),
            'jalur_pendaftaran' => $this->faker->numberBetween(1, 7),
            'nisn' => $this->faker->unique()->numberBetween(1000000000, 9999999999),
            'nik' => $this->faker->unique()->numberBetween(1000000000000000, 9999999999999999),
            'nama' => $this->faker->name,
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date('Y-m-d'),
            'asal_sekolah' => 'SMPN 1 Kota Cimahi',
            'tahun_lulus' => $this->faker->numberBetween(2010, 2020),
            'kelas' => $this->faker->randomElement(['9A', '9B', '9C']),
            'alamat' => $this->faker->address,
            'dusun' => $this->faker->streetName,
            'rt' => $this->faker->numberBetween(1, 10),
            'rw' => $this->faker->numberBetween(1, 10),
            'desa' => $this->faker->city,
            'kecamatan' => $this->faker->city,
            'kabupaten' => $this->faker->city,
            'provinsi' => $this->faker->city,
            'kode_pos' => $this->faker->numberBetween(10000, 99999),
        ];
    }
}
