@extends('layouts.main')
@section('title', 'WatchME - About Us')
@section('content')
@push('styles')
    @vite('resources/css/about.css')
@endpush
<main>
    {{-- HERO --}}
    <section class="hero">

        {{-- Poster wall background --}}
        <x-auth-background />

        {{-- Dark overlay --}}
        <div class="bg-overlay" aria-hidden="true"></div>

        {{-- Content --}}
        <div class="hero-content">
            <div class="hero-greeting">Hey There<span>,</span></div>
            <img src="{{ asset('images/ironman.png') }}" alt="WATCHME Logo" class="hero-img">
            <div class="about-card">
                <h2>About WATCHME</h2>
                <p>Welcome to WATCHME, your destination for discovering and exploring the world of movies and entertainment. Our platform is designed for movie lovers who want quick access to film information, ratings, trailers, reviews, and trending releases all in one place. Whether you enjoy action blockbusters, timeless classics, anime, or independent films, we aim to make your movie experience more enjoyable and accessible.</p>
            </div>
        </div>

    </section>
</main>
@endsection