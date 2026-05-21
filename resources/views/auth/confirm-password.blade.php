@extends('layouts.master')

@section('content')
    <div class="row justify-content-center align-items-center" style="min-height: 600px;">
        <div class="col-md-6 col-lg-5 bauhaus-auth-wrapper">
            <div class="bauhaus-card p-5 p-lg-6">
                <div class="text-center mb-4">
                    <h1 class="h3 fw-bold text-primary mb-2">Confirm Password</h1>
                    <p class="text-secondary mb-0">This is a secure area. Please confirm your password before continuing.</p>
                </div>

                <form method="POST" action="{{ route('password.confirm') }}" class="needs-validation">
                    @csrf

                    <div class="mb-4">
                        <label for="password" class="form-label fw-semibold">Password</label>
                        <input type="password" id="password" name="password" required autocomplete="current-password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password">
                        @error('password')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="bauhaus-btn bauhaus-btn--red w-100">Confirm</button>
                </form>
            </div>
        </div>
    </div>
@endsection
