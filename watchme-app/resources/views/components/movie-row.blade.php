@props([
    'title'  => '',
    'movies' => [],
    'type'   => 'movie', {{-- 'movie' or 'tv' --}}
])

<section class="section">
    <div class="section-header">
        <h2 class="section-title">{{ $title }}</h2>
    </div>
    <div class="movies-wrapper">
        <button class="scroll-btn left">&#10094;</button>
        <div class="movies-grid">
            @foreach($movies as $movie)
                @if($movie['poster_path'])
                @php
                    $url     = $type === 'tv'
                                ? route('tv.show', $movie['id'])
                                : route('movie.detail', $movie['id']);
                    $label   = $movie['title'] ?? $movie['name'] ?? 'Unknown';
                    $date    = $movie['release_date'] ?? $movie['first_air_date'] ?? '';
                @endphp
                <a href="{{ $url }}" class="movie-card">
                    <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}"
                         alt="{{ $label }}" loading="lazy">
                    <div class="movie-play-btn">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="white">
                            <polygon points="5,3 19,12 5,21"/>
                        </svg>
                    </div>
                    <div class="movie-overlay" style="opacity:1; background: linear-gradient(to top, rgba(9,9,9,1) 0%, rgba(9,9,9,0.5) 45%, transparent 100%);">
                        <div class="movie-info-title">{{ $label }}</div>
                        <div style="display:flex; align-items:center; gap:5px; margin-top:4px;">
                            <svg width="11" height="11" viewBox="0 0 24 24" fill="#fbbf24">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                            </svg>
                            <span style="font-size:.75rem; color:#fbbf24; font-weight:600;">
                                {{ number_format($movie['vote_average'] ?? 0, 1) }}
                            </span>
                        </div>
                        <div style="margin-top:3px;">
                            <span style="font-size:.72rem; color:var(--muted);">{{ $date }}</span>
                        </div>
                    </div>
                </a>
                @endif
            @endforeach
        </div>
        <button class="scroll-btn right">&#10095;</button>
    </div>
</section>