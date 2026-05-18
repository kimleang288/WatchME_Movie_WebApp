<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>

<body>
    <nav class="navbar">
        <a href="/">
            <img src="{{ asset('images/App Logo.png') }}" alt="Logo" class="nav-logo">
        </a>
        <ul class="nav-links">
            <li><a href="{{ route('home') }}" class="active">Home</a></li>
            <li><a href="#movies">Movies</a></li>
            <li><a href="#genres">Genres</a></li>
            <li><a href="{{ route('about') }}">About Us</a></li>
        </ul>
        <div class="nav-right">
            <form action="{{ route('movies.search') }}" method="GET" class="nav-search">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="8" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
                <input type="text" placeholder="Search Movies..." name="query" value="{{ request('query') }}">
            </div>
            <a href="{{ route('login') }}" class="btn-signin">Sign In</a>
        </form>
    </nav>

    <body>
        @yield('content')
    </body>

    {{-- FOOTER --}}
    <footer>
        <div class="footer-grid">
            <div class="footer-brand">
                <img src="{{ asset('images/App Logo.png') }}" alt="WatchME Logo" class="footer-logo">
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
</body>

</html>