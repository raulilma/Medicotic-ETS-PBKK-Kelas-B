<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Formulir>
 */
class FormulirFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'slug' => $this->faker->slug(),
            'kondisi' => $this->faker->sentence(mt_rand(2, 8)),
            'suhu' => $this->faker->numberBetween(35,45.5),
            'dokter_id'=> mt_rand(1,3),
            'pasien_id'=> mt_rand(1,3),
            'resep'=> mt_rand(1,3),
        ];
    }
}
