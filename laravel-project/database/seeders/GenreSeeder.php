<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;
use App\Models\User;
use App\Models\Movie;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = ['comedy', 'action', 'western', 'romance', 'drama'];

        foreach ($genres as $name) {
            Genre::create([
                'name' => $name,
            ]);
        }

        $randomKeys = array_rand($genres, 2);
        $key1 = $randomKeys[0];
        $key2 = $randomKeys[1];

        foreach (User::all() as $user) {
            $user->genres()->attach($key1);
            $user->genres()->attach($key2);
        }

        $randomKeysMovie = array_rand($genres, 2);
        $key3 = $randomKeysMovie[0];
        $key4 = $randomKeysMovie[1];

        foreach (Movie::all() as $movie) {
            $movie->genres()->attach($key3);
            $movie->genres()->attach($key4);
        }
    }
}
