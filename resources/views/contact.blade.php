@extends('layouts.master')

@section('content')
    <div class="row g-4">
        <div class="col-lg-7">
            <div class="section-surface p-4 p-lg-5">
                <h1 class="fw-bold mb-3">Contact ChildShield</h1>
                <form method="POST" action="{{ route('contact.send') }}" class="row g-3">
                    @csrf
                    <div class="col-md-6">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">Subject</label>
                        <input type="text" name="subject" value="{{ old('subject') }}" class="form-control @error('subject') is-invalid @enderror" required>
                        @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">Message</label>
                        <textarea name="message" rows="6" class="form-control @error('message') is-invalid @enderror" required>{{ old('message') }}</textarea>
                        @error('message')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary px-4" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="section-surface p-4 p-lg-5 h-100">
                <h2 class="h5 fw-bold">NGO details</h2>
                <p class="text-secondary mb-2">ChildShield Monitoring Office</p>
                <p class="text-secondary mb-2">Email support: support@childshield.test</p>
                <p class="text-secondary mb-0">Use this page for inquiries, partnerships, or field escalation requests.</p>
            </div>
        </div>
    </div>
@endsection