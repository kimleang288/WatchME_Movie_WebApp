<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WatchMe – Your Ultimate Movie Destination</title>
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
            --red-dim: #b0060f;
            --black: #090909;
            --dark: #111111;
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

        /* NAVBAR */
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
            background: linear-gradient(to bottom, rgba(9, 9, 9, .98) 0%, rgba(9, 9, 9, .7) 70%, transparent 100%);
            backdrop-filter: blur(8px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            transition: background .3s;
        }

        .nav-logo {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.8rem;
            letter-spacing: .06em;
            color: #fff;
            margin-right: 40px;
            flex-shrink: 0;
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

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--text);
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-left: auto;
        }

        .nav-search {
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid var(--border);
            border-radius: 99px;
            padding: 7px 14px;
        }

        .nav-search input {
            background: none;
            border: none;
            outline: none;
            color: var(--text);
            font-family: 'Outfit', sans-serif;
            font-size: .85rem;
            width: 130px;
        }

        .nav-search input::placeholder {
            color: var(--muted);
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
            text-decoration: none;
        }

        .btn-signin:hover {
            background: #c8000b;
        }

        /* HERO */
        .hero {
            position: relative;
            height: 92vh;
            min-height: 560px;
            display: flex;
            align-items: flex-end;
            padding-bottom: 80px;
            overflow: hidden;
        }

        .hero-bg {
            position: absolute;
            inset: 0;
            background-image: url("{{ asset('images/Iron Man background.png') }}");
            background-size: cover;
            background-position: center top;
            filter: brightness(.55);
            transform: scale(1.04);
            animation: heroZoom 12s ease-in-out infinite alternate;
        }

        @keyframes heroZoom {
            from {
                transform: scale(1.04);
            }

            to {
                transform: scale(1.10);
            }
        }

        .hero-gradient {
            position: absolute;
            inset: 0;
            background: linear-gradient(to right, rgba(9, 9, 9, .92) 0%, rgba(9, 9, 9, .3) 55%, transparent 100%),
                linear-gradient(to top, rgba(9, 9, 9, 1) 0%, rgba(9, 9, 9, .4) 40%, transparent 70%);
        }

        .hero-content {
            position: relative;
            z-index: 2;
            padding: 0 48px;
            max-width: 640px;
            animation: fadeUp .8s cubic-bezier(.16, 1, .3, 1) both;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: var(--red);
            color: #fff;
            font-size: .72rem;
            font-weight: 700;
            letter-spacing: .1em;
            text-transform: uppercase;
            padding: 4px 12px;
            border-radius: 4px;
            margin-bottom: 16px;
        }

        .hero-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(3rem, 6vw, 5.5rem);
            line-height: .95;
            letter-spacing: .02em;
            margin-bottom: 16px;
            text-shadow: 0 4px 24px rgba(0, 0, 0, .5);
        }

        .hero-desc {
            font-size: .95rem;
            font-weight: 300;
            color: rgba(240, 240, 240, .8);
            line-height: 1.7;
            margin-bottom: 20px;
            max-width: 480px;
        }

        .hero-meta {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 28px;
            font-size: .82rem;
            color: var(--muted);
        }

        .hero-rating {
            display: flex;
            align-items: center;
            gap: 4px;
            color: #fbbf24;
            font-weight: 600;
        }

        .hero-actions {
            display: flex;
            gap: 12px;
        }

        .btn-watch {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            background: var(--red);
            color: #fff;
            font-family: 'Outfit', sans-serif;
            font-size: .95rem;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background .2s, box-shadow .2s, transform .15s;
        }

        .btn-watch:hover {
            background: #c8000b;
            box-shadow: 0 6px 24px rgba(229, 9, 20, .4);
            transform: translateY(-1px);
        }

        .btn-info {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 24px;
            background: rgba(255, 255, 255, 0.12);
            color: #fff;
            font-family: 'Outfit', sans-serif;
            font-size: .95rem;
            font-weight: 500;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            cursor: pointer;
            backdrop-filter: blur(6px);
            transition: background .2s;
        }

        .btn-info:hover {
            background: rgba(255, 255, 255, 0.2);
        }

        /* SECTIONS */
        .section {
            padding: 48px 48px;
        }

        .section+.section {
            padding-top: 0;
        }

        .section-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            letter-spacing: -.01em;
        }

        .see-all {
            font-size: .82rem;
            color: var(--red);
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .see-all:hover {
            opacity: .75;
        }

        /* MOVIE CARDS */
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
            background: linear-gradient(to top, rgba(9, 9, 9, .95) 0%, rgba(9, 9, 9, .3) 50%, transparent 100%);
            opacity: 0;
            transition: opacity .3s;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 14px;
        }

        .movie-card:hover .movie-overlay {
            opacity: 1;
        }

        .movie-info-title {
            font-size: .88rem;
            font-weight: 600;
            margin-bottom: 2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .movie-info-genre {
            font-size: .74rem;
            color: var(--muted);
        }

        .movie-play-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) scale(0.7);
            width: 44px;
            height: 44px;
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

        .card-badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background: var(--red);
            color: #fff;
            font-size: .65rem;
            font-weight: 700;
            letter-spacing: .06em;
            text-transform: uppercase;
            padding: 3px 8px;
            border-radius: 4px;
        }

        /* GENRE CARDS */
        .genre-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
        }

        .genre-card {
            position: relative;
            border-radius: var(--radius);
            overflow: hidden;
            aspect-ratio: 16/9;
            cursor: pointer;
            transition: transform .3s, box-shadow .3s;
        }

        .genre-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 32px rgba(0, 0, 0, .5);
        }

        .genre-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(.55) saturate(.8);
            transition: filter .3s;
        }

        .genre-card:hover img {
            filter: brightness(.4) saturate(.7);
        }

        .genre-label {
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.6rem;
            letter-spacing: .08em;
            text-shadow: 0 2px 12px rgba(0, 0, 0, .6);
        }

        .genre-card::after {
            content: '';
            position: absolute;
            inset: 0;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: var(--radius);
            pointer-events: none;
        }

        /* FOOTER */
        footer {
            background: #0d0d0d;
            border-top: 1px solid var(--border);
            padding: 56px 48px 32px;
            margin-top: 20px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-brand .logo-text {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 1.8rem;
            letter-spacing: .06em;
            margin-bottom: 12px;
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
            font-size: .8rem;
            font-weight: 600;
            letter-spacing: .08em;
            text-transform: uppercase;
            color: var(--text);
            margin-bottom: 16px;
        }

        .footer-col ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .footer-col ul a {
            font-size: .85rem;
            color: var(--muted);
            transition: color .2s;
        }

        .footer-col ul a:hover {
            color: var(--text);
        }

        .footer-socials {
            display: flex;
            gap: 12px;
            margin-top: 16px;
        }

        .social-icon {
            width: 34px;
            height: 34px;
            background: rgba(255, 255, 255, 0.07);
            border: 1px solid var(--border);
            border-radius: 8px;
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
            padding-top: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: .78rem;
            color: var(--muted);
        }

        @media (max-width: 1024px) {
            .movies-grid {
                grid-template-columns: repeat(4, 1fr);
            }

            .genre-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 768px) {
            .navbar {
                padding: 0 20px;
            }

            .nav-links {
                display: none;
            }

            .hero-content {
                padding: 0 20px;
            }

            .section {
                padding: 32px 20px;
            }

            .movies-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            footer {
                padding: 40px 20px 24px;
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 28px;
            }
        }

        @media (max-width: 480px) {
            .movies-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar">
        <div class="nav-logo">W<span>A</span>TCHME</div>
        <ul class="nav-links">
            <li><a href="#" class="active">Home</a></li>
            <li><a href="#">Movies</a></li>
            <li><a href="#">Genres</a></li>
            <li><a href="#">About Us</a></li>
        </ul>
        <div class="nav-right">
            <div class="nav-search">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
                <input type="text" placeholder="Search Movies...">
            </div>
            <a href="{{ route('login') }}" class="btn-signin">Sign In</a>
        </div>
    </nav>

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

    {{-- TRENDING NOW --}}
<section class="section">
    <div class="section-header">
        <h2 class="section-title">Trending Now</h2>
    </div>
    <div class="movies-grid">
        @php
        $trending = [
            ['title' => 'IT',                    'genre' => 'Horror', 'rating' => '7.5', 'img' => asset('images/IT.png')],
            ['title' => 'Spider Man',             'genre' => 'Action', 'rating' => '8.5', 'img' => asset('images/The Amazing Spiderman.png')],
            ['title' => 'The Conjuring',          'genre' => 'Horror', 'rating' => '9.5', 'img' => asset('images/The Conjuring.png')],
            ['title' => 'Joker',                  'genre' => 'Drama',  'rating' => '9.0', 'img' => asset('images/Joker.png')],
            ['title' => 'Wall E',                 'genre' => 'Family', 'rating' => '8.0', 'img' => asset('images/Wall E.png')],
        ];
        @endphp
        @foreach($trending as $movie)
        <div class="movie-card">
            <img src="{{ $movie['img'] }}" alt="{{ $movie['title'] }}" loading="lazy">
            <div class="movie-play-btn">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="white"><polygon points="5,3 19,12 5,21"/></svg>
            </div>
            <div class="movie-overlay" style="opacity:1; background: linear-gradient(to top, rgba(9,9,9,1) 0%, rgba(9,9,9,0.5) 45%, transparent 100%);">
                <div class="movie-info-title">{{ $movie['title'] }}</div>
                <div style="display:flex; align-items:center; gap:5px; margin-top:4px;">
                        <svg width="11" height="11" viewBox="0 0 24 24" fill="#fbbf24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>
                    <span style="font-size:.75rem; color:#fbbf24; font-weight:600;">{{ $movie['rating'] }}</span>
            </div>
                <div style="margin-top:3px;">
                    <span style="font-size:.72rem; color:var(--muted);">{{ $movie['genre'] }}</span>
                </div>
            </div>
        </div>
        @endforeach
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

    {{-- NEW RELEASES --}}
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">New Releases</h2>
            <a href="#" class="see-all">
                See All
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 18l6-6-6-6" />
                </svg>
            </a>
        </div>
        <div class="movies-grid">
            @php
            $newReleases = [
            ['title' => 'Fast & Furious', 'genre' => 'Action', 'img' => asset('images/Fast and Furious.png'), 'new' => true],
            ['title' => 'Titanic', 'genre' => 'Romance','img' => asset('images/Titanic.png'), 'new' => true],
            ['title' => 'Black Widow', 'genre' => 'Action', 'img' => asset('images/Black Window.png'), 'new' => true],
            ['title' => 'Your Lie in April', 'genre' => 'Anime', 'img' => asset('images/Your Lie in April.png'),'new' => true],
            ['title' => 'Spiderman', 'genre' => 'Action', 'img' => asset('images/Spiderman.png'), 'new' => true],
            ];
            @endphp
            @foreach($newReleases as $movie)
            <div class="movie-card">
                @if($movie['new'])
                <div class="card-badge">New</div>
                @endif
                <img src="{{ $movie['img'] }}" alt="{{ $movie['title'] }}" loading="lazy">
                <div class="movie-play-btn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="white">
                        <polygon points="5,3 19,12 5,21" />
                    </svg>
                </div>
                <div class="movie-overlay">
                    <div class="movie-info-title">{{ $movie['title'] }}</div>
                    <div class="movie-info-genre">{{ $movie['genre'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- FOOTER --}}
    <footer>
        <div class="footer-grid">
            <div class="footer-brand">
                <div class="logo-text">W<span>A</span>TCHME</div>
                <p>Your ultimate destination for the latest movies and entertainment.</p>
                <div class="footer-socials">
                    <div class="social-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" />
                        </svg></div>
                    <div class="social-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z" />
                        </svg></div>
                    <div class="social-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="2" width="20" height="20" rx="5" ry="5" />
                            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z" />
                            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5" />
                        </svg></div>
                    <div class="social-icon"><svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor">
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
        const navbar = document.querySelector('.navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 60) {
                navbar.style.background = 'rgba(9,9,9,0.98)';
                navbar.style.backdropFilter = 'blur(16px)';
            } else {
                navbar.style.background = '';
                navbar.style.backdropFilter = 'blur(8px)';
            }
        });
    </script>
</body>

</html>