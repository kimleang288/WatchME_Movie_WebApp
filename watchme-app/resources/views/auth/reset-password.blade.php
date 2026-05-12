<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>WatchMe – Reset Password</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        :root {
            --red:         #e50914;
            --black:       #0a0a0a;
            --card:        rgba(10,10,10,0.88);
            --border:      rgba(255,255,255,0.08);
            --text:        #f0f0f0;
            --muted:       #888;
            --input-bg:    rgba(255,255,255,0.06);
            --input-focus: rgba(229,9,20,0.18);
            --radius:      10px;
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
        .logo { text-align: center; margin-bottom: 22px; }
        .logo-text {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 2.2rem;
            letter-spacing: .06em;
            color: #fff;
        }
        .logo-text span { color: var(--red); }

        /* ── Headings ── */
        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            letter-spacing: -.01em;
            margin-bottom: 8px;
        }
        .card-sub {
            font-size: .87rem;
            color: var(--muted);
            margin-bottom: 28px;
            font-weight: 300;
            line-height: 1.6;
        }

        /* ── Alerts ── */
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
        .form-group { margin-bottom: 18px; }
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

        input[type="password"],
        input[type="text"] {
            width: 100%;
            padding: 13px 44px 13px 44px;
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

        .eye-toggle {
            position: absolute; right: 14px;
            background: none; border: none;
            color: var(--muted); cursor: pointer;
            display: flex; padding: 0;
            transition: color .2s;
        }
        .eye-toggle:hover { color: var(--text); }

        /* ── Requirements box ── */
        .requirements {
            background: rgba(255,255,255,0.04);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 14px 16px;
            margin-bottom: 22px;
        }
        .requirements-title {
            font-size: .8rem;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 10px;
        }
        .req-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .req-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: .81rem;
            color: var(--muted);
            transition: color .25s;
        }
        .req-item.met { color: #4ade80; }
        .req-icon {
            width: 16px; height: 16px;
            border-radius: 50%;
            border: 1.5px solid currentColor;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            transition: background .25s, border-color .25s;
        }
        .req-item.met .req-icon {
            background: #22c55e;
            border-color: #22c55e;
        }
        .req-icon svg { display: none; }
        .req-item.met .req-icon svg { display: block; }

        /* ── Submit ── */
        .btn-reset {
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
            margin-bottom: 22px;
            transition: background .2s, transform .15s, box-shadow .2s;
            position: relative;
            overflow: hidden;
        }
        .btn-reset::after {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(180deg, rgba(255,255,255,.12) 0%, transparent 60%);
            pointer-events: none;
        }
        .btn-reset:hover { background: #c8000b; box-shadow: 0 6px 24px rgba(229,9,20,.4); }
        .btn-reset:active { transform: scale(.98); }
        .btn-reset:disabled { opacity: .6; cursor: not-allowed; }

        /* ── Footer ── */
        .card-footer {
            text-align: center;
            font-size: .85rem;
            color: var(--muted);
        }
        .card-footer a { color: var(--red); text-decoration: none; font-weight: 500; }
        .card-footer a:hover { text-decoration: underline; }

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

        <h1 class="card-title">Reset Your Password</h1>
        <p class="card-sub">Please enter your new password. Make sure it's strong and secure.</p>

        {{-- Errors --}}
        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        {{-- Form --}}
        <form method="POST" action="{{ route('password.update') }}" id="resetForm">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ $email ?? old('email') }}">

            {{-- New Password --}}
            <div class="form-group">
                <label for="password">New Password</label>
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
                        placeholder="Enter new password"
                        autocomplete="new-password"
                        required
                        class="{{ $errors->has('password') ? 'is-invalid' : '' }}"
                    >
                    <button type="button" class="eye-toggle" id="eyeToggle1" aria-label="Toggle password">
                        <svg id="eye1Open" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                        </svg>
                        <svg id="eye1Closed" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none">
                            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
                            <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
                            <line x1="1" y1="1" x2="23" y2="23"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Confirm Password --}}
            <div class="form-group">
                <label for="password_confirmation">Confirm New Password</label>
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
                        placeholder="Confirm new password"
                        autocomplete="new-password"
                        required
                    >
                    <button type="button" class="eye-toggle" id="eyeToggle2" aria-label="Toggle confirm password">
                        <svg id="eye2Open" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                        </svg>
                        <svg id="eye2Closed" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="display:none">
                            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94"/>
                            <path d="M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19"/>
                            <line x1="1" y1="1" x2="23" y2="23"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- Requirements box --}}
            <div class="requirements">
                <div class="requirements-title">Password must contains:</div>
                <ul class="req-list">
                    <li class="req-item" id="req-length">
                        <span class="req-icon">
                            <svg width="8" height="8" viewBox="0 0 12 12" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="2,6 5,9 10,3"/>
                            </svg>
                        </span>
                        At least 8 characters
                    </li>
                    <li class="req-item" id="req-upper">
                        <span class="req-icon">
                            <svg width="8" height="8" viewBox="0 0 12 12" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="2,6 5,9 10,3"/>
                            </svg>
                        </span>
                        One uppercase letter
                    </li>
                    <li class="req-item" id="req-lower">
                        <span class="req-icon">
                            <svg width="8" height="8" viewBox="0 0 12 12" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="2,6 5,9 10,3"/>
                            </svg>
                        </span>
                        One lowercase letter
                    </li>
                    <li class="req-item" id="req-special">
                        <span class="req-icon">
                            <svg width="8" height="8" viewBox="0 0 12 12" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <polyline points="2,6 5,9 10,3"/>
                            </svg>
                        </span>
                        One number or special character
                    </li>
                </ul>
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn-reset" id="submitBtn">Reset Password</button>
        </form>

        {{-- Footer --}}
        <div class="card-footer">
            Remember your password? <a href="{{ route('login') }}">Back to Login</a>
        </div>

    </div>
</div>

<script>
    // ── Eye toggles ──
    function makeToggle(btnId, inputId, openId, closedId) {
        const btn     = document.getElementById(btnId);
        const input   = document.getElementById(inputId);
        const eOpen   = document.getElementById(openId);
        const eClosed = document.getElementById(closedId);
        btn.addEventListener('click', () => {
            const isText = input.type === 'text';
            input.type        = isText ? 'password' : 'text';
            eOpen.style.display  = isText ? 'block' : 'none';
            eClosed.style.display= isText ? 'none'  : 'block';
        });
    }
    makeToggle('eyeToggle1', 'password',              'eye1Open', 'eye1Closed');
    makeToggle('eyeToggle2', 'password_confirmation', 'eye2Open', 'eye2Closed');

    // ── Live requirements checker ──
    const pwdInput = document.getElementById('password');
    const rules = [
        { id: 'req-length',  test: v => v.length >= 8 },
        { id: 'req-upper',   test: v => /[A-Z]/.test(v) },
        { id: 'req-lower',   test: v => /[a-z]/.test(v) },
        { id: 'req-special', test: v => /[0-9!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(v) },
    ];

    pwdInput.addEventListener('input', () => {
        const val = pwdInput.value;
        rules.forEach(({ id, test }) => {
            document.getElementById(id).classList.toggle('met', test(val));
        });
    });

    // ── Loading state ──
    document.getElementById('resetForm').addEventListener('submit', () => {
        const btn = document.getElementById('submitBtn');
        btn.disabled    = true;
        btn.textContent = 'Resetting…';
    });
</script>
</body>
</html>