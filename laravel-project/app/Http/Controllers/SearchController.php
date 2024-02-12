<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Models\Movie;
use App\Models\User;
use App\Http\Resources\MovieResource;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    public function getRes(): JsonResponse
    {
        Validator::make(request()->all(), [
            'movie' => 'required|string|max:255',
            'language' => 'required|max:255',
            'user_id' => 'required|exists:App\Models\User,id'
        ]);

        $searchString = request()->movie;
        $lang = request()->language;
        $user_id = request()->user_id;

        $results = Movie::withAllTables()
                ->select(
                    'movies.id',
                    'title',
                    'release_year',
                    DB::raw('(SELECT AVG(rating) FROM movie_ratings WHERE movie_id = movies.id) as avg_rating'),
                    DB::raw('(SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(GROUP_CONCAT(rating ORDER BY rating ASC), ",", FLOOR(1 + COUNT(*)/2)), ",", -1) FROM movie_ratings WHERE movie_id = movies.id) as median_rating')
                )
                ->where('is_visible', true)
                ->where('language', $lang)
                ->where('title', 'like', "%{$searchString}%")
                ->take(10)->get([
                    'movies.id',
                    'title',
                    'release_year',
                    'avg_rating',
                    'median_rating'
                ]);

        $filteredByGenre = $results->filter(function (Movie $movie) use ($user_id) {
            return $this->intersectionUserMovieGenre($user_id, $movie->id) === true;
        });

        // if you can't see the results, please change the line into
        // $json = json_decode(MovieResource::collection($results)->toJson(), true);
        $json = json_decode(MovieResource::collection($filteredByGenre)->toJson(), true);

        return response()->json($json);
    }

    public function intersectionUserMovieGenre(int $user_id, int $movie_id): bool
    {
        $userGenresArr = User::find($user_id)->genres->pluck('id')->toArray();
        $movieGenresArr = Movie::find($movie_id)->genres->pluck('id')->toArray();

        $intersection = array_intersect($userGenresArr, $movieGenresArr);
        return (count($intersection) > 0) ? true : false;
    }

    public function getResults(): JsonResponse
    {
        $userData = [
            'id' => 4,
            'language' => 'en',
        ];

        return $this->getRes();

        /**
         * Your task is to return real data in this method.
         * Your implementation should focus on being fast, even as the tables get bigger (think 10.000+ users, 10.000+ movies, 1.000.000+ ratings).
         * Movies have multiple genres attached to them. Users also have genres that they have selected to be relevant for them.
         * This method should take the user's search query as a GET parameter and find the first 10 matching movies. For each movie return:
         *  - title in the user's language
         *  - release year
         *  - the average of all the movie's ratings
         *  - the median of all the movie's ratings
         *
         * In addition, movies are only visible to users if:
         *  - the movie is visible
         *  - the movie is available in the user's language
         *  - the title of the movie in the user's language contains the search query
         *  - the intersection of the movie's genres and the user's genres is bigger than 0
         * In order to keep this project simple, we have set up a $userData array that contains the data of the currently logged-in user. Please treat it as being dynamic, e.g. as if it could contain any valid data.
         *
         * This is the db structure you can expect:
         *  movies:
         *    - id
         *    - is_visible
         *    - created_at
         *    - updated_at
         *  movie_translations:
         *    - movie_id
         *    - language
         *    - title
         *    - release_year
         *    - poster
         *    - created_at
         *    - updated_at
         *   movie_ratings:
         *    - id
         *    - movie_id
         *    - user_id
         *    - rating (this is of type int)
         *    - rating_text (this is of type text)
         *   genres:
         *    - id
         *    - name
         *  movie_genres:
         *    - id
         *    - movie_id
         *    - genre_id
         *  user_genres:
         *    - id
         *    - user_id
         *    - genre_id
         */

        $results = [
            [
                'title' => 'Pulp Fiction',
                'year' => 1994,
                'avg_rating' => 9.9,
                'median_rating' => 9.8,
            ],
        ];

        return response()->json($results);
    }
}
