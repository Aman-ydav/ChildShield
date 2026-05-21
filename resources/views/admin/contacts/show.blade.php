
@extends('layouts.master')

@section('content')
    <div class="section-surface p-4 p-lg-5 mb-4">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
            <div>
                <h1 class="bauhaus-uppercase text-3xl mb-1">Contact Message</h1>
                <p class="text-secondary mb-0">Message details from the contact form.</p>
            </div>
            <a href="{{ route('admin.contacts.index') }}" class="bauhaus-btn bauhaus-btn--outline">Back to list</a>
        </div>
    </div>

    <div class="section-surface p-4 p-lg-5">
        <div class="bauhaus-card p-4">
            <div class="mb-3 d-flex justify-content-between align-items-start">
                <div>
                    <h2 class="h5 fw-bold">{{ $contact->subject }}</h2>
                    <div class="small text-secondary">From: {{ $contact->name ?? '—' }} &lt;{{ $contact->email }}&gt;</div>
                    <div class="small text-secondary">Submitted: {{ $contact->created_at->toDayDateTimeString() }}</div>
                </div>
                <div class="text-end small text-secondary">IP: {{ $contact->ip_address ?? '—' }}</div>
            </div>

            <div class="border rounded-3 p-3 bg-white text-dark" style="white-space:pre-wrap;">{{ $contact->message }}</div>
        </div>
    </div>
@endsection
