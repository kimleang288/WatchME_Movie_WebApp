<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    private $apiKey;
    private $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('TMDB_API_KEY');
        $this->baseUrl = 'https://api.themoviedb.org/3';
    }


    private function fetchMovies($endpoint)
    {
        return Http::withoutVerifying()
            ->timeout(15)
            ->retry(2, 1000)
            ->get($this->baseUrl . $endpoint, [
                'api_key' => $this->apiKey,
            ])
            ->json()['results'];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genresResponse = Http::withoutVerifying()
            ->get($this->baseUrl . '/genre/movie/list', [
                'api_key' => $this->apiKey,
            ]);
        $genres = collect($genresResponse->json()['genres'])
            ->pluck('name', 'id');
        $popularMovies = $this->fetchMovies('/movie/popular');
        $nowPlayingMovies = $this->fetchMovies('/movie/now_playing');
        $topRatedMovies = $this->fetchMovies('/movie/top_rated');
        $upcomingMovies = $this->fetchMovies('/movie/upcoming');

        return view('home', compact('popularMovies', 'nowPlayingMovies', 'topRatedMovies', 'upcomingMovies', 'genres'));
    }

    /**
     * Show specific movie details.
     */
    public function show($id)
    {
        $movie = Http::withoutVerifying()
            ->get($this->baseUrl . "/movie/{$id}", [
                'api_key' => $this->apiKey,
                'append_to_response' => 'credits,similar,videos',
            ])
            ->json();

        return view('movie-detail', [
            'movie'   => $movie,
            'cast'    => collect($movie['credits']['cast']),
            'similar' => $movie['similar']['results'] ?? [],
            'trailer' => collect($movie['videos']['results'] ?? [])
                ->firstWhere('type', 'Trailer'),
        ]);
    }


    /**
    * Search for movies.
    */
    public function search(Request $request)
    {
        $query       = $request->query('query');
        $page        = (int) $request->query('page', 1);

        // Each "display page" = 2 TMDB pages merged
        $tmdbPage1 = ($page * 2) - 1;  // e.g. display page 1 = TMDB pages 1 & 2
        $tmdbPage2 = $page * 2;        // e.g. display page 2 = TMDB pages 3 & 4

        $response1 = Http::withoutVerifying()->timeout(15)
            ->get($this->baseUrl . '/search/movie', [
                'api_key' => $this->apiKey,
                'query'   => $query,
                'page'    => $tmdbPage1,
            ])->json();

        $response2 = Http::withoutVerifying()->timeout(15)
            ->get($this->baseUrl . '/search/movie', [
                'api_key' => $this->apiKey,
                'query'   => $query,
                'page'    => $tmdbPage2,
            ])->json();

        // Merge both pages of results
        $movies = array_merge(
            $response1['results'] ?? [],
            $response2['results'] ?? [],
        );

        // Total display pages = half of TMDB total pages
        $totalPages = (int) ceil(($response1['total_pages'] ?? 1) / 2);

        return view('search-results', [
            'movies'      => $movies,
            'query'       => $query,
            'currentPage' => $page,
            'totalPages'  => $totalPages,
        ]);
    }

}
