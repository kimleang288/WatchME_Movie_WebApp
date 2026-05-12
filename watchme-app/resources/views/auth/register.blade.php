<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WatchMe – Create Account</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --red:      #e50914;
            --red-dim:  #b0060f;
            --black:    #0a0a0a;
            --card:     rgba(10,10,10,0.88);
            --border:   rgba(255,255,255,0.08);
            --text:     #f0f0f0;
            --muted:    #888;
            --input-bg: rgba(255,255,255,0.06);
            --input-focus: rgba(229,9,20,0.18);
            --radius:   10px;
        }

        html, body {
            height: 100%;
            font-family: 'Outfit', sans-serif;
            background: var(--black);
            color: var(--text);
            overflow-x: hidden;
        }

        /* ── Poster wall background ── */
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
            max-width: 440px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 44px 40px 36px;
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
        .logo { text-align: center; margin-bottom: 28px; }
        .logo-text {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2.6rem;
            letter-spacing: .06em;
            color: #fff;
        }
        .logo-text span { color: var(--red); }

        /* ── Headings ── */
        .card-title {
            font-size: 1.45rem;
            font-weight: 600;
            text-align: center;
            letter-spacing: -.01em;
            margin-bottom: 4px;
        }
        .card-sub {
            font-size: .88rem;
            color: var(--muted);
            text-align: center;
            margin-bottom: 30px;
            font-weight: 300;
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

        /* ── Form groups ── */
        .form-group { margin-bottom: 16px; }
        label {
            display: block;
            font-size: .78rem;
            font-weight: 500;
            letter-spacing: .04em;
            color: var(--muted);
            text-transform: uppercase;
            margin-bottom: 7px;
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

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 14px 12px 44px;
            background: var(--input-bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            color: var(--text);
            font-family: 'Outfit', sans-serif;
            font-size: .93rem;
            outline: none;
            transition: border-color .2s, background .2s, box-shadow .2s;
        }
        input::placeholder { color: rgba(255,255,255,0.2); }
        input:focus {
            border-color: var(--red);
            background: var(--input-focus);
            box-shadow: 0 0 0 3px rgba(229,9,20,0.12);
        }
        input.is-invalid { border-color: #e55; }

        /* field error text */
        .field-error {
            font-size: .78rem;
            color: #ff6b6b;
            margin-top: 5px;
            padding-left: 2px;
        }

        /* password toggle */
        .eye-toggle {
            position: absolute; right: 14px;
            background: none; border: none;
            color: var(--muted); cursor: pointer;
            display: flex; padding: 0;
            transition: color .2s;
        }
        .eye-toggle:hover { color: var(--text); }

        /* ── Password strength bar ── */
        .strength-bar {
            display: flex; gap: 4px;
            margin-top: 8px;
        }
        .strength-bar span {
            flex: 1; height: 3px;
            border-radius: 99px;
            background: rgba(255,255,255,0.1);
            transition: background .3s;
        }
        .strength-label {
            font-size: .72rem;
            color: var(--muted);
            margin-top: 5px;
            text-align: right;
            transition: color .3s;
        }

        /* ── Terms ── */
        .terms-row {
            display: flex; align-items: flex-start; gap: 10px;
            margin-bottom: 22px;
            font-size: .84rem;
            color: var(--muted);
            line-height: 1.5;
        }
        .terms-row input[type="checkbox"] {
            appearance: none; -webkit-appearance: none;
            width: 16px; height: 16px; min-width: 16px;
            border: 1.5px solid var(--border);
            border-radius: 4px;
            background: var(--input-bg);
            padding: 0; cursor: pointer;
            margin-top: 2px;
            transition: background .2s, border-color .2s;
        }
        .terms-row input[type="checkbox"]:checked {
            background: var(--red);
            border-color: var(--red);
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3E%3Cpath fill='white' d='M13.7 3.3a1 1 0 0 1 0 1.4l-7 7a1 1 0 0 1-1.4 0l-3-3a1 1 0 1 1 1.4-1.4L6 9.6l6.3-6.3a1 1 0 0 1 1.4 0z'/%3E%3C/svg%3E");
            background-size: 11px;
            background-repeat: no-repeat;
            background-position: center;
        }
        .terms-row a { color: var(--red); text-decoration: none; }
        .terms-row a:hover { text-decoration: underline; }

        /* ── Create Account button ── */
        .btn-create {
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
            transition: background .2s, transform .15s, box-shadow .2s;
            position: relative;
            overflow: hidden;
        }
        .btn-create::after {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(180deg, rgba(255,255,255,.12) 0%, transparent 60%);
            pointer-events: none;
        }
        .btn-create:hover { background: #c8000b; box-shadow: 0 6px 24px rgba(229,9,20,.4); }
        .btn-create:active { transform: scale(.98); }
        .btn-create:disabled { opacity: .6; cursor: not-allowed; }

        /* ── Divider ── */
        .divider {
            display: flex; align-items: center; gap: 14px;
            margin: 22px 0;
            color: var(--muted); font-size: .8rem;
        }
        .divider::before, .divider::after {
            content: ''; flex: 1;
            height: 1px; background: var(--border);
        }

        /* ── Social buttons ── */
        .socials { display: flex; gap: 12px; }
        .btn-social {
            flex: 1;
            display: flex; align-items: center; justify-content: center; gap: 8px;
            padding: 11px;
            background: var(--input-bg);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            color: var(--text);
            font-family: 'Outfit', sans-serif;
            font-size: .88rem;
            font-weight: 500;
            cursor: pointer;
            text-decoration: none;
            transition: background .2s, border-color .2s;
        }
        .btn-social:hover { background: rgba(255,255,255,.1); border-color: rgba(255,255,255,.2); }

        /* ── Footer ── */
        .card-footer {
            text-align: center;
            margin-top: 24px;
            font-size: .85rem;
            color: var(--muted);
        }
        .card-footer a { color: var(--red); text-decoration: none; font-weight: 500; }
        .card-footer a:hover { text-decoration: underline; }

        @media (max-width: 480px) {
            .card { padding: 36px 24px 28px; }
        }
    </style>
</head>
<body>

{{-- ── Poster wall background ── --}}
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

        <h1 class="card-title">Create Account</h1>
        <p class="card-sub">Join us for unlimited entertainment</p>

        {{-- Validation errors --}}
        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        {{-- Register form --}}
        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf

            {{-- Full Name --}}
            <div class="form-group">
                <label for="name">Full Name</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                    </span>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Enter your full name"
                        value="{{ old('name') }}"
                        autocomplete="name"
                        required
                        class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                    >
                </div>
                @error('name') <div class="field-error">{{ $message }}</div> @enderror
            </div>

            {{-- Email Adress --}}
            <div class="form-group">
                <label for="email">Email Adress</label>
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
                        class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                    >
                </div>
                @error('email') <div class="field-error">{{ $message }}</div> @enderror
            </div>

            {{-- Password --}}
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                    </span>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Create your password"
                        autocomplete="new-password"
                        required
                        class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                        id="password"
                    >
                    <button type="button" class="eye-toggle" id="eyeToggle1" aria-label="Toggle password">
                        <svg id="eye1Open" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                        <svg id="eye1Closed" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none">
                            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
                            <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
                            <line x1="1" y1="1" x2="23" y2="23"/>
                        </svg>
                    </button>
                </div>
                {{-- Strength bar --}}
                <div class="strength-bar">
                    <span id="s1"></span><span id="s2"></span><span id="s3"></span><span id="s4"></span>
                </div>
                <div class="strength-label" id="strengthLabel"></div>
                @error('password') <div class="field-error">{{ $message }}</div> @enderror
            </div>

            {{-- Confirm Password --}}
            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <div class="input-wrap">
                    <span class="input-icon">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                        </svg>
                    </span>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        placeholder="Confirm your password"
                        autocomplete="new-password"
                        required
                    >
                    <button type="button" class="eye-toggle" id="eyeToggle2" aria-label="Toggle confirm password">
                        <svg id="eye2Open" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                        <svg id="eye2Closed" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none">
                            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
                            <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
                            <line x1="1" y1="1" x2="23" y2="23"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Terms --}}
            <div class="terms-row">
                <input type="checkbox" name="terms" id="terms" required {{ old('terms') ? 'checked' : '' }}>
                <label for="terms" style="text-transform:none;letter-spacing:0;font-weight:400;color:var(--muted);margin:0;">
                    I agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                </label>
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn-create" id="submitBtn">Create Account</button>
        </form>

        {{-- Divider --}}
        <div class="divider">Or Sign up with</div>

        {{-- Socials --}}
        <div class="socials">
            <a href="#" class="btn-social">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="#1877F2">
                    <path d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.41c0-3.025 1.792-4.697 4.533-4.697 1.312 0 2.686.236 2.686.236v2.97h-1.513c-1.491 0-1.956.93-1.956 1.886v2.268h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073z"/>
                </svg>
                facebook
            </a>
            <a href="#" class="btn-social">
                <svg width="18" height="18" viewBox="0 0 24 24">
                    <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                    <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                    <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                    <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                </svg>
                Google
            </a>
        </div>

        {{-- Footer --}}
        <div class="card-footer">
            Don't have an account? <a href="{{ route('login') }}">Sign In</a>
        </div>

    </div>
</div>

<script>
    // ── Eye toggles ──
    function makeToggle(btnId, inputId, openId, closedId) {
        const btn    = document.getElementById(btnId);
        const input  = document.getElementById(inputId);
        const eOpen  = document.getElementById(openId);
        const eClosed= document.getElementById(closedId);
        btn.addEventListener('click', () => {
            const isText = input.type === 'text';
            input.type = isText ? 'password' : 'text';
            eOpen.style.display  = isText ? 'block' : 'none';
            eClosed.style.display= isText ? 'none'  : 'block';
        });
    }
    makeToggle('eyeToggle1','password',      'eye1Open','eye1Closed');
    makeToggle('eyeToggle2','password_confirmation','eye2Open','eye2Closed');

    // ── Password strength ──
    const pwdInput     = document.getElementById('password');
    const bars         = [document.getElementById('s1'),document.getElementById('s2'),document.getElementById('s3'),document.getElementById('s4')];
    const strengthLabel= document.getElementById('strengthLabel');
    const levels = [
        { color: '#e55', label: 'Weak' },
        { color: '#f90', label: 'Fair' },
        { color: '#3b82f6', label: 'Good' },
        { color: '#22c55e', label: 'Strong' },
    ];

    pwdInput.addEventListener('input', () => {
        const val = pwdInput.value;
        let score = 0;
        if (val.length >= 8)            score++;
        if (/[A-Z]/.test(val))          score++;
        if (/[0-9]/.test(val))          score++;
        if (/[^A-Za-z0-9]/.test(val))   score++;

        bars.forEach((b, i) => {
            b.style.background = i < score ? levels[score - 1].color : 'rgba(255,255,255,0.1)';
        });
        strengthLabel.textContent  = val.length ? levels[score - 1]?.label ?? '' : '';
        strengthLabel.style.color  = val.length ? levels[score - 1]?.color ?? '' : 'var(--muted)';
    });

    // ── Loading state on submit ──
    document.getElementById('registerForm').addEventListener('submit', () => {
        const btn = document.getElementById('submitBtn');
        btn.disabled    = true;
        btn.textContent = 'Creating account…';
    });
</script>
</body>
</html>