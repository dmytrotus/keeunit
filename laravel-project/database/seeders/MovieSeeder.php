<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    private $maxItems = 1000;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Movie::factory($this->maxItems)->create();
    }
}
