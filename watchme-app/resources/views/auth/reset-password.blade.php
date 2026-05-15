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
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite('resources/css/auth/reset-password.css')
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