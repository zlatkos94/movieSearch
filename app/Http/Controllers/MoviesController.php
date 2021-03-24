<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\TvShow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use phpDocumentor\Reflection\Types\Boolean;

class MoviesController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $hasSearch = $request->has('search');

        if (!$hasSearch) {
            $tvShows = TvShow::paginate(7, ['*'], 'tvShows');
            $movies = Movie::paginate(7, ['*'], 'movies');
        } // Search in the title and body columns from the posts table
        else {
            $tvShows = TvShow::query()
                ->where('name', 'LIKE', "%{$search}%")
                ->paginate(7);

            $movies = Movie::query()
                ->where('title', 'LIKE', "%{$search}%")
                ->paginate(7);
            if (count($movies) == 0) {
                $movies = Http::withToken(config('services.tmdb.token'))
                    ->get('https://api.themoviedb.org/3/search/movie?query=' . $search)
                    ->json()['results'];

                $this->saveMovie($movies);
                $movies = Movie::query()
                    ->where('title', 'LIKE', "%{$search}%")
                    ->paginate(7);
            }
            if (count($tvShows) == 0) {
                $tvShows = Http::withToken(config('services.tmdb.token'))
                    ->get('https://api.themoviedb.org/3/search/tv?query=' . $search)
                    ->json()['results'];
                $this->saveShow($tvShows);

                $tvShows = TvShow::query()
                    ->where('name', 'LIKE', "%{$search}%")
                    ->paginate(7);
            }
        }
        return view('index', compact('movies', 'tvShows'));
    }


    private function saveMovie($movies)
    {
        foreach ($movies as $movie) {
            if (!$this->existsMovie($movie['title'])) {
                $movieEntity = new Movie();
                $movieEntity->title = $movie['title'];
                $movieEntity->overview = $movie['overview'];
                $movieEntity->vote_average = $movie['vote_average'];
                $movieEntity->poster_path = $movie['poster_path'];
                $movieEntity->save();
            }
        }
    }

    /**
     * @param string $title
     * @return bool
     */
    private function existsMovie(string $title)
    {
        return Movie::select('title')->where('title', $title)->exists();
    }

    private function saveShow($tvShows)
    {
        foreach ($tvShows as $tvShow) {
            if (!$this->existsTvShow($tvShow['name'])) {
                $showEntity = new TvShow();
                $showEntity->name = $tvShow['name'];
                $showEntity->overview = $tvShow['overview'];
                $showEntity->vote_average = $tvShow['vote_average'];
                $showEntity->poster_path = $tvShow['poster_path'];
                $showEntity->save();
            }
        }
    }

    /**
     * @param string $title
     * @return bool
     */
    private function existsTvShow(string $name)
    {
        return TvShow::select('name')->where('name', $name)->exists();
    }

    public function show(Movie $movie)
    {
        return view('showMovie', compact('movie'));
    }

    public function showTvShow(TvShow $tvShow)
    {
        return view('showTvShow', compact('tvShow'));
    }


    public function search(Request $request)
    {
        // Get the search value from the request
        $search = $request->input('search');

        // Search in the title and body columns from the posts table
        $movies = Movie::query()
            ->where('title', 'LIKE', "%{$search}%")
            ->get();

        // Return the search view with the resluts compacted
        return view('search', compact('movies'));
    }
}
