@extends('layout.main')
@section('title', 'WatchMe – Your Ultimate Movie Destination')
@section('content')
@push('styles')
    @vite(['resources/css/home.css', 'resources/js/home.js'])
@endpush
<main>
    {{-- HERO --}}
    <section class="hero">
        <div class="hero-bg"></div>
        <div class="hero-gradient"></div>
        <div class="hero-content">
            <div class="hero-badge">
                <svg width="8" height="8" viewBox="0 0 8 8">
                    <circle cx="4" cy="4" r="4" fill="white" />
                </svg>
                NOW SHOWING
            </div>
            <h1 class="hero-title">Iron Man 3</h1>
            <p class="hero-desc">When Tony Stark's world is torn apart by a formidable terrorist called the Mandarin, he starts an odyssey of rebuilding and retribution.</p>
            <div class="hero-meta">
                <span class="hero-rating">
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                    </svg>
                    4.5
                </span>
                <span>2h 10min</span>
                <span>2013</span>
                <span style="color:#4ade80;font-weight:500">Action</span>
            </div>
            <div class="hero-actions">
                <button class="btn-watch">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor">
                        <polygon points="5,3 19,12 5,21" />
                    </svg>
                    Watch Now
                </button>
                <a href="#" class="btn-info">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="12" y1="8" x2="12" y2="12" />
                        <line x1="12" y1="16" x2="12.01" y2="16" />
                    </svg>
                    More Info
                </a>
            </div>
        </div>
    </section>

    {{-- POPULAR MOVIES --}}
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Popular Movies</h2>
        </div>
        <div class="movies-wrapper">
            <button class="scroll-btn left">&#10094;</button>
            <div class="movies-grid" id="popularGrid">
                @foreach($popularMovies as $movie)
                <div class="movie-card">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" loading="lazy">
                    <div class="movie-play-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="white">
                            <polygon points="5,3 19,12 5,21" />
                        </svg>
                    </div>
                    <div class="movie-overlay" style="opacity:1; background: linear-gradient(to top, rgba(9,9,9,1) 0%, rgba(9,9,9,0.5) 45%, transparent 100%);">
                        <div class="movie-info-title">{{ $movie['title'] }}</div>
                        <div style="display:flex; align-items:center; gap:5px; margin-top:4px;">
                            <svg width="11" height="11" viewBox="0 0 24 24" fill="#fbbf24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                            </svg>
                            <span style="font-size:.75rem; color:#fbbf24; font-weight:600;">{{ number_format($movie['vote_average'], 1) }}</span>
                        </div>
                        <div style="margin-top:3px;">
                            <span style="font-size:.72rem; color:var(--muted);">{{ $movie['release_date'] }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="scroll-btn right">&#10095;</button>
        </div>
    </section>

    {{-- NOW PLAYING MOVIES --}}
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Now Playing</h2>
        </div>
        <div class="movies-wrapper">
            <button class="scroll-btn left">&#10094;</button>
            <div class="movies-grid" id="nowPlayingGrid">
                @foreach($nowPlayingMovies as $movie)
                <div class="movie-card">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" loading="lazy">
                    <div class="movie-play-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="white">
                            <polygon points="5,3 19,12 5,21" />
                        </svg>
                    </div>
                    <div class="movie-overlay" style="opacity:1; background: linear-gradient(to top, rgba(9,9,9,1) 0%, rgba(9,9,9,0.5) 45%, transparent 100%);">
                        <div class="movie-info-title">{{ $movie['title'] }}</div>
                        <div style="display:flex; align-items:center; gap:5px; margin-top:4px;">
                            <svg width="11" height="11" viewBox="0 0 24 24" fill="#fbbf24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                            </svg>
                            <span style="font-size:.75rem; color:#fbbf24; font-weight:600;">{{ number_format($movie['vote_average'], 1) }}</span>
                        </div>
                        <div style="margin-top:3px;">
                            <span style="font-size:.72rem; color:var(--muted);">{{ $movie['release_date'] }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="scroll-btn right">&#10095;</button>
        </div>
    </section>

    {{-- TOP RATED MOVIES --}}
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Top Rated Movies</h2>
        </div>
        <div class="movies-wrapper">
            <button class="scroll-btn left">&#10094;</button>
            <div class="movies-grid" id="topRatedGrid">
                @foreach($topRatedMovies as $movie)
                <div class="movie-card">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" loading="lazy">
                    <div class="movie-play-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="white">
                            <polygon points="5,3 19,12 5,21" />
                        </svg>
                    </div>
                    <div class="movie-overlay" style="opacity:1; background: linear-gradient(to top, rgba(9,9,9,1) 0%, rgba(9,9,9,0.5) 45%, transparent 100%);">
                        <div class="movie-info-title">{{ $movie['title'] }}</div>
                        <div style="display:flex; align-items:center; gap:5px; margin-top:4px;">
                            <svg width="11" height="11" viewBox="0 0 24 24" fill="#fbbf24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                            </svg>
                            <span style="font-size:.75rem; color:#fbbf24; font-weight:600;">{{ number_format($movie['vote_average'], 1) }}</span>
                        </div>
                        <div style="margin-top:3px;">
                            <span style="font-size:.72rem; color:var(--muted);">{{ $movie['release_date'] }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="scroll-btn right">&#10095;</button>
        </div>
    </section>

    {{-- UPCOMING MOVIES --}}
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Upcoming Movies</h2>
        </div>
        <div class="movies-wrapper">
            <button class="scroll-btn left">&#10094;</button>
            <div class="movies-grid" id="upcomingGrid">
                @foreach($upcomingMovies as $movie)
                <div class="movie-card">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}" loading="lazy">
                    <div class="movie-play-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="white">
                            <polygon points="5,3 19,12 5,21" />
                        </svg>
                    </div>
                    <div class="movie-overlay" style="opacity:1; background: linear-gradient(to top, rgba(9,9,9,1) 0%, rgba(9,9,9,0.5) 45%, transparent 100%);">
                        <div class="movie-info-title">{{ $movie['title'] }}</div>
                        <div style="display:flex; align-items:center; gap:5px; margin-top:4px;">
                            <svg width="11" height="11" viewBox="0 0 24 24" fill="#fbbf24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                            </svg>
                            <span style="font-size:.75rem; color:#fbbf24; font-weight:600;">{{ number_format($movie['vote_average'], 1) }}</span>
                        </div>
                        <div style="margin-top:3px;">
                            <span style="font-size:.72rem; color:var(--muted);">{{ $movie['release_date'] }}</span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <button class="scroll-btn right">&#10095;</button>
        </div>
    </section>


    {{-- BROWSE BY GENRE --}}
    <section class="section">
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