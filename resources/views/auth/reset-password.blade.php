@extends('layouts.master')

@section('content')
    <div class="row justify-content-center align-items-center" style="min-height: 600px;">
        <div class="col-md-6 col-lg-5 bauhaus-auth-wrapper">
            <div class="mb-4">
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">← Back to Login</a>
            </div>

            <div class="bauhaus-card p-5 p-lg-6">
                <div class="text-center mb-4">
                    <h1 class="h3 fw-bold text-primary mb-2">Reset Password</h1>
                    <p class="text-secondary mb-0">Choose a new password for your account.</p>
                </div>

                <form method="POST" action="{{ route('password.store') }}" class="needs-validation">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" class="form-control @error('email') is-invalid @enderror" placeholder="you@example.com">
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">New Password</label>
                        <input type="password" id="password" name="password" required autocomplete="new-password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter a new password">
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label fw-semibold">Confirm Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm your password">
                        @error('password_confirmation')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="bauhaus-btn bauhaus-btn--red w-100">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
@endsection
