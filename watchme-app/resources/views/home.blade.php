@extends('layout.main')
@section('title', 'WatchMe – Your Ultimate Movie Destination')
@section('content')
@push('styles')
    @vite(['resources/css/home.css', 'resources/js/home.js'])
@endpush
<main>
    {{-- HERO --}}
    <section class="hero">
        @php $backdrop = 'https://image.tmdb.org/t/p/original' . ($nowPlayingMovies[1]['backdrop_path'] ?? ''); @endphp
        <div class="hero-bg" style="background-image: url('{{ $backdrop }}')"></div>
        <div class="hero-gradient"></div>
        <div class="hero-content">
            <div class="hero-badge">
                <svg width="8" height="8" viewBox="0 0 8 8">
                    <circle cx="4" cy="4" r="4" fill="white" />
                </svg>
                NOW SHOWING
            </div>
            <h1 class="hero-title">{{ $nowPlayingMovies[1]['title'] }}</h1>
            <p class="hero-desc">{{ $nowPlayingMovies[1]['overview'] }}</p>
            <div class="hero-meta">
                <span class="hero-rating">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                    </svg>
                    {{ number_format($nowPlayingMovies[1]['vote_average'], 1) }}
                </span>
                <span>{{ $nowPlayingMovies[1]['release_date'] }}</span>
                <span style="color:#4ade80;font-weight:500">{{$genres[$nowPlayingMovies[1]['genre_ids'][0]] ?? 'Unknown'}}</span>
            </div>
            <div class="hero-actions">
                <a href="{{ route('movie.detail', $nowPlayingMovies[1]['id']) }}" class="btn-watch">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <polygon points="5,3 19,12 5,21" />
                    </svg>
                    Watch Now
                </a>
            </div>
        </div>
    </section>

    {{-- MOVIE ROWS --}}
    <div id="movies">
        <x-movie-row title="Now Playing" :movies="$nowPlayingMovies" />
        <x-movie-row title="Popular Movies" :movies="$popularMovies" />
        <x-movie-row title="Top Rated Movies" :movies="$topRatedMovies" />
        <x-movie-row title="Upcoming Movies"  :movies="$upcomingMovies" />
    </div>


    {{-- BROWSE BY GENRE --}}
    <section class="section" id="genres">
        <div class="section-header">
            <h2 class="section-title">Browse by Genre</h2>
        </div>
        <div class="genre-grid">
            @php
            $genres = [
            ['name' => 'Anime', 'img' => asset('images/One Piece.png')],
            ['name' => 'Drama', 'img' => asset('images/Your Lie in April.png')],
            ['name' => 'Comedy', 'img' => asset('images/Spy X Family.png')],
            ['name' => 'Thriller','img' => asset('images/Attack on Titan.png')],
            ];
            @endphp
            @foreach($genres as $genre)
            <div class="genre-card">
                <img src="{{ $genre['img'] }}" alt="{{ $genre['name'] }}" loading="lazy">
                <div class="genre-label">{{ $genre['name'] }}</div>
            </div>
            @endforeach
        </div>
    </section>
</main>
@endsection