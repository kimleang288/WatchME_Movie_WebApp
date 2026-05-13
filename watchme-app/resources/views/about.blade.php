<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us – WatchMe</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        :root {
            --red:    #e50914;
            --black:  #090909;
            --card:   #161616;
            --border: rgba(255,255,255,0.07);
            --text:   #f0f0f0;
            --muted:  #888;
            --radius: 10px;
        }
        html { scroll-behavior: smooth; }
        body { font-family: 'Outfit', sans-serif; background: var(--black); color: var(--text); overflow-x: hidden; }
        a { text-decoration: none; color: inherit; }
        img { display: block; }

        /* ── NAVBAR ── */
        .navbar {
            position: fixed; top: 0; left: 0; right: 0; z-index: 100;
            display: flex; align-items: center; padding: 0 48px; height: 64px;
            background: rgba(9,9,9,0.95);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
        }
        .nav-logo { font-family: 'Bebas Neue', sans-serif; font-size: 1.8rem; letter-spacing: .06em; color: #fff; margin-right: 40px; flex-shrink: 0; }
        .nav-logo span { color: var(--red); }
        .nav-links { display: flex; gap: 28px; list-style: none; flex: 1; }
        .nav-links a { font-size: .88rem; font-weight: 500; color: var(--muted); transition: color .2s; }
        .nav-links a:hover, .nav-links a.active { color: var(--text); }
        .nav-right { display: flex; align-items: center; gap: 16px; margin-left: auto; }
        .btn-signin { padding: 8px 20px; background: var(--red); color: #fff; font-family: 'Outfit', sans-serif; font-size: .85rem; font-weight: 600; border: none; border-radius: 6px; cursor: pointer; transition: background .2s; text-decoration: none; }
        .btn-signin:hover { background: #c8000b; }

        /* ── HERO ── */
        .hero {
            position: relative;
            height: 100vh; min-height: 600px;
            display: flex; flex-direction: column;
            align-items: center; justify-content: center;
            text-align: center;
            overflow: hidden;
            padding: 0 24px;
        }

        /* poster wall bg */
        .bg-wall {
            position: absolute; inset: 0;
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 4px;
            transform: rotate(-5deg) scale(1.18);
            opacity: .22;
            filter: saturate(0.5) blur(1px);
            pointer-events: none;
            z-index: 0;
        }
        .bg-wall .col { display: flex; flex-direction: column; gap: 4px; }
        .bg-wall .col:nth-child(even) { margin-top: -60px; }
        .bg-wall .poster { flex: 0 0 auto; border-radius: 6px; overflow: hidden; aspect-ratio: 2/3; background: #1a1a1a; }
        .bg-wall .poster img { width: 100%; height: 100%; object-fit: cover; display: block; }

        /* dark overlay */
        .bg-overlay {
            position: absolute; inset: 0; z-index: 1;
            background:
                radial-gradient(ellipse 80% 60% at 50% 40%, rgba(9,9,9,0.3) 0%, rgba(9,9,9,0.85) 70%),
                linear-gradient(to bottom, rgba(9,9,9,0.6) 0%, rgba(9,9,9,0.2) 40%, rgba(9,9,9,0.7) 80%, rgba(9,9,9,1) 100%);
        }

        /* hero content */
        .hero-content {
            position: relative; z-index: 2;
            display: flex; flex-direction: column; align-items: center;
            animation: fadeUp .8s cubic-bezier(.16,1,.3,1) both;
        }
        @keyframes fadeUp { from { opacity:0; transform:translateY(28px); } to { opacity:1; transform:translateY(0); } }

        .hero-greeting {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(4rem, 10vw, 8rem);
            line-height: .9;
            letter-spacing: .03em;
            color: #fff;
            text-shadow: 0 4px 40px rgba(0,0,0,.6);
            margin-bottom: 40px;
        }
        .hero-greeting span { color: var(--red); }

        /* about card */
        .about-card {
            background: rgba(10,10,10,0.82);
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 18px;
            padding: 40px 48px;
            max-width: 680px;
            backdrop-filter: blur(20px);
            box-shadow: 0 32px 80px rgba(0,0,0,.6), 0 0 0 1px rgba(255,255,255,0.04) inset;
            animation: fadeUp .9s .15s cubic-bezier(.16,1,.3,1) both;
        }
        .about-card h2 {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2rem;
            letter-spacing: .06em;
            margin-bottom: 16px;
            color: #fff;
        }
        .about-card p {
            font-size: .95rem;
            font-weight: 300;
            color: rgba(240,240,240,.78);
            line-height: 1.8;
        }

        /* ── FOOTER ── */
        footer { background: #0d0d0d; border-top: 1px solid var(--border); padding: 48px 48px 28px; }
        .footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1fr; gap: 40px; margin-bottom: 36px; }
        .footer-brand .logo-text { font-family: 'Bebas Neue', sans-serif; font-size: 1.8rem; letter-spacing: .06em; margin-bottom: 10px; }
        .footer-brand .logo-text span { color: var(--red); }
        .footer-brand p { font-size: .85rem; color: var(--muted); line-height: 1.7; max-width: 240px; }
        .footer-col h4 { font-size: .78rem; font-weight: 600; letter-spacing: .08em; text-transform: uppercase; color: var(--text); margin-bottom: 14px; }
        .footer-col ul { list-style: none; display: flex; flex-direction: column; gap: 9px; }
        .footer-col ul a { font-size: .84rem; color: var(--muted); transition: color .2s; }
        .footer-col ul a:hover { color: var(--text); }
        .footer-socials { display: flex; gap: 10px; margin-top: 14px; }
        .social-icon { width: 32px; height: 32px; background: rgba(255,255,255,0.07); border: 1px solid var(--border); border-radius: 7px; display: flex; align-items: center; justify-content: center; color: var(--muted); transition: background .2s, color .2s; cursor: pointer; }
        .social-icon:hover { background: var(--red); color: #fff; border-color: var(--red); }
        .footer-bottom { border-top: 1px solid var(--border); padding-top: 22px; text-align: center; font-size: .76rem; color: var(--muted); }

        @media (max-width: 768px) {
            .navbar { padding: 0 20px; }
            .nav-links { display: none; }
            .about-card { padding: 28px 24px; }
            footer { padding: 40px 20px 24px; }
            .footer-grid { grid-template-columns: 1fr; gap: 24px; }
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
        <li><a href="#" class="active">About Us</a></li>
    </ul>
    <div class="nav-right">
        <a href="{{ route('login') }}" class="btn-signin">Sign In</a>
    </div>
</nav>

{{-- HERO --}}
<section class="hero">

    {{-- Poster wall background --}}
    <div class="bg-wall" aria-hidden="true">
        @php
        $posters = [
            'https://image.tmdb.org/t/p/w300/1E5baAaEse26fej7uHcjOgEE2t2.jpg',
            'https://image.tmdb.org/t/p/w300/qNBAXBIQlnOThrVvA6mA2B5ggV6.jpg',
            'https://image.tmdb.org/t/p/w300/8Vt6mWEReuy4Of61Lnj5Xj704m8.jpg',
            'https://image.tmdb.org/t/p/w300/wuMc08IPKEatf9rnMNXvIDxqP4W.jpg',
            'https://image.tmdb.org/t/p/w300/7WsyChQLEftFiDOVTGkv3hFpyyt.jpg',
            'https://image.tmdb.org/t/p/w300/kqjL17yufvn9OVLyXYpvtyrFfak.jpg',
            'https://image.tmdb.org/t/p/w300/5VTN0pR8gcqV3EPUHHfMGnJYxhO.jpg',
            'https://image.tmdb.org/t/p/w300/d5NXSklXo0qyIYkgV94XAgMIckC.jpg',
            'https://image.tmdb.org/t/p/w300/bOMnukAAxDNFRXkxnvPgPNQv24g.jpg',
            'https://image.tmdb.org/t/p/w300/ym1dxyOk4jFcSl4Q2zmRrA5BEEN.jpg',
            'https://image.tmdb.org/t/p/w300/A3n9LCFZRbHVhHYjhNVVDHfqJl8.jpg',
            'https://image.tmdb.org/t/p/w300/oYuLEt3zVCKq57qu2F8dT7NIa6f.jpg',
            'https://image.tmdb.org/t/p/w300/iuFNMS8vlodyTOwP0SjhQCLSxNW.jpg',
            'https://image.tmdb.org/t/p/w300/6CoRTJTmijhBLJTUNoVSUNxZMEI.jpg',
        ];
        @endphp
        @for ($c = 0; $c < 7; $c++)
            <div class="col">
                @for ($r = 0; $r < 6; $r++)
                    <div class="poster">
                        <img src="{{ $posters[($c * 6 + $r) % count($posters)] }}" alt="" loading="lazy">
                    </div>
                @endfor
            </div>
        @endfor
    </div>

    {{-- Dark overlay --}}
    <div class="bg-overlay" aria-hidden="true"></div>

    {{-- Content --}}
    <div class="hero-content">
        <div class="hero-greeting">Hey There<span>,</span></div>
        <div class="about-card">
            <h2>About WATCHME</h2>
            <p>Welcome to WATCHME, your destination for discovering and exploring the world of movies and entertainment. Our platform is designed for movie lovers who want quick access to film information, ratings, trailers, reviews, and trending releases all in one place. Whether you enjoy action blockbusters, timeless classics, anime, or independent films, we aim to make your movie experience more enjoyable and accessible.</p>
        </div>
    </div>

</section>

{{-- FOOTER --}}
<footer>
    <div class="footer-grid">
        <div class="footer-brand">
            <div class="logo-text">W<span>A</span>TCHME</div>
            <p>Your ultimate destination for the latest movies and entertainment.</p>
            <div class="footer-socials">
                <div class="social-icon"><svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg></div>
                <div class="social-icon"><svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></div>
                <div class="social-icon"><svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg></div>
                <div class="social-icon"><svg width="13" height="13" viewBox="0 0 24 24" fill="currentColor"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 0 0-1.95 1.96A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.41 19.6C5.12 20 12 20 12 20s6.88 0 8.59-.46a2.78 2.78 0 0 0 1.95-1.95A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02" fill="white"/></svg></div>
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