@extends('layouts.main')
@section('title', 'Search Results - WatchMe')
@section('content')
@push('styles')
@vite(['resources/css/search-results.css'])
@endpush

<section class="section">

    {{-- Explore filter bar (hidden during search) --}}
    @if(!empty($genres))
    <form method="GET" action="{{ route('explore') }}" class="filter-bar">
        <select name="genre">
            <option value="">All Genres</option>
            @foreach($genres as $g)
            <option value="{{ $g['id'] }}" {{ $selectedGenre == $g['id'] ? 'selected' : '' }}>
                {{ $g['name'] }}
            </option>
            @endforeach
        </select>

        <select name="sort">
            <option value="popularity.desc" {{ $selectedSort === 'popularity.desc'   ? 'selected' : '' }}>Most Popular</option>
            <option value="vote_average.desc" {{ $selectedSort === 'vote_average.desc' ? 'selected' : '' }}>Top Rated</option>
            <option value="release_date.desc" {{ $selectedSort === 'release_date.desc' ? 'selected' : '' }}>Newest</option>
        </select>

        <button type="submit">Filter</button>
    </form>
    @endif

    <div class="section-header">
        <h2 class="section-title">Search Results for "{{ $query }}"</h2>
    </div>

    <!-- Movie Grid -->
    <div class="movies-wrapper">
        <div class="movies-grid">
            @forelse($movies as $movie)

            @php
            $title = $movie['title'] ?? $movie['name'] ?? 'Unknown';
            $date = $movie['release_date'] ?? $movie['first_air_date'] ?? '';
            $url = isset($movie['title'])
            ? route('movie.detail', $movie['id'])
            : route('tv.show', $movie['id']);
            @endphp

            @if($movie['poster_path'])
            <a href="{{ $url }}" class="movie-card">
                <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                    alt="{{ $title }}" loading="lazy">
                <div class="movie-play-btn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="white">
                        <polygon points="5,3 19,12 5,21" />
                    </svg>
                </div>
                <div class="movie-overlay" style="opacity:1; background: linear-gradient(to top, rgba(9,9,9,1) 0%, rgba(9,9,9,0.5) 45%, transparent 100%);">
                    <div class="movie-info-title">{{ $title }}</div>
                    <div style="display:flex; align-items:center; gap:5px; margin-top:4px;">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="#fbbf24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                        </svg>
                        <span style="font-size:.75rem; color:#fbbf24; font-weight:600;">
                            {{ number_format($movie['vote_average'] ?? 0, 1) }}
                        </span>
                    </div>
                    <div style="margin-top:3px; display:flex; align-items:center; gap:6px;">
                        <span style="font-size:.72rem; color:var(--muted);">{{ $date }}</span>
                        {{-- badge so user knows if it's a movie or show --}}
                        <span class="{{ isset($movie['title']) ? 'badge-movie' : 'badge-tv' }}">
                            {{ isset($movie['title']) ? 'Movie' : 'TV' }}
                        </span>
                    </div>
                </div>
            </a>
            @endif

            @empty
            <p style="color: var(--muted); padding: 40px 0;">
                No results found for "{{ $query }}".
            </p>
            
            @endforelse
        </div>
    </div>

    {{-- Search --}}
    <x-pagination
        :current-page="$currentPage"
        :total-pages="$totalPages"
        :route="$route"
        :route-params="$routeParams"
    />

</section>
@endsection