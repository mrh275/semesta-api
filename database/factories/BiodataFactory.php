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
            'nisn' => $this->faker->unique()->numberBetween(1000000000, 9999999999),
            'nis' => $this->faker->unique()->numberBetween(1000000000, 9999999999),
            'nik' => $this->faker->unique()->numberBetween(1000000000000000, 9999999999999999),
            'nama' => $this->faker->name,
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'tingkat' => $this->faker->numberBetween(10, 12),
            'rombel_id' => $this->faker->numberBetween(1, 4),
            'ekskul_id' => $this->faker->numberBetween(1, 5),
            'tempat_lahir' => $this->faker->city,
            'tanggal_lahir' => $this->faker->date('Y-m-d'),
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Budha', 'Hindu']),
            'asal_sekolah' => $this->faker->randomElement(['SMPN 1 Rawamerta', 'SMPN 2 Rawamerta', 'SMPN Satu Atap 1 Rawamerta']),
            'tahun_lulus' => $this->faker->numberBetween(2020, 2022),
            'asal_sekolah' => 'SMPN 1 Kota Cimahi',
            'tahun_lulus' => $this->faker->numberBetween(2010, 2020),
            'diterima_tanggal' => $this->faker->date(),
            'diterima_dikelas' => $this->faker->numberBetween(10, 12),
            'alamat' => $this->faker->address,
            'rt' => $this->faker->numberBetween(1, 10),
            'rw' => $this->faker->numberBetween(1, 10),
            'desa' => $this->faker->city,
            'kecamatan' => $this->faker->city,
            'kabupaten' => $this->faker->city,
            'provinsi' => $this->faker->city,
            'kode_pos' => $this->faker->numberBetween(10000, 99999),
            'phone' => $this->faker->phoneNumber(),
            'status_anak' => $this->faker->randomElement(['Anak kandung', 'Anak tiri']),
            'anak_ke' => $this->faker->numberBetween(1, 5),
            'is_graduated' => $this->faker->numberBetween(0, 1),
        ];
    }
}
