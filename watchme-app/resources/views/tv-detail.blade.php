@extends('layouts.main')
@section('title', 'WatchME - ' . $show['name'])
@section('content')
@push('styles')
@vite('resources/css/movie-detail.css')
@vite('resources/js/home.js')
@vite('resources/js/tv-detail.js')
@endpush
<main>
    {{-- HERO VIDEO BANNER --}}
    <div class="hero-video">
        @php $backdrop = 'https://image.tmdb.org/t/p/original' . ($show['backdrop_path'] ?? ''); @endphp
        <div class="hero-video-bg" style="background-image: url('{{ $backdrop }}')"></div>
        <div class="hero-video-gradient"></div>
        <div class="video-player" id="videoPlayer" style="display: none;">
            <iframe src="https://vidsrc.me/embed/tv?tmdb={{ $show['id'] }}&season=1&episode=1"
                style="width: 100%; height: 100%;"
                frameborder="0"
                referrerpolicy="origin"
                allowfullscreen></iframe>
        </div>
        <div class="play-btn-wrap" id="playBtnWrap">
            <div class="play-btn" id="playBtn">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="white">
                    <polygon points="5,3 19,12 5,21" />
                </svg>
            </div>
        </div>
    </div>

    {{-- SHOW INFO --}}
    <div class="movie-info-section">
        <div class="movie-info-grid">

            {{-- Poster --}}
            <div class="movie-poster">
                <img src="https://image.tmdb.org/t/p/w500{{ $show['poster_path'] }}" alt="{{ $show['name'] }}">
            </div>

            {{-- Main Info --}}
            <div class="movie-main">
                <h1>{{ $show['name'] }} ({{ substr($show['first_air_date'] ?? '', 0, 4) }})</h1>

                @if($trailer)
                <a href="https://www.youtube.com/watch?v={{ $trailer['key'] }}" target="_blank" class="trailer-btn">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polygon points="5,3 19,12 5,21" fill="currentColor" />
                    </svg>
                    Trailer
                </a>
                @endif

                <p class="movie-desc">{{ $show['overview'] }}</p>
            </div>

            {{-- Details Right --}}
            <div class="movie-details-right">
                <div class="movie-meta-item">
                    <strong>Genre:</strong>
                    {{ collect($show['genres'] ?? [])->pluck('name')->implode(', ') }}
                </div>
                <div class="movie-meta-item">
                    <strong>Creator:</strong>
                    {{ collect($show['created_by'] ?? [])->pluck('name')->implode(', ') ?: 'N/A' }}
                </div>
                <div class="movie-meta-item">
                    <strong>Country:</strong>
                    {{ $show['origin_country'][0] ?? 'N/A' }}
                </div>
                <div class="detail-row">
                    <strong>Seasons:</strong>
                    {{ $show['number_of_seasons'] ?? 'N/A' }}
                </div>
                <div class="detail-row">
                    <strong>Episodes:</strong>
                    {{ $show['number_of_episodes'] ?? 'N/A' }}
                </div>
                <div class="detail-row">
                    <strong>Status:</strong>
                    {{ $show['status'] ?? 'N/A' }}
                </div>
                <div class="detail-row">
                    <strong>First aired:</strong>
                    {{ $show['first_air_date'] ?? 'N/A' }}
                </div>
                <div class="detail-row">
                    <strong>Rating:</strong>
                    {{ number_format($show['vote_average'] ?? 0, 1) }}/10
                </div>
            </div>

        </div>
    </div>

    {{-- SEASONS & EPISODES --}}
    <section class="section">
        <h2 class="section-title">Seasons & Episodes</h2>
        <div class="seasons-list" data-show-id="{{ $show['id'] }}">
            @foreach($seasons as $season)
            @php
            $sNum = $season['season_number'];
            $episodes = app(\App\Http\Controllers\TvController::class)
            ->getSeasonEpisodes($show['id'], $sNum);
            @endphp
            <div class="season-block">
                <button class="season-header" data-season="{{ $sNum }}">
                    <span>{{ $season['name'] }}</span>
                    <span class="season-meta">
                        {{ $season['episode_count'] }} episodes
                        &nbsp;·&nbsp;
                        {{ substr($season['air_date'] ?? '', 0, 4) }}
                    </span>
                    <svg class="season-chevron" width="16" height="16"
                        viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2">
                        <polyline points="6 9 12 15 18 9" />
                    </svg>
                </button>

                <div class="episodes-grid" data-season-grid="{{ $sNum }}" style="display: none;">
                    @foreach($episodes as $ep)
                    <div class="episode-card"
                        data-show="{{ $show['id'] }}"
                        data-season="{{ $sNum }}"
                        data-episode="{{ $ep['episode_number'] }}">
                        <div class="episode-thumb">
                            @if($ep['still_path'])
                            <img src="https://image.tmdb.org/t/p/w300{{ $ep['still_path'] }}"
                                alt="Ep {{ $ep['episode_number'] }}" loading="lazy">
                            @else
                            <div class="no-poster">No Image</div>
                            @endif
                            <div class="episode-play">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="white">
                                    <polygon points="5,3 19,12 5,21" />
                                </svg>
                            </div>
                        </div>
                        <div class="episode-info">
                            <div class="episode-num">Episode {{ $ep['episode_number'] }}</div>
                            <div class="episode-title">{{ $ep['name'] }}</div>
                            <div class="episode-desc">{{ Str::limit($ep['overview'], 100) }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- CAST --}}
    <section class="section">
        <h2 class="section-title">Cast</h2>
        <div class="cast-grid">
            @foreach($cast->take(20) as $actor)
            <div class="cast-card">
                <div class="cast-avatar">
                    <img src="{{ $actor['profile_path']
                        ? 'https://image.tmdb.org/t/p/w185' . $actor['profile_path']
                        : asset('images/no-avatar.png') }}"
                        alt="{{ $actor['name'] }}" loading="lazy">
                </div>
                <div class="cast-name">{{ $actor['name'] }}</div>
                <div class="cast-role">{{ $actor['character'] }}</div>
            </div>
            @endforeach
        </div>
    </section>

    <x-movie-row title="You May Also Like" :movies="$similar" type="tv" />

    @include('comment-section', [
        'mediaType' => 'tv',
        'mediaId'   => $show['id'],
        'route'     => route('comments.tv.store', $show['id']),
    ])
</main>
@endsection