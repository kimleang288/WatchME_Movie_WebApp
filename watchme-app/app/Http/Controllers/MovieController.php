<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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
            ->json()['results'] ?? [];
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

        $popularShows     = $this->fetchMovies('/tv/popular');
        $topRatedShows    = $this->fetchMovies('/tv/top_rated');

        return view('home', compact('popularMovies', 'nowPlayingMovies', 'topRatedMovies', 'upcomingMovies', 'genres', 'popularShows', 'topRatedShows'));
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


        $comments = Comment::where('movie_id', $id)
            ->where('media_type', 'movie')
            ->with('user')
            ->latest()
            ->get();

        return view('movie-detail', [
            'movie'   => $movie,
            'cast'    => collect($movie['credits']['cast']),
            'similar' => $movie['similar']['results'] ?? [],
            'trailer' => collect($movie['videos']['results'] ?? [])
                ->firstWhere('type', 'Trailer'),
            'comments' => $comments,
        ]);
    }


    /**
     * Search for movies.
     */
    public function search(Request $request)
    {
        $query = $request->query('query');
        $page  = (int) $request->query('page', 1);

        $tmdbPage1 = ($page * 2) - 1;
        $tmdbPage2 = $page * 2;

        // fetch movies and tv in parallel
        $movieR1 = Http::withoutVerifying()->timeout(15)
            ->get($this->baseUrl . '/search/movie', ['api_key' => $this->apiKey, 'query' => $query, 'page' => $tmdbPage1])->json();
        $movieR2 = Http::withoutVerifying()->timeout(15)
            ->get($this->baseUrl . '/search/movie', ['api_key' => $this->apiKey, 'query' => $query, 'page' => $tmdbPage2])->json();

        $tvR1 = Http::withoutVerifying()->timeout(15)
            ->get($this->baseUrl . '/search/tv', ['api_key' => $this->apiKey, 'query' => $query, 'page' => $tmdbPage1])->json();
        $tvR2 = Http::withoutVerifying()->timeout(15)
            ->get($this->baseUrl . '/search/tv', ['api_key' => $this->apiKey, 'query' => $query, 'page' => $tmdbPage2])->json();

        $results = array_merge(
            $movieR1['results'] ?? [],
            $movieR2['results'] ?? [],
            $tvR1['results']    ?? [],
            $tvR2['results']    ?? [],
        );

        // sort by popularity so best matches float to top
        usort($results, fn($a, $b) => $b['popularity'] <=> $a['popularity']);

        $totalPages = (int) ceil(max(
            $movieR1['total_pages'] ?? 1,
            $tvR1['total_pages']    ?? 1,
        ) / 2);

        return view('search-results', [
            'movies'      => $results,
            'query'       => $query,
            'currentPage' => $page,
            'totalPages'  => $totalPages,
            'genres'        => [],
            'selectedGenre' => null,
            'selectedSort'  => null,
            'route'         => 'movies.search',
            'routeParams'   => ['query' => $query],
        ]);
    }

    public function explore(Request $request)
    {
        $genre = $request->query('genre');
        $sort  = $request->query('sort', 'popularity.desc');
        $page  = (int) $request->query('page', 1);

        $tmdbPage1 = ($page * 2) - 1;
        $tmdbPage2 = $page * 2;

        // genres...
        $genres = Http::withoutVerifying()->timeout(15)->get($this->baseUrl . '/genre/movie/list', ['api_key' => $this->apiKey])->json()['genres'] ?? [];

        $params1 = array_filter([
            'api_key'     => $this->apiKey,
            'sort_by'     => $sort,
            'with_genres' => $genre,
            'page'        => $tmdbPage1,
        ]);

        $params2 = array_filter([
            'api_key'     => $this->apiKey,
            'sort_by'     => $sort,
            'with_genres' => $genre,
            'page'        => $tmdbPage2,
        ]);

        $movieR1 = Http::withoutVerifying()->timeout(15)->get($this->baseUrl . '/discover/movie', $params1)->json();
        $movieR2 = Http::withoutVerifying()->timeout(15)->get($this->baseUrl . '/discover/movie', $params2)->json();
        $tvR1    = Http::withoutVerifying()->timeout(15)->get($this->baseUrl . '/discover/tv', $params1)->json();
        $tvR2    = Http::withoutVerifying()->timeout(15)->get($this->baseUrl . '/discover/tv', $params2)->json();

        $results = array_merge(
            $movieR1['results'] ?? [],
            $movieR2['results'] ?? [],
            $tvR1['results']    ?? [],
            $tvR2['results']    ?? [],
        );

        usort($results, fn($a, $b) => $b['popularity'] <=> $a['popularity']);

        $totalPages = (int) min(
            max($movieR1['total_pages'] ?? 1, $tvR1['total_pages'] ?? 1) / 2,
            500
        );

        return view('search-results', [
            'movies'        => $results,
            'currentPage'   => $page,
            'totalPages'    => $totalPages,
            'query'         => null,
            'genres'        => $genres,
            'selectedGenre' => $genre,
            'selectedSort'  => $sort,
            'route'         => 'explore',
            'routeParams'   => ['genre' => $genre, 'sort' => $sort],
        ]);
    }
}
