<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TvController extends Controller
{
    private $apiKey;
    private $baseUrl;

    public function __construct()
    {
        $this->apiKey = env('TMDB_API_KEY');
        $this->baseUrl = 'https://api.themoviedb.org/3';
    }

    private function fetch($endpoint, $params = [])
    {
        return Http::withoutVerifying()
            ->timeout(15)
            ->retry(2, 1000)
            ->get($this->baseUrl . $endpoint, array_merge(
                ['api_key' => $this->apiKey],
                $params
            ))
            ->json();
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $show = $this->fetch("/tv/{$id}", [
            'append_to_response' => 'credits,similar,videos',
        ]);

        $comments = Comment::where('movie_id', $id)
            ->where('media_type', 'tv')           // ← add this
            ->with('user')
            ->latest()
            ->get();

        return view('tv-detail', [
            'show'    => $show,
            'cast'    => collect($show['credits']['cast'] ?? []),
            'similar' => $show['similar']['results'] ?? [],
            'trailer' => collect($show['videos']['results'] ?? [])
                            ->firstWhere('type', 'Trailer'),
            'seasons' => collect($show['seasons'] ?? [])
                            ->filter(fn($s) => $s['season_number'] > 0), // skip "Specials"
            'comments' => $comments,
        ]);
    }

    public function season($showId, $seasonNumber)
        {
            $show   = $this->fetch("/tv/{$showId}");
            $season = $this->fetch("/tv/{$showId}/season/{$seasonNumber}");

            return view('tv-season', [
                'show'         => $show,
                'season'       => $season,
                'episodes'     => $season['episodes'] ?? [],
                'seasonNumber' => $seasonNumber,
            ]);
        }
        
    public function getSeasonEpisodes($showId, $seasonNumber)
    {
    return $this->fetch("/tv/{$showId}/season/{$seasonNumber}")['episodes'] ?? [];
    }
}
