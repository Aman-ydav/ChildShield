@extends('layouts.master')

@section('content')
    <div class="row justify-content-center align-items-center" style="min-height: 600px;">
        <div class="col-md-6 col-lg-5 bauhaus-auth-wrapper">
            <div class="mb-4">
                <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">← Back to Login</a>
            </div>

            <div class="bauhaus-card p-5 p-lg-6">
                <div class="text-center mb-4">
                    <h1 class="h3 fw-bold text-primary mb-2">Forgot Password</h1>
                    <p class="text-secondary mb-0">Enter your email and we will send a secure reset link.</p>
                </div>

                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if ($errors->has('email') && ! old('email'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('email') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="needs-validation">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold">Email Address</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus class="form-control @error('email') is-invalid @enderror" placeholder="you@example.com">
                        @error('email')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="bauhaus-btn bauhaus-btn--red w-100 mb-3">Email Password Reset Link</button>

                    <div class="text-center">
                        <a href="{{ route('register') }}" class="fw-semibold text-decoration-none bauhaus-btn bauhaus-btn--yellow">Create an account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
