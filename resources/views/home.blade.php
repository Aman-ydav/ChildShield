@extends('layouts.master')

@section('content')
    <section class="hero-panel p-4 p-lg-5 mb-4 mb-lg-5">
        <div class="row align-items-center g-4">
            <div class="col-lg-7">
                <span class="badge text-bg-warning text-dark mb-3">{{ __('childshield.tagline') }}</span>
                <h1 class="display-5 fw-bold mb-3">Report child labour cases with speed, privacy, and accountability.</h1>
                <p class="lead text-white-75 mb-4">ChildShield helps citizens, NGOs, and administrators report, verify, and monitor cases through a secure Laravel platform designed for real-world field operations.</p>
                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('register') }}" class="btn btn-warning btn-lg px-4">Start Reporting</a>
                    <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg px-4">Learn More</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="section-surface p-4 bg-white text-dark">
                    <h2 class="h5 fw-bold mb-3">Quick Impact</h2>
                    <div class="row g-3">
                        @foreach ($heroStats as $stat)
                            <div class="col-4">
                                <div class="bg-light rounded-4 p-3 text-center">
                                    <div class="display-6 fw-bold text-primary">{{ $stat['value'] }}</div>
                                    <div class="small text-secondary">{{ $stat['label'] }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="row g-4 mb-4 mb-lg-5">
        <div class="col-lg-4">
            <div class="section-surface h-100 p-4">
                <h2 class="h5 fw-bold">Mission</h2>
                <p class="text-secondary mb-0">Create a secure reporting channel that allows communities and NGOs to document child labour incidents, verify them quickly, and respond with evidence-backed action.</p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="section-surface h-100 p-4">
                <h2 class="h5 fw-bold">Workflow</h2>
                <p class="text-secondary mb-0">Submit a report, upload image proof, receive confirmation, and track the status as it moves through review, verification, resolution, or rejection.</p>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="section-surface h-100 p-4">
                <h2 class="h5 fw-bold">Security</h2>
                <p class="text-secondary mb-0">Laravel auth, middleware, validation, CSRF protection, storage safeguards, and role-based access keep the system aligned with deployment expectations.</p>
            </div>
        </div>
    </section>

    <section class="section-surface p-4 p-lg-5 mb-4 mb-lg-5">
        <div class="row align-items-center g-4">
            <div class="col-lg-6">
                <h2 class="fw-bold mb-3">How it works</h2>
                <div class="d-grid gap-3">
                    <div class="d-flex gap-3"><span class="status-pill bg-primary text-white">1</span><div><strong>Create an account</strong><div class="text-secondary">Citizens and field workers register securely.</div></div></div>
                    <div class="d-flex gap-3"><span class="status-pill bg-primary text-white">2</span><div><strong>Submit evidence</strong><div class="text-secondary">Provide the location, description, and image proof.</div></div></div>
                    <div class="d-flex gap-3"><span class="status-pill bg-primary text-white">3</span><div><strong>Verify and act</strong><div class="text-secondary">Admins and NGOs monitor the case and update the status.</div></div></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="bg-light rounded-4 p-4">
                    <h3 class="h5 fw-bold">Why ChildShield matters</h3>
                    <p class="text-secondary mb-0">A structured digital pipeline reduces delays, improves transparency, and provides a reliable audit trail for action against child labour cases.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="text-center py-3 py-lg-4">
        <h2 class="fw-bold mb-3">Ready to protect more children?</h2>
        <a href="{{ route('contact') }}" class="btn btn-outline-primary btn-lg px-4">Contact ChildShield</a>
    </section>
@endsection