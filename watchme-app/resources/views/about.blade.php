@extends('layout.main')
@section('title', 'WatchME - About Us')
@section('content')
@push('styles')
    @vite('resources/css/about.css')
@endpush
<main>
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
</main>
@endsection