@extends('layouts.master')

@section('content')
    <div class="row justify-content-center align-items-center" style="min-height: 600px;">
        <div class="col-md-6 col-lg-5 bauhaus-auth-wrapper">
            <div class="bauhaus-card p-5 p-lg-6">
                <div class="text-center mb-4">
                    <h1 class="h3 fw-bold text-primary mb-2">Verify Your Email</h1>
                    <p class="text-secondary mb-0">We sent a verification link to your email address. Please confirm before continuing.</p>
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="alert alert-success" role="alert">
                        A new verification link has been sent to the email address you provided during registration.
                    </div>
                @endif

                <div class="d-grid gap-3">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="bauhaus-btn bauhaus-btn--red w-100">Resend Verification Email</button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bauhaus-btn bauhaus-btn--outline w-100">Log Out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
