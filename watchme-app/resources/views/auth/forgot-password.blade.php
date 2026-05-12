<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WatchMe – Forgot Password</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --red:      #e50914;
            --black:    #0a0a0a;
            --card:     rgba(10,10,10,0.88);
            --border:   rgba(255,255,255,0.08);
            --text:     #f0f0f0;
            --muted:    #888;
            --input-bg: rgba(255,255,255,0.06);
            --input-focus: rgba(229,9,20,0.18);
            --radius:   10px;
            --blue:     #3b82f6;
        }

        html, body {
            height: 100%;
            font-family: 'Outfit', sans-serif;
            background: var(--black);
            color: var(--text);
            overflow: hidden;
        }

        /* ── Poster wall ── */
        .bg-wall {
            position: fixed; inset: 0;
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 4px;
            transform: rotate(-5deg) scale(1.18);
            opacity: .28;
            filter: saturate(0.6) blur(1px);
            pointer-events: none;
            z-index: 0;
        }
        .bg-wall .col { display: flex; flex-direction: column; gap: 4px; }
        .bg-wall .col:nth-child(even) { margin-top: -60px; }
        .bg-wall .poster {
            flex: 0 0 auto;
            border-radius: 6px;
            overflow: hidden;
            aspect-ratio: 2/3;
            background: #1a1a1a;
        }
        .bg-wall .poster img { width: 100%; height: 100%; object-fit: cover; display: block; }

        .bg-vignette {
            position: fixed; inset: 0;
            background:
                radial-gradient(ellipse 70% 70% at 50% 50%, transparent 20%, rgba(10,10,10,.85) 80%),
                linear-gradient(to bottom, rgba(10,10,10,.5) 0%, transparent 30%, transparent 70%, rgba(10,10,10,.6) 100%);
            z-index: 1;
            pointer-events: none;
        }

        /* ── Page ── */
        .page {
            position: relative; z-index: 2;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
        }

        /* ── Card ── */
        .card {
            width: 100%;
            max-width: 420px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 40px 36px 36px;
            backdrop-filter: blur(24px) saturate(1.4);
            box-shadow:
                0 0 0 1px rgba(255,255,255,0.04) inset,
                0 32px 80px rgba(0,0,0,0.7),
                0 0 60px rgba(229,9,20,0.06);
            animation: fadeUp .55s cubic-bezier(.16,1,.3,1) both;
        }
        @keyframes fadeUp {
            from { opacity:0; transform: translateY(28px); }
            to   { opacity:1; transform: translateY(0); }
        }

        /* ── Logo ── */
        .logo { margin-bottom: 24px; }
        .logo-text {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2.2rem;
            letter-spacing: .06em;
            color: #fff;
        }
        .logo-text span { color: var(--red); }

        /* ── Back link ── */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--muted);
            font-size: .85rem;
            text-decoration: none;
            margin-bottom: 20px;
            transition: color .2s;
        }
        .back-link:hover { color: var(--text); }
        .back-link svg { flex-shrink: 0; }

        /* ── Headings ── */
        .card-title {
            font-size: 1.55rem;
            font-weight: 600;
            letter-spacing: -.01em;
            margin-bottom: 8px;
        }
        .card-sub {
            font-size: .88rem;
            color: var(--muted);
            margin-bottom: 28px;
            font-weight: 300;
            line-height: 1.6;
        }

        /* ── Success message ── */
        .alert-success {
            background: rgba(34,197,94,.1);
            border: 1px solid rgba(34,197,94,.3);
            border-radius: var(--radius);
            color: #4ade80;
            font-size: .84rem;
            padding: 10px 14px;
            margin-bottom: 20px;
        }

        /* ── Error alert ── */
        .alert-error {
            background: rgba(229,9,20,.12);
            border: 1px solid rgba(229,9,20,.35);
            border-radius: var(--radius);
            color: #ff6b6b;
            font-size: .84rem;
            padding: 10px 14px;
            margin-bottom: 20px;
        }

        /* ── Form ── */
        .form-group { margin-bottom: 20px; }
        label {
            display: block;
            font-size: .78rem;
            font-weight: 500;
            letter-spacing: .04em;
            color: var(--muted);
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .input-wrap {
            position: relative;
            display: flex;
            align-items: center;
        }
        .input-icon {
            position: absolute; left: 14px;
            color: var(--muted);
            pointer-events: none;
            transition: color .2s;
            display: flex;
        }
        .input-wrap:focus-within .input-icon { color: var(--red); }

        input[type="email"] {
            width: 100%;
            padding: 13px 14px 13px 44px;
            background: var(--input-bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            color: var(--text);
            font-family: 'Outfit', sans-serif;
            font-size: .95rem;
            outline: none;
            transition: border-color .2s, background .2s, box-shadow .2s;
        }
        input::placeholder { color: rgba(255,255,255,0.2); }
        input:focus {
            border-color: var(--red);
            background: var(--input-focus);
            box-shadow: 0 0 0 3px rgba(229,9,20,0.12);
        }

        /* ── Submit button ── */
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: var(--red);
            color: #fff;
            font-family: 'Outfit', sans-serif;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: .04em;
            border: none;
            border-radius: var(--radius);
            cursor: pointer;
            margin-bottom: 20px;
            transition: background .2s, transform .15s, box-shadow .2s;
            position: relative;
            overflow: hidden;
        }
        .btn-submit::after {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(180deg, rgba(255,255,255,.12) 0%, transparent 60%);
            pointer-events: none;
        }
        .btn-submit:hover { background: #c8000b; box-shadow: 0 6px 24px rgba(229,9,20,.4); }
        .btn-submit:active { transform: scale(.98); }
        .btn-submit:disabled { opacity: .6; cursor: not-allowed; }

        /* ── Info note ── */
        .info-note {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            background: rgba(59,130,246,0.1);
            border: 1px solid rgba(59,130,246,0.25);
            border-radius: var(--radius);
            padding: 12px 14px;
            font-size: .83rem;
            color: #93c5fd;
            line-height: 1.5;
        }
        .info-note svg { flex-shrink: 0; margin-top: 1px; }
        .info-note strong { color: #bfdbfe; font-weight: 600; }

        @media (max-width: 480px) {
            .card { padding: 32px 22px 28px; }
        }
    </style>
</head>
<body>

{{-- ── Poster wall ── --}}
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
<div class="bg-vignette" aria-hidden="true"></div>

{{-- ── Page ── --}}
<div class="page">
    <div class="card">

        {{-- Logo --}}
        <div class="logo">
            <div class="logo-text">W<span>A</span>TCHME</div>
        </div>

        {{-- Back to login --}}
        <a href="{{ route('login') }}" class="back-link">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 18l-6-6 6-6"/>
            </svg>
            Back to Login
        </a>

        <h1 class="card-title">Forgot Password?</h1>
        <p class="card-sub">No worries! Enter your email address and we'll send you a link to reset your password.</p>

        {{-- Success message --}}
        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif

        {{-- Errors --}}
        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        {{-- Form --}}
        <form method="POST" action="{{ route('password.email') }}" id="forgotForm">
            @csrf

            <div class="form-group">
                <label for="email">Email Address</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="2" y="4" width="20" height="16" rx="2"/>
                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>
                        </svg>
                    </span>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Enter your email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
                    >
                </div>
            </div>

            <button type="submit" class="btn-submit" id="submitBtn">Sign in</button>
        </form>

        {{-- Info note --}}
        <div class="info-note">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"/>
                <line x1="12" y1="8" x2="12" y2="12"/>
                <line x1="12" y1="16" x2="12.01" y2="16"/>
            </svg>
            <span><strong>Noted:</strong> The password reset link will expire in 1 hour for security reasons.</span>
        </div>

    </div>
</div>

<script>
    document.getElementById('forgotForm').addEventListener('submit', () => {
        const btn = document.getElementById('submitBtn');
        btn.disabled    = true;
        btn.textContent = 'Sending link…';
    });
</script>
</body>
</html>