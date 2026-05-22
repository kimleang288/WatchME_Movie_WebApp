@extends('layouts.auth')
@section('title', 'WatchME - Register')
@section('content')
@push('styles')
    @vite(['resources/css/auth/register.css', 'resources/js/auth/register.js'])
@endpush
<main>

{{-- ── Poster wall background ── --}}
<x-auth-background />
<div class="bg-vignette" aria-hidden="true"></div>

{{-- ── Page ── --}}
<div class="page">
    <div class="card">

        {{-- Logo --}}
        <img src="{{ asset('images/App Logo.png') }}" alt="Logo" class="logo">

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
                <x-password-field
                    name="password"
                    label="Password"
                    placeholder="Create a password"
                    autocomplete="new-password"
                    :hasError="$errors->has('password')"
                />
                {{-- Strength bar --}}
                <div class="strength-bar">
                    <span id="s1"></span><span id="s2"></span><span id="s3"></span><span id="s4"></span>
                </div>
                <div class="strength-label" id="strengthLabel"></div>
                @error('password') <div class="field-error">{{ $message }}</div> @enderror
            </div>

            {{-- Confirm Password --}}
            <x-password-field
                name="password_confirmation"
                label="Confirm Password"
                placeholder="Re-enter your password"
                autocomplete="new-password"
                :hasError="$errors->has('password_confirmation')"
            />
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
        {{-- Footer --}}
        <div class="card-footer">
            Don't have an account? <a href="{{ route('login') }}">Sign In</a>
        </div>

    </div>
</div>
</main>
@endsection