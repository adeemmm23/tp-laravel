<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Film>
 */
class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => $this->faker->sentence(2, true),
            'anneesortie' => $this->faker->year,
            'description' => $this->faker->paragraph,
            'duree' => $this->faker->numberBetween(45, 200)
        ];
    }
}
