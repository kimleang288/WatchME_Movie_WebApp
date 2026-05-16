@extends('layouts.app')
@section('title', 'WatchME - Movie Details')
@section('content')
@push('styles')
    @vite('resources/css/movie-detail.css')
@endpush
<main>
    {{-- HERO VIDEO BANNER --}}
    <div class="hero-video">
        <div class="hero-video-bg"></div>
        <div class="hero-video-gradient"></div>
        <div class="play-btn-wrap">
            <div class="play-btn">
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
                <img src="{{ asset('images/Iron Man 3.png') }}" alt="Iron Man 3">
            </div>

            {{-- Main Info --}}
            <div class="movie-main">
                <h1>Iron Man 3 (2013)</h1>
                <button class="trailer-btn">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polygon points="5,3 19,12 5,21" fill="currentColor" />
                    </svg>
                    Trailer
                </button>
                <p class="movie-desc">When Tony Stark's world is torn apart by a formidable terrorist called the Mandarin, he starts an odyssey of rebuilding and retribution.</p>
                <div class="movie-meta-list">
                </div>
            </div>
            {{-- Details Right --}}
            <div class="movie-details-right">
                <div class="movie-meta-item"><strong>Genre:</strong> Action, Science Fiction, Super Hero</div>
                <div class="movie-meta-item"><strong>Director:</strong> Shane Black</div>
                <div class="movie-meta-item"><strong>Country:</strong> USA</div>
                <div class="detail-row"><strong>Duration:</strong> 2h 10min</div>
                <div class="detail-row"><strong>Release:</strong> 2013</div>
                <div class="detail-row"><strong>Rating:</strong> 8/10</div>
            </div>

        </div>
    </div>

    {{-- CAST --}}
    <section class="section">
        <h2 class="section-title">Cast</h2>
        <div class="cast-grid">
            @php
            $cast = [
            ['name' => 'Robert Downey Jr.', 'role' => 'Tony Stark', 'img' => 'https://image.tmdb.org/t/p/w185/im9SAqJPZKEbVZGmjXuLI4O7RvM.jpg'],
            ['name' => 'Robert Downey Jr.', 'role' => 'Tony Stark', 'img' => 'https://image.tmdb.org/t/p/w185/im9SAqJPZKEbVZGmjXuLI4O7RvM.jpg'],
            ['name' => 'Robert Downey Jr.', 'role' => 'Tony Stark', 'img' => 'https://image.tmdb.org/t/p/w185/im9SAqJPZKEbVZGmjXuLI4O7RvM.jpg'],
            ['name' => 'Robert Downey Jr.', 'role' => 'Tony Stark', 'img' => 'https://image.tmdb.org/t/p/w185/im9SAqJPZKEbVZGmjXuLI4O7RvM.jpg'],
            ['name' => 'Robert Downey Jr.', 'role' => 'Tony Stark', 'img' => 'https://image.tmdb.org/t/p/w185/im9SAqJPZKEbVZGmjXuLI4O7RvM.jpg'],
            ['name' => 'Robert Downey Jr.', 'role' => 'Tony Stark', 'img' => 'https://image.tmdb.org/t/p/w185/im9SAqJPZKEbVZGmjXuLI4O7RvM.jpg'],
            ['name' => 'Robert Downey Jr.', 'role' => 'Tony Stark', 'img' => 'https://image.tmdb.org/t/p/w185/im9SAqJPZKEbVZGmjXuLI4O7RvM.jpg'],
            ];
            @endphp
            @foreach($cast as $actor)
            <div class="cast-card">
                <div class="cast-avatar">
                    <img src="{{ $actor['img'] }}" alt="{{ $actor['name'] }}" loading="lazy">
                </div>
                <div class="cast-name">{{ $actor['name'] }}</div>
                <div class="cast-role">{{ $actor['role'] }}</div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- YOU MAY ALSO LIKE --}}
    <section class="section">
        <h2 class="section-title">You May Also Like</h2>
        <div class="movies-grid">
            @php
            $related = [
            ['title' => 'IT', 'rating' => '7.3', 'img' => asset('images/IT.png')],
            ['title' => 'Spiderman', 'rating' => '7.4', 'img' => asset('images/Spiderman.png')],
            ['title' => 'The Conjuring', 'rating' => '7.5', 'img' => asset('images/The Conjuring.png')],
            ['title' => 'Joker', 'rating' => '8.4', 'img' => asset('images/Joker.png')],
            ['title' => 'Wall-E', 'rating' => '8.4', 'img' => asset('images/Wall E.png')],
            ];
            @endphp
            @foreach($related as $movie)
            <div class="movie-card">
                <img src="{{ $movie['img'] }}" alt="{{ $movie['title'] }}" loading="lazy">
                <div class="movie-play-btn">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="white">
                        <polygon points="5,3 19,12 5,21" />
                    </svg>
                </div>
                <div class="movie-overlay">
                    <div class="movie-info-title">{{ $movie['title'] }}</div>
                    <div class="movie-info-sub">
                        <span class="movie-rating">
                            <svg width="10" height="10" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                            </svg>
                            {{ $movie['rating'] }}
                        </span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

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

    <script>
        // Navbar scroll
        const navbar = document.querySelector('.navbar');
        window.addEventListener('scroll', () => {
            navbar.style.background = window.scrollY > 40 ?
                'rgba(9,9,9,0.98)' :
                'rgba(9,9,9,0.95)';
        });

        // Comment like toggle
        document.querySelectorAll('.comment-likes').forEach(btn => {
            btn.addEventListener('click', () => {
                btn.style.color = btn.style.color === 'rgb(229, 9, 20)' ? '' : 'var(--red)';
            });
        });

        // Comment post (placeholder)
        document.querySelector('.btn-comment').addEventListener('click', () => {
            const textarea = document.querySelector('.comment-input');
            if (textarea.value.trim()) {
                alert('Comment posted! (Connect to backend to save)');
                textarea.value = '';
            }
        });
    </script>
</main>
@endsection