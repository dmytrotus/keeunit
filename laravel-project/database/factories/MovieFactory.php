<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Movie;
use App\Models\MovieTranslation;
use App\Models\MovieRating;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'is_visible' => fake()->boolean(),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Movie $movie) {
            MovieTranslation::factory()->create(['movie_id' => $movie->id]);
            MovieRating::factory()->create(['movie_id' => $movie->id]);
        });
    }
}
