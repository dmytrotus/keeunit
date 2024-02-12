<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    use HasFactory;

    public function scopeWithAllTables(Builder $query): void
    {
        $query->join('movie_translations', 'movies.id', '=', 'movie_translations.movie_id');
        $query->join('movie_ratings', 'movies.id', '=', 'movie_ratings.movie_id');
    }

    public function genres(): BelongsToMany
    {
        return $this->belongsToMany(Genre::class, 'movie_genres');
    }
}
