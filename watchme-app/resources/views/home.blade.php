<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WatchMe – Your Ultimate Movie Destination</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/css/home.css')
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