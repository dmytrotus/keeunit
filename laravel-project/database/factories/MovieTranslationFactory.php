<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MovieTranslation>
 */
class MovieTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'language' => fake()->randomElement(['de', 'en', 'uk']),
            'title' => fake()->sentence(3),
            'release_year' => rand(1960, 2024),
            'poster' => fake()->imageUrl(640, 480, null, true)
        ];
    }
}
