<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ListSekolahAsalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_jenjang' => $this->faker->numberBetween(1, 2),
            'nama_sekolah' => $this->faker->unique()->randomElement(['SMPN 1 Rawamerta', 'SMPN 2 Rawamerta', 'SMPN 1 Kutawaluya', 'SMPN 2 Kutawaluya', 'SMPN 1 Cilebar', 'SMPN Satu Atap Rawamerta', 'MTsN 3 Karawang', 'MTsN 5 Karawang', 'SMP Annihayah', 'MTs Al-Ishlah', 'SMP Nihayatul Amal', 'MTs Annihayah']),
        ];
    }
}
