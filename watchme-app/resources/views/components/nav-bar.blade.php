<nav class="navbar">
    <a href="/">
        <img src="{{ asset('images/App Logo.png') }}" alt="Logo" class="nav-logo">
    </a>
    <ul class="nav-links">
        <li><a href="{{ route('home') }}" class="active">Home</a></li>
        <li><a href="{{ route('explore') }}">Explore</a></li>
        <li><a href="{{ route('about') }}">About Us</a></li>
    </ul>
    <div class="nav-right">

        <form action="{{ route('movies.search') }}" method="GET" class="nav-search">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <line x1="21" y1="21" x2="16.65" y2="16.65" />
            </svg>

            <input type="text"
                placeholder="Search Movies..."
                name="query"
                value="{{ request('query') }}">
        </form>

        @guest
        <a href="{{ route('login') }}" class="btn-signin">
            Sign In
        </a>
        @endguest

        @auth
        <div class="profile-dropdown">

            <button class="profile-btn" id="profileBtn">
                <div class="avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>

                <svg class="chevron" width="14" height="14"
                    viewBox="0 0 24 24" fill="none">
                    <path d="M6 9l6 6 6-6"
                        stroke="currentColor"
                        stroke-width="2" />
                </svg>
            </button>

            <div class="dropdown-menu" id="dropdownMenu">
                <a href="{{ route('dashboard') }}">Dashboard</a>

                <a href="{{ route('profile.edit') }}">
                    Profile
                </a>

                <form method="POST"
                    action="{{ route('logout') }}">
                    @csrf

                    <button type="submit" class="logout-btn">
                        Logout
                    </button>
                </form>
            </div>

        </div>
        @endauth

    </div>
</nav>