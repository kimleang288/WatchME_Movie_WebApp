import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/about.css',
                'resources/css/home.css',
                'resources/js/home.js',
                'resources/css/movie-detail.css',
                'resources/js/movie-detail.js',
                'resources/css/search-results.css',
                'resources/js/tv-detail.js',
                'resources/css/auth/register.css',
                'resources/js/auth/register.js',
                'resources/css/auth/forgot-password.css',
                'resources/css/auth/login.css',
                'resources/css/auth/reset-password.css',
                'resources/js/auth/reset-password.js',
            ],
            refresh: true,
        }),
    ],
});
