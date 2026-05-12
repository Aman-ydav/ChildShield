@extends('layouts.master')

@section('content')
    <div class="row justify-content-center align-items-center" style="min-height: 600px;">
        <div class="col-md-6 col-lg-5">
            <!-- BACK LINK -->
            <div class="mb-4">
                <a href="{{ route('home') }}" class="btn btn-outline-primary btn-sm">
                    ← Back to Home
                </a>
            </div>

            <div class="section-surface p-5 p-lg-6 rounded-4">
                <!-- HEADER -->
                <div class="text-center mb-4">
                    <h1 class="h3 fw-bold text-primary mb-2">Welcome Back</h1>
                    <p class="text-secondary">Sign in to access your ChildShield dashboard</p>
                </div>

                <!-- SESSION STATUS -->
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <!-- LOGIN FORM -->
                <form method="POST" action="{{ route('login') }}" class="needs-validation">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="you@example.com">
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password" placeholder="Enter your password">
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                        <label class="form-check-label" for="remember">
                            Remember me for 30 days
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary btn-lg w-100 fw-semibold mb-3">Sign In</button>

                    <!-- DIVIDER -->
                    <div class="position-relative mb-3">
                        <div class="border-bottom"></div>
                    </div>

                    <!-- FORGOT PASSWORD / SIGNUP LINKS -->
                    <div class="d-grid gap-2">
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="btn btn-outline-secondary btn-sm">
                                Forgot your password?
                            </a>
                        @endif
                    </div>
                </form>

                <!-- FOOTER -->
                <div class="text-center mt-4 pt-3 border-top">
                    <p class="text-secondary small mb-0">
                        Don't have an account?
                        <a href="{{ route('register') }}" class="fw-semibold text-warning text-decoration-none">Sign up here</a>
                    </p>
                </div>
            </div>

            <!-- INFO BOX -->
            <div class="mt-4 p-3 bg-light rounded-3 text-center">
                <small class="text-secondary">
                    <strong>Demo Account:</strong><br>
                    Email: admin@childshield.test<br>
                    Password: 12345678
                </small>
            </div>
        </div>
    </div>
@endsection

