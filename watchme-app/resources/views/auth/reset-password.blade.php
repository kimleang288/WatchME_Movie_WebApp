@extends('layouts.auth')
@section('title', 'WatchME - Reset Password')
@section('content')
@push('styles')
    @vite(['resources/css/auth/reset-password.css', 'resources/js/auth/reset-password.js'])
@endpush
{{-- ── Poster wall ── --}}
<x-auth-background />
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
        <form method="POST" action="{{ route('password.store') }}" id="resetForm">
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
</main>
@endsection