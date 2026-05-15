<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iron Man 3 – WatchMe</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/css/movie-detail.css')
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