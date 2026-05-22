@extends('layouts.auth')
@section('title', 'WatchME - Login')
@push('styles')
    @vite('resources/css/auth/login.css')
@endpush
@section('content')
<main>
    {{-- ── Poster wall background ── --}}
    <x-auth-background />

    <div class="bg-vignette" aria-hidden="true"></div>

    {{-- ── Page ── --}}
    <div class="page">
        <div class="card">

            {{-- Logo --}}
            <img src="{{ asset('images/App Logo.png') }}" alt="Logo" class="logo">

            <h1 class="card-title">Welcome User</h1>
            <p class="card-sub">Sign in to continue your journey</p>

            {{-- Validation errors --}}
            @if ($errors->any())
                <div class="alert-error">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            {{-- Session error --}}
            @if (session('error'))
                <div class="alert-error">{{ session('error') }}</div>
            @endif

            {{-- Login form --}}
            <form method="POST" action="{{ route('login') }}" id="loginForm">
                @csrf

                {{-- Email --}}
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
                            class="{{ $errors->has('email') ? 'is-invalid' : '' }}"
                        >
                    </div>
                </div>

                {{-- Password --}}
                <x-password-field
                    name="password"
                    label="Password"
                    placeholder="Enter your password"
                    autocomplete="current-password"
                    :hasError="$errors->has('password')"
                />
                {{-- Remember + Forgot --}}
                <div class="extras">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-link">Forgot Password?</a>
                    @endif
                </div>

                {{-- Submit --}}
                <button type="submit" class="btn-signin" id="submitBtn">Sign In</button>
            </form>

            {{-- Footer --}}
            <div class="card-footer">
                Don't have an account?
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Sign Up</a>
                @endif
            </div>

        </div>
    </div>

    <script>
        // Loading state on submit
        const form      = document.getElementById('loginForm');
        const submitBtn = document.getElementById('submitBtn');

        form.addEventListener('submit', () => {
            submitBtn.disabled     = true;
            submitBtn.textContent  = 'Signing in…';
        });
    </script>
</main>
@endsection