<nav class="navbar navbar-expand-lg navbar-light childshield-navbar fixed-top shadow-sm" role="navigation">
    <div class="container">
        <a class="navbar-brand fw-bold letter-spacing d-flex align-items-center" href="{{ route('home') }}" style="gap: 0.5rem;">
            <span class="geo-logo" aria-hidden="true">
                <span class="circle" aria-hidden="true"></span>
                <span class="square" aria-hidden="true"></span>
                <span class="triangle" aria-hidden="true"></span>
            </span>
            <span class="ms-2">{{ __('childshield.brand') }}</span>
            <span class="text-dark small ms-3">{{ __('childshield.tagline') }}</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#childShieldNav" aria-controls="childShieldNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="childShieldNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-2 gap-lg-1">
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Contact</a></li>

                @auth
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a></li>
                    @if (auth()->user()->isAdmin())
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.reports.*') ? 'active' : '' }}" href="{{ route('admin.reports.index') }}">Reports</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('reports.*') ? 'active' : '' }}" href="{{ route('reports.index') }}">Reports</a></li>
                    @endif
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('notifications.*') ? 'active' : '' }}" href="{{ route('notifications.index') }}">Notifications</a></li>
                    @if (auth()->user()->isAdmin())
                        <li class="nav-item"><a class="nav-link {{ request()->routeIs('admin.*') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">Admin</a></li>
                    @endif
                @endauth
            </ul>
            <div class="d-flex gap-2 ms-lg-3 mt-3 mt-lg-0">
                @auth
                    <form method="POST" action="{{ route('logout') }}" class="m-0">
                        @csrf
                        <button class="bauhaus-btn bauhaus-btn--red btn-sm px-3" type="submit">Logout</button>
                    </form>
                @else
                    <a class="bauhaus-btn bauhaus-btn--red btn-sm px-3" href="{{ route('login') }}">Login</a>
                    <a class="bauhaus-btn bauhaus-btn--yellow btn-sm px-3" href="{{ route('register') }}">Register</a>
                @endauth
            </div>
        </div>
    </div>
</nav>