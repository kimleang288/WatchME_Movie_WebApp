@extends('layouts.auth')
@section('title', 'WatchME - Forgot Password')
@push('styles')
    @vite('resources/css/auth/forgot-password.css')
@endpush
@section('content')
<main>

{{-- ── Poster wall ── --}}
<x-auth-background />
<div class="bg-vignette" aria-hidden="true"></div>

{{-- ── Page ── --}}
<div class="page">
    <div class="card">

        {{-- Logo --}}
        <img src="{{ asset('images/App Logo.png') }}" alt="Logo" class="logo">


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

            <button type="submit" class="btn-submit" id="submitBtn">Send Reset Link</button>
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
</main>
@endsection