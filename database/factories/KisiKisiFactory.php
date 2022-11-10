<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KisiKisi>
 */
class KisiKisiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'mapel' => $this->faker->randomElement(['Matematika', 'Biologi', 'PKN', 'B. Indonesia', 'B. Inggris']),
            'kelas' => $this->faker->randomElement(['10 IPA', '11 IPA', '12 IPA', '10 IPS', '11 IPS', '12 IPS']),
            'status' => $this->faker->numberBetween(0, 1),
            'slug' => $this->faker->randomElement(['mtk-10-ipa', 'mtk-11-ipa', 'mtk-12-ipa', 'biologi-10-ipa', 'pkn-11-ips'])
        ];
    }
}
