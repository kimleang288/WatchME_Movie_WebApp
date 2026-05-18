@extends('layout.main')
@section('title', 'Search Results - WatchMe')
@section('content')
@push('styles')
@vite(['resources/css/search-results.css'])
@endpush
<section class="section">
    <div class="section-header">
        <h2 class="section-title">Search Results for "{{ $query }}"</h2>
    </div>
    <div class="movies-wrapper">
        <div class="movies-grid" id="topRatedGrid">
            @foreach($movies as $movie)
                @if($movie['poster_path'])
                    <a href="{{ route('movie.detail', $movie['id']) }}" class="movie-card">
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
                    </a>
                @endif
            @endforeach
        </div>
    </div>

    <div class="pagination">

        {{-- PREVIOUS --}}
        @if($currentPage > 1)
        <a href="{{ route('movies.search', ['query' => $query, 'page' => $currentPage - 1]) }}" class="page-btn">
            &laquo;
        </a>
        @else
        <span class="page-btn disabled">&laquo;</span>
        @endif

        {{-- PAGE NUMBERS (show window of 5 around current page) --}}
        @php
        $window = 2; // pages to show on each side of current
        $rangeStart = max(1, $currentPage - $window);
        $rangeEnd = min($totalPages, $currentPage + $window);
        @endphp

        {{-- First page + ellipsis --}}
        @if($rangeStart > 1)
        <a href="{{ route('movies.search', ['query' => $query, 'page' => 1]) }}" class="page-btn">1</a>
        @if($rangeStart > 2)
        <span class="page-btn disabled">...</span>
        @endif
        @endif

        {{-- Page window --}}
        @for($i = $rangeStart; $i <= $rangeEnd; $i++)
            <a href="{{ route('movies.search', ['query' => $query, 'page' => $i]) }}"
            class="page-btn {{ $i === $currentPage ? 'active' : '' }}">
            {{ $i }}
            </a>
            @endfor

            {{-- Last page + ellipsis --}}
            @if($rangeEnd < $totalPages)
                @if($rangeEnd < $totalPages - 1)
                <span class="page-btn disabled">...</span>
                @endif
                <a href="{{ route('movies.search', ['query' => $query, 'page' => $totalPages]) }}" class="page-btn">
                    {{ $totalPages }}
                </a>
                @endif

                {{-- NEXT --}}
                @if($currentPage < $totalPages)
                    <a href="{{ route('movies.search', ['query' => $query, 'page' => $currentPage + 1]) }}" class="page-btn">
                    &raquo;
                    </a>
                    @else
                    <span class="page-btn disabled">&raquo;</span>
                    @endif
    </div>
</section>
@endsection