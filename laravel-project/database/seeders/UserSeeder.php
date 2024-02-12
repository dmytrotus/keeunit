<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    private $maxItems = 1000;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory($this->maxItems)->create();
    }
}
