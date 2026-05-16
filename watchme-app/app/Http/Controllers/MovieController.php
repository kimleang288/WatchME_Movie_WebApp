<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $apiKey = env('TMDB_API_KEY');
        $popularResponse = Http::get('https://api.themoviedb.org/3/movie/popular', [
            'api_key' => $apiKey,
        ]);

        $nowPlayingResponse = Http::get('https://api.themoviedb.org/3/movie/now_playing', [
            'api_key' => $apiKey,
        ]);
        
        $topRatedResponse = Http::get('https://api.themoviedb.org/3/movie/top_rated', [
            'api_key' => $apiKey,
        ]);

        $upcomingResponse = Http::get('https://api.themoviedb.org/3/movie/upcoming', [
            'api_key' => $apiKey,
        ]);

        $popularMovies = $popularResponse->json()['results'];
        $nowPlayingMovies = $nowPlayingResponse->json()['results'];
        $topRatedMovies = $topRatedResponse->json()['results'];
        $upcomingMovies = $upcomingResponse->json()['results'];

        return view('home', compact('popularMovies', 'nowPlayingMovies', 'topRatedMovies', 'upcomingMovies'));
    }
}
