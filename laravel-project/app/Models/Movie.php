<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Movie extends Model
{
    use HasFactory;

    public function scopeWithAllTables(Builder $query): void
    {
        $query->join('movie_translations', 'movies.id', '=', 'movie_translations.movie_id');
        $query->join('movie_ratings', 'movies.id', '=', 'movie_ratings.movie_id');
    }
}
