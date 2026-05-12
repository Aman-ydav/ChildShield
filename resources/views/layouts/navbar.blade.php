<nav class="navbar navbar-expand-lg navbar-dark childshield-navbar sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold letter-spacing" href="{{ route('home') }}">
            {{ __('childshield.brand') }}
            <span class="text-warning">{{ __('childshield.tagline') }}</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#childShieldNav" aria-controls="childShieldNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="childShieldNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-1">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>

                @auth
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('reports.*') ? 'active' : '' }}" href="{{ route('reports.index') }}">Reports</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('notifications.*') ? 'active' : '' }}" href="{{ route('notifications.index') }}">Notifications</a></li>
                    @if (auth()->user()->isAdmin())
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Admin</a></li>
                    @endif
                    <li class="nav-item ms-lg-3">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-outline-light btn-sm px-3" type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item ms-lg-3"><a class="btn btn-outline-light btn-sm px-3 me-2" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="btn btn-warning btn-sm px-3" href="{{ route('register') }}">Register</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>