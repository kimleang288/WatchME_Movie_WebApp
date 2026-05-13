<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iron Man 3 – WatchMe</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --red: #e50914;
            --black: #090909;
            --dark: #111;
            --card: #161616;
            --border: rgba(255, 255, 255, 0.07);
            --text: #f0f0f0;
            --muted: #888;
            --radius: 10px;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background: var(--black);
            color: var(--text);
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        img {
            display: block;
        }

        /* ── NAVBAR ── */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            padding: 0 48px;
            height: 64px;
            background: rgba(9, 9, 9, 0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
        }

        .nav-logo {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.8rem;
            letter-spacing: .06em;
            color: #fff;
            margin-right: 40px;
        }

        .nav-logo span {
            color: var(--red);
        }

        .nav-links {
            display: flex;
            gap: 28px;
            list-style: none;
            flex: 1;
        }

        .nav-links a {
            font-size: .88rem;
            font-weight: 500;
            color: var(--muted);
            transition: color .2s;
        }

        .nav-links a:hover {
            color: var(--text);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-left: auto;
        }

        .btn-signin {
            padding: 8px 20px;
            background: var(--red);
            color: #fff;
            font-family: 'Outfit', sans-serif;
            font-size: .85rem;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background .2s;
        }

        .btn-signin:hover {
            background: #c8000b;
        }

        /* ── HERO VIDEO BANNER ── */
        .hero-video {
            position: relative;
            width: 100%;
            height: 520px;
            overflow: hidden;
            margin-top: 64px;
        }

        .hero-video-bg {
            position: absolute;
            inset: 0;
            background-image: url('{{ asset("images/Iron Man background.png") }}');
            background-size: cover;
            background-position: center 20%;
            filter: brightness(.45);
        }

        .hero-video-gradient {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(9, 9, 9, 1) 0%, rgba(9, 9, 9, .2) 50%, transparent 100%);
        }

        .play-btn-wrap {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .play-btn {
            width: 72px;
            height: 72px;
            background: rgba(255, 255, 255, 0.15);
            border: 2px solid rgba(255, 255, 255, 0.4);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            backdrop-filter: blur(6px);
            transition: background .2s, transform .2s;
        }

        .play-btn:hover {
            background: rgba(229, 9, 20, .8);
            border-color: var(--red);
            transform: scale(1.1);
        }

        .play-btn svg {
            margin-left: 4px;
        }

        /* ── MOVIE INFO SECTION ── */
        .movie-info-section {
            padding: 0 48px 40px;
            background: var(--black);
        }

        .movie-info-grid {
            display: grid;
            grid-template-columns: 140px 1fr 1fr;
            gap: 28px;
            align-items: start;
            padding-top: 28px;
        }

        .movie-poster {
            width: 140px;
            height: 200px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 16px 40px rgba(0, 0, 0, .6);
            flex-shrink: 0;
        }

        .movie-poster img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .movie-main h1 {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .trailer-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid var(--border);
            border-radius: 6px;
            padding: 6px 14px;
            font-size: .8rem;
            color: var(--muted);
            cursor: pointer;
            margin-bottom: 14px;
            transition: background .2s;
        }

        .trailer-btn:hover {
            background: rgba(255, 255, 255, 0.15);
            color: var(--text);
        }

        .movie-desc {
            font-size: .88rem;
            color: rgba(240, 240, 240, .7);
            line-height: 1.7;
            margin-bottom: 16px;
            max-width: 480px;
        }

        .movie-meta-list {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .movie-meta-item {
            font-size: .83rem;
            color: var(--muted);
        }

        .movie-meta-item strong {
            color: var(--text);
            font-weight: 500;
        }

        .movie-details-right {
            display: flex;
            flex-direction: column;
            gap: 8px;
            padding-top: 46px;
        }

        .detail-row {
            font-size: .83rem;
            color: var(--muted);
        }

        .detail-row strong {
            color: var(--text);
            font-weight: 500;
        }

        /* ── SECTION SHARED ── */
        .section {
            padding: 32px 48px;
        }

        .section-title {
            font-size: 1.15rem;
            font-weight: 600;
            margin-bottom: 20px;
            position: relative;
            padding-left: 14px;
        }

        .section-title::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 3px;
            height: 18px;
            background: var(--red);
            border-radius: 2px;
        }

        /* ── CAST ── */
        .cast-grid {
            display: flex;
            gap: 14px;
            overflow-x: auto;
            padding-bottom: 8px;
        }

        .cast-grid::-webkit-scrollbar {
            height: 4px;
        }

        .cast-grid::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.04);
            border-radius: 99px;
        }

        .cast-grid::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 99px;
        }

        .cast-card {
            flex: 0 0 100px;
            text-align: center;
        }

        .cast-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 8px;
            background: var(--card);
            border: 2px solid var(--border);
        }

        .cast-avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .cast-name {
            font-size: .75rem;
            font-weight: 500;
            margin-bottom: 2px;
        }

        .cast-role {
            font-size: .7rem;
            color: var(--muted);
        }

        /* ── YOU MAY ALSO LIKE ── */
        .movies-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 14px;
        }

        .movie-card {
            position: relative;
            border-radius: var(--radius);
            overflow: hidden;
            aspect-ratio: 2/3;
            background: var(--card);
            cursor: pointer;
            transition: transform .3s cubic-bezier(.16, 1, .3, 1), box-shadow .3s;
        }

        .movie-card:hover {
            transform: translateY(-6px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, .6), 0 0 0 1px rgba(229, 9, 20, .3);
            z-index: 2;
        }

        .movie-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: filter .3s;
        }

        .movie-card:hover img {
            filter: brightness(.6);
        }

        .movie-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(9, 9, 9, .95) 0%, transparent 60%);
            opacity: 0;
            transition: opacity .3s;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 12px;
        }

        .movie-card:hover .movie-overlay {
            opacity: 1;
        }

        .movie-play-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.7);
            width: 40px;
            height: 40px;
            background: rgba(229, 9, 20, .9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity .3s, transform .3s;
        }

        .movie-card:hover .movie-play-btn {
            opacity: 1;
            transform: translate(-50%, -50%) scale(1);
        }

        .movie-info-title {
            font-size: .82rem;
            font-weight: 600;
            margin-bottom: 2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .movie-info-sub {
            font-size: .7rem;
            color: var(--muted);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .movie-rating {
            color: #fbbf24;
            font-size: .7rem;
            display: flex;
            align-items: center;
            gap: 3px;
        }

        /* ── COMMENTS ── */
        .comments-section {
            padding: 32px 48px 48px;
        }

        .comment-input-wrap {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 16px 20px;
            margin-bottom: 24px;
        }

        .comment-input {
            width: 100%;
            background: none;
            border: none;
            outline: none;
            color: var(--muted);
            font-family: 'Outfit', sans-serif;
            font-size: .9rem;
            resize: none;
            min-height: 48px;
        }

        .comment-input::placeholder {
            color: rgba(136, 136, 136, 0.6);
        }

        .comment-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 10px;
        }

        .btn-comment {
            padding: 8px 20px;
            background: var(--red);
            color: #fff;
            font-family: 'Outfit', sans-serif;
            font-size: .85rem;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background .2s;
        }

        .btn-comment:hover {
            background: #c8000b;
        }

        .comment-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .comment-item {
            display: flex;
            gap: 14px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 16px;
        }

        .comment-avatar {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--red), #7c0008);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .85rem;
            font-weight: 700;
            flex-shrink: 0;
            color: #fff;
        }

        .comment-body {
            flex: 1;
        }

        .comment-header {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 6px;
        }

        .comment-user {
            font-size: .85rem;
            font-weight: 600;
        }

        .comment-time {
            font-size: .75rem;
            color: var(--muted);
        }

        .comment-text {
            font-size: .85rem;
            color: rgba(240, 240, 240, .75);
            line-height: 1.6;
        }

        .comment-likes {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-top: 8px;
            font-size: .78rem;
            color: var(--muted);
            cursor: pointer;
            transition: color .2s;
            width: fit-content;
        }

        .comment-likes:hover {
            color: var(--red);
        }

        /* ── FOOTER ── */
        footer {
            background: #0d0d0d;
            border-top: 1px solid var(--border);
            padding: 48px 48px 28px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 36px;
        }

        .footer-brand .logo-text {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.8rem;
            letter-spacing: .06em;
            margin-bottom: 10px;
        }

        .footer-brand .logo-text span {
            color: var(--red);
        }

        .footer-brand p {
            font-size: .85rem;
            color: var(--muted);
            line-height: 1.7;
            max-width: 240px;
        }

        .footer-col h4 {
            font-size: .78rem;
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--text);
            margin-bottom: 14px;
        }

        .footer-col ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 9px;
        }

        .footer-col ul a {
            font-size: .84rem;
            color: var(--muted);
            transition: color .2s;
        }

        .footer-col ul a:hover {
            color: var(--text);
        }

        .footer-socials {
            display: flex;
            gap: 10px;
            margin-top: 14px;
        }

        .social-icon {
            width: 32px;
            height: 32px;
            background: rgba(255, 255, 255, 0.07);
            border: 1px solid var(--border);
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--muted);
            transition: background .2s, color .2s;
            cursor: pointer;
        }

        .social-icon:hover {
            background: var(--red);
            color: #fff;
            border-color: var(--red);
        }

        .footer-bottom {
            border-top: 1px solid var(--border);
            padding-top: 22px;
            text-align: center;
            font-size: .76rem;
            color: var(--muted);
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 0 20px;
            }

            .nav-links {
                display: none;
            }

            .movie-info-section {
                padding: 0 20px 32px;
            }

            .movie-info-grid {
                grid-template-columns: 1fr;
            }

            .movie-poster {
                width: 110px;
                height: 160px;
            }

            .section {
                padding: 24px 20px;
            }

            .movies-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .comments-section {
                padding: 24px 20px 40px;
            }

            footer {
                padding: 40px 20px 24px;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar">
        <div class="nav-logo">W<span>A</span>TCHME</div>
        <ul class="nav-links">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="#">Movies</a></li>
            <li><a href="#">Genres</a></li>
            <li><a href="#">About Us</a></li>
        </ul>
        <div class="nav-right">
            <a href="{{ route('login') }}" class="btn-signin">Sign In</a>
        </div>
    </nav>

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

    {{-- FOOTER --}}
    <footer>
        <div class="footer-grid">
            <div class="footer-brand">
                <div class="logo-text">W<span>A</span>TCHME</div>
                <p>Your ultimate destination for the latest movies and entertainment.</p>
                <div class="footer-socials">
                    <div class="social-icon"><svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                        </svg></div>
                    <div class="social-icon"><svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                        </svg></div>
                    <div class="social-icon"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                        </svg></div>
                    <div class="social-icon"><svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 0 0-1.95 1.96A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.6C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.95A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z" />
                            <polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" fill="white" />
                        </svg></div>
                </div>
            </div>
            <div class="footer-col">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Pricing</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Categories</h4>
                <ul>
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Drama</a></li>
                    <li><a href="#">Comedy</a></li>
                    <li><a href="#">Thriller</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Follow Us</h4>
                <ul>
                    <li><a href="#">Twitter / X</a></li>
                    <li><a href="#">Facebook</a></li>
                    <li><a href="#">Instagram</a></li>
                    <li><a href="#">YouTube</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">&copy; {{ date('Y') }} WatchMe. All rights reserved.</div>
    </footer>

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
</body>

</html>