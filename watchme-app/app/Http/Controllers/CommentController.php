<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
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
    public function store(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required|max:1000',
            'media_type' => 'required|in:movie,tv',
        ]);

        Comment::create([
            'movie_id' => $id,
            'user_id'  => Auth::id(),
            'comment'  => $request->input('comment'),
            'media_type' => $request->input('media_type'),
        ]);

        return redirect()->back()->with('success', 'Comment posted!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //Fetch movie from tmdb
        $movie = Http::get('https://api.themoviedb.org/3/movie/' . $id, [
            'api_key' => env('TMDB_API_KEY'),
        ])->json();

        // Fetch comments from database
        $comments = Comment::where('movie_id', $id)->latest()->get();

        return view('movies.show', compact('movie', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
