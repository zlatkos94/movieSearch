<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{

    public function index()
    {
        return view('search');
    }

    /**
     * @OA\Get(
     *     path="/res-search",
     *     description="Get movies",
     *     @OA\Response(response="default", description="Show movies in database")
     *
     * )
     */
    public function search(Request $request)
    {
            $movies = Movie::query()
                ->where('title', 'LIKE', "%$request->keywords%")
                ->get();
            if (count($movies)==0) {

                $movies = Http::withToken(config('services.tmdb.token'))
                    ->get('https://api.themoviedb.org/3/search/movie?query=' . $request->keywords)
                    ->json()['results'];

                $this->saveMovie($movies);

                $movies = Movie::query()
                    ->where('title', 'LIKE', "%$request->keywords%")
                    ->get();
            }
        return response()->json($movies);

    }
    private function saveMovie($movies)
    {
        foreach ($movies as $movie) {
            $SaveMovie = new Movie();
            $SaveMovie->title = $movie['title'];
            $SaveMovie->overview = $movie['overview'];
            $SaveMovie->vote_average = $movie['vote_average'];
            $SaveMovie->poster_path = $movie['poster_path'];
            $checker = Movie::select('title')->where('title',$movie['title'])->exists();
            if (!$checker){
                $SaveMovie->save();
            }
        }
    }

}
