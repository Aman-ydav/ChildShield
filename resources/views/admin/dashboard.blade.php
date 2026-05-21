@extends('layouts.master')

@section('content')
    <div class="section-surface p-4 p-lg-5 mb-4">
        <div class="d-flex flex-column flex-lg-row justify-content-between gap-3 align-items-lg-center mb-4">
            <div>
                <h1 class="bauhaus-uppercase text-3xl mb-1">Admin Dashboard</h1>
                <p class="text-secondary mb-0">Monitor and manage all ChildShield cases from one control panel.</p>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('admin.reports.index') }}" class="bauhaus-btn bauhaus-btn--red">Manage Reports</a>
                <a href="{{ route('admin.contacts.index') }}" class="bauhaus-btn bauhaus-btn--outline">Contact Submissions</a>
            </div>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-4 col-lg-2"><div class="card stat-card"><div class="card-body"><div class="text-secondary small">Total</div><div class="h2 fw-bold">{{ $stats['total'] }}</div></div></div></div>
            <div class="col-md-4 col-lg-2"><div class="card stat-card"><div class="card-body"><div class="text-secondary small">Pending</div><div class="h2 fw-bold text-warning">{{ $stats['pending'] }}</div></div></div></div>
            <div class="col-md-4 col-lg-2"><div class="card stat-card"><div class="card-body"><div class="text-secondary small">Review</div><div class="h2 fw-bold text-info">{{ $stats['underReview'] }}</div></div></div></div>
            <div class="col-md-4 col-lg-2"><div class="card stat-card"><div class="card-body"><div class="text-secondary small">Verified</div><div class="h2 fw-bold text-success">{{ $stats['verified'] }}</div></div></div></div>
            <div class="col-md-4 col-lg-2"><div class="card stat-card"><div class="card-body"><div class="text-secondary small">Resolved</div><div class="h2 fw-bold text-primary">{{ $stats['resolved'] }}</div></div></div></div>
            <div class="col-md-4 col-lg-2"><div class="card stat-card"><div class="card-body"><div class="text-secondary small">Rejected</div><div class="h2 fw-bold text-danger">{{ $stats['rejected'] }}</div></div></div></div>
        </div>

        <div class="row g-4">
            <div class="col-lg-7">
                <div class="bauhaus-card p-4">
                    <h2 class="h5 fw-bold mb-3">Reports Overview</h2>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="border rounded-4 p-3 h-100">
                                <div class="text-secondary small">Monthly trend</div>
                                <div class="h2 fw-bold mb-1">{{ $stats['total'] }}</div>
                                <div class="small text-secondary">Total reports tracked in the system.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="border rounded-4 p-3 h-100">
                                <div class="text-secondary small mb-2">Status breakdown</div>
                                <div class="d-grid gap-2 small">
                                    <div class="d-flex justify-content-between"><span>Pending</span><strong>{{ $stats['pending'] }}</strong></div>
                                    <div class="d-flex justify-content-between"><span>Under Review</span><strong>{{ $stats['underReview'] }}</strong></div>
                                    <div class="d-flex justify-content-between"><span>Verified</span><strong>{{ $stats['verified'] }}</strong></div>
                                    <div class="d-flex justify-content-between"><span>Resolved</span><strong>{{ $stats['resolved'] }}</strong></div>
                                    <div class="d-flex justify-content-between"><span>Rejected</span><strong>{{ $stats['rejected'] }}</strong></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="bauhaus-card p-4 mb-4">
                    <h2 class="h5 fw-bold mb-3">Recent Cases</h2>
                    <div class="d-grid gap-3">
                        @foreach ($reports as $report)
                            <div class="border rounded-4 p-3">
                                <div class="d-flex justify-content-between gap-2">
                                    <strong>{{ $report->child_name ?: 'Anonymous child' }}</strong>
                                    <span class="status-pill bg-light text-dark">{{ \App\Models\Report::statuses()[$report->status] ?? ucfirst($report->status) }}</span>
                                </div>
                                <div class="small text-secondary">{{ $report->location }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="bauhaus-card p-4">
                    <h2 class="h5 fw-bold mb-3">Support Contact</h2>
                    <div class="small text-secondary mb-2">All contact-form submissions are delivered to the support mailbox.</div>
                    <div class="fw-semibold">support@childshield.test</div>
                    <div class="small text-secondary mt-2">For urgent issues, ask the sender to include a phone number and location in the message.</div>
                </div>
            </div>
        </div>
    </div>
@endsection