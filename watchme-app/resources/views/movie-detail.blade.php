@extends('layouts.main')
@section('title', 'WatchME - Movie Details')
@section('content')
@push('styles')
    @vite(['resources/css/movie-detail.css', 'resources/js/movie-detail.js'])
    @vite('resources/js/home.js')
@endpush
<main>
    {{-- HERO VIDEO BANNER --}}
    <div class="hero-video">
    @php $backdrop = 'https://image.tmdb.org/t/p/original' . ($movie['backdrop_path'] ?? ''); @endphp
    <div class="hero-video-bg" style="background-image: url('{{ $backdrop }}')"></div>
        <div class="hero-video-gradient"></div>
        <div class="video-player" id="videoPlayer" style="display: none;">
            <iframe src="https://vidsrcme.ru/embed/movie?tmdb={{ $movie['id'] }}" 
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

    {{-- MOVIE INFO --}}
    <div class="movie-info-section">
        <div class="movie-info-grid">

            {{-- Poster --}}
            <div class="movie-poster">
                <img src="https://image.tmdb.org/t/p/w500{{ $movie['poster_path'] }}" alt="{{ $movie['title'] }}">
            </div>

            {{-- Main Info --}}
            <div class="movie-main">
                <h1>{{ $movie['title'] }} ({{ substr($movie['release_date'], 0, 4) }})</h1>

                @if($trailer)
                <a href="https://www.youtube.com/watch?v={{ $trailer['key'] }}" target="_blank" class="trailer-btn">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polygon points="5,3 19,12 5,21" fill="currentColor" />
                    </svg>
                    Trailer
                </a>
                @endif

                <p class="movie-desc">{{ $movie['overview'] }}</p>
            </div>

            {{-- Details Right --}}
            <div class="movie-details-right">
                <div class="movie-meta-item"><strong>Genre:</strong> {{ collect($movie['genres'])->pluck('name')->implode(', ') }}</div>
                <div class="movie-meta-item"><strong>Director:</strong> {{ collect($movie['credits']['crew'])->firstWhere('job', 'Director')['name'] ?? 'N/A' }}</div>
                <div class="movie-meta-item"><strong>Country:</strong> {{ $movie['production_countries'][0]['name'] ?? 'N/A' }}</div>
                <div class="detail-row"><strong>Duration:</strong>     {{ floor($movie['runtime'] / 60) }}h{{ $movie['runtime'] % 60 }}min</div>
                <div class="detail-row"><strong>Release:</strong> {{ $movie['release_date'] }}</div>
                <div class="detail-row"><strong>Rating:</strong> {{ number_format($movie['vote_average'], 1) }}/10</div>
            </div>

            </div>
        </div>
    </div>

        {{-- CAST --}}
        <section class="section">
            <h2 class="section-title">Cast</h2>
            <div class="cast-grid">
                @foreach($cast as $actor)
                <div class="cast-card">
                    <div class="cast-avatar">
                        <img src="{{ $actor['profile_path']
                    ? 'https://image.tmdb.org/t/p/w185'.$actor['profile_path']
                    : asset('images/no-avatar.png') }}"
                            alt="{{ $actor['name'] }}" loading="lazy">
                    </div>
                    <div class="cast-name">{{ $actor['name'] }}</div>
                    <div class="cast-role">{{ $actor['character'] }}</div>
                </div>
                @endforeach
            </div>
        </section>

        <x-movie-row title="You May Also Like" :movies="$similar" />

        {{-- COMMENTS --}}
        <div class="comments-section">
            <h2 class="section-title">Comments</h2>

            <div class="comment-input-wrap">
                <textarea class="comment-input" placeholder="Add a comment..."></textarea>
                <div class="comment-actions">
                    <button class="btn-comment">Post</button>
                </div>
            </div>

            <div class="comment-list">
                @php
                $comments = [
                ['user' => 'Alex M.', 'initial' => 'A', 'time' => '2 hours ago', 'text' => 'Absolutely loved this movie! The action sequences are incredible and RDJ is at his best here.'],
                ['user' => 'Sarah K.', 'initial' => 'S', 'time' => '5 hours ago', 'text' => 'The Mandarin twist was unexpected but I thought it was brilliantly done. One of the best MCU films.'],
                ['user' => 'John D.', 'initial' => 'J', 'time' => '1 day ago', 'text' => 'Great visuals and story. Tony Stark\'s character development in this one is really compelling.'],
                ];
                @endphp
                @foreach($comments as $comment)
                <div class="comment-item">
                    <div class="comment-avatar">{{ $comment['initial'] }}</div>
                    <div class="comment-body">
                        <div class="comment-header">
                            <span class="comment-user">{{ $comment['user'] }}</span>
                            <span class="comment-time">{{ $comment['time'] }}</span>
                        </div>
                        <div class="comment-text">{{ $comment['text'] }}</div>
                        <div class="comment-likes">
                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3H14z" />
                                <path d="M7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3" />
                            </svg>
                            Like
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
</main>
@endsection