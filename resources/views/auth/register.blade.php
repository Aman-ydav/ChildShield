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
                    <h1 class="h3 fw-bold text-primary mb-2">Join ChildShield</h1>
                    <p class="text-secondary">Create your account to start reporting child labour cases</p>
                </div>

                <!-- REGISTRATION FORM -->
                <form method="POST" action="{{ route('register') }}" class="needs-validation">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-semibold">Full Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Your name">
                        @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email Address -->
                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="you@example.com">
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password" placeholder="At least 8 characters">
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
                        @error('password_confirmation')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Privacy Agreement -->
                    <div class="form-check mb-4">
                        <input class="form-check-input @error('agree') is-invalid @enderror" type="checkbox" id="agree" name="agree" required>
                        <label class="form-check-label small" for="agree">
                            I agree to the Terms of Service and Privacy Policy
                        </label>
                        @error('agree')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-warning btn-lg w-100 fw-semibold mb-3">Create Account</button>

                    <!-- DIVIDER -->
                    <div class="position-relative mb-3">
                        <div class="border-bottom"></div>
                    </div>
                </form>

                <!-- FOOTER -->
                <div class="text-center">
                    <p class="text-secondary small mb-0">
                        Already have an account?
                        <a href="{{ route('login') }}" class="fw-semibold text-primary text-decoration-none">Sign in here</a>
                    </p>
                </div>
            </div>

            <!-- INFO BOX -->
            <div class="mt-4 p-3 bg-light rounded-3 text-center">
                <small class="text-secondary">
                    <strong>What happens next?</strong><br>
                    After registration, you can immediately start reporting child labour cases or track your existing reports.
                </small>
            </div>
        </div>
    </div>
@endsection

