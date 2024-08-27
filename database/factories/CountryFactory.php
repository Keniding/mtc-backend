<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Country>
 */
class CountryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->country(),
            'descripcion' => $this->faker->text(200),
            'poblacion' => $this->faker->numberBetween(1000, 1000000000),
            'area' => $this->faker->randomFloat(2, 1, 17098246), // El país más grande del mundo (Rusia) tiene aproximadamente 17,098,246 km²
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
