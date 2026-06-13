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

## 📷 Our app UI
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

## 📷 Our app UI

| | | |
|---|---|---|
| <img width="400" alt="Main Screen" src="https://github.com/user-attachments/assets/e87cd347-2dab-4915-9f6b-027163e68a29" /> | <img width="400" alt="Main Screen (1)" src="https://github.com/user-attachments/assets/d945fe09-9af1-4f15-bd69-28d4083ef623" /> | <img width="400" alt="Detail Screen" src="https://github.com/user-attachments/assets/479573ff-99a4-4a4a-b8c1-49b6977ba37a" /> |
| <img width="400" alt="About Us" src="https://github.com/user-attachments/assets/460b5c4c-470d-4575-984e-cdbf8fee09e2" /> | <img width="400" alt="Sign In" src="https://github.com/user-attachments/assets/bb8e4656-ad6d-4084-9195-59d84d2bb2b0" /> | <img width="400" alt="Register" src="https://github.com/user-attachments/assets/0665240e-1d9a-4e2e-91df-5fe4262db8a7" /> |
| <img width="400" alt="Forget Password" src="https://github.com/user-attachments/assets/068a8fcf-b06e-4c43-ac47-42fdd76607e1" /> | <img width="400" alt="Reset Password" src="https://github.com/user-attachments/assets/4f056ef1-4dfd-4075-99cb-86c387def315" /> | |

---
## 📄 License

This project is open-source and built only for educational purpose.

## 📝 Note

Due to security reason, no API Key is provided. 
