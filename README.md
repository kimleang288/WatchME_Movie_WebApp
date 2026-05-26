# 🎬 WatchME

A modern movie streaming web app built with Laravel, powered by the TMDB API. Browse trending movies, explore detailed info, and enjoy a clean, responsive interface.

---

## ✨ Features

- 🔍 Browse trending, popular, and top-rated movies
- 🎥 Detailed movie pages with overviews, ratings, and metadata
- 🔗 Integrated with the [TMDB API](https://www.themoviedb.org/documentation/api)
- 🔐 User authentication (register, login, logout) via Laravel Breeze
- 🧩 Reusable Blade components for a consistent UI
- ⚡ Fast asset bundling with Vite
- 📱 Responsive design for desktop and mobile

---

## 🛠️ Tech Stack
 
| Layer      | Technology              |
|------------|-------------------------|
| Backend    | Laravel (PHP)           |
| Auth       | Laravel Breeze          |
| Templating | Blade Components        |
| Frontend   | Vite + CSS/JS           |
| Data       | TMDB API                |
---

## 🚀 Getting Started

### Prerequisites

- PHP >= 8.1
- Composer
- Node.js >= 18 & npm
- A [TMDB API key](https://www.themoviedb.org/settings/api)

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/watchme.git
   cd watchme
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Set up environment variables**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Add your TMDB API key to `.env`**
   ```env
   TMDB_API_KEY=your_api_key_here
   TMDB_BASE_URL=https://api.themoviedb.org/3
   ```

   > ⚠️ **Security Notice:** For security reasons, no API key is included in this repository. You must register your own API key from [TMDB](https://www.themoviedb.org/settings/api) or any other supported movie data source. Never commit your API key to version control — keep it in `.env` which is listed in `.gitignore`.

6. **Run database migrations** *(if applicable)*
   ```bash
   php artisan migrate
   ```

7. **Build frontend assets**
   ```bash
   npm run dev
   ```

8. **Start the development server**
   ```bash
   php artisan serve
   ```

Visit `http://localhost:8000` in your browser.

---

## 📁 Project Structure

```
app/
├── Http/
│   └── Controllers/       # Movie controllers
resources/
├── views/
│   ├── components/        # Reusable Blade components
│   └── pages/             # Page templates
routes/
└── web.php                # Web routes
```

---

## 🔑 Environment Variables

| Variable         | Description                  |
|------------------|------------------------------|
| `TMDB_API_KEY`   | Your TMDB API key            |
| `TMDB_BASE_URL`  | TMDB base URL                |
| `APP_URL`        | Your local or production URL |

---

## 📄 License

This project is open-source and built only for educational purpose.

## 📝 Note

Due to security reason, no API Key is provided. 
