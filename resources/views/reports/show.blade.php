@extends('layouts.master')

@section('content')
    <!-- BREADCRUMB -->
    <div class="mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('reports.index') }}" class="text-decoration-none">My Reports</a></li>
                <li class="breadcrumb-item active">Report #{{ $report->id }}</li>
            </ol>
        </nav>
    </div>

    <div class="section-surface p-4 p-lg-5 rounded-4">
        <!-- HEADER -->
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-start gap-3 mb-4">
            <div>
                <h1 class="display-5 fw-bold mb-1">Report Details</h1>
                <p class="text-secondary mb-0">Case reference #{{ $report->id }} • Submitted {{ $report->created_at->format('d M Y \a\t H:i') }}</p>
            </div>
            <div class="d-flex gap-2 flex-wrap">
                <a href="{{ route('reports.edit', $report) }}" class="btn btn-outline-primary">✏️ Edit</a>
                <form method="POST" action="{{ route('reports.destroy', $report) }}" onsubmit="return confirm('Delete this report?');" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">🗑️ Delete</button>
                </form>
                <a href="{{ route('reports.index') }}" class="btn btn-outline-secondary">← Back</a>
            </div>
        </div>

        <!-- REPORT INFO -->
        <div class="row g-4">
            <div class="col-lg-8">
                <div class="bg-white rounded-4 border p-4 h-100">
                    <h2 class="h5 fw-bold mb-4 text-primary">Case Information</h2>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="small text-secondary fw-semibold">Child Name</div>
                            <div class="fw-semibold">{{ $report->child_name ?: '👤 Anonymous' }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="small text-secondary fw-semibold">Age</div>
                            <div class="fw-semibold">{{ $report->age }} years old</div>
                        </div>
                        <div class="col-md-6">
                            <div class="small text-secondary fw-semibold">Gender</div>
                            <div class="fw-semibold">{{ ucfirst(str_replace('_', ' ', $report->gender)) }}</div>
                        </div>
                        <div class="col-md-6">
                            <div class="small text-secondary fw-semibold">Location</div>
                            <div class="fw-semibold">📍 {{ $report->location }}</div>
                        </div>
                        <div class="col-12">
                            <div class="small text-secondary fw-semibold">Description</div>
                            <p class="text-secondary mt-1 mb-0">{{ $report->description }}</p>
                        </div>
                        <div class="col-12">
                            <div class="small text-secondary fw-semibold">Reporter Contact</div>
                            <div class="fw-semibold">{{ $report->reporter_contact }}</div>
                        </div>
                        <div class="col-12">
                            <div class="small text-secondary fw-semibold">Status</div>
                            @php
                                $statusColors = [
                                    'pending' => 'warning',
                                    'under_review' => 'info',
                                    'verified' => 'success',
                                    'resolved' => 'secondary',
                                    'rejected' => 'danger'
                                ];
                                $color = $statusColors[$report->status] ?? 'secondary';
                            @endphp
                            <span class="status-pill bg-{{ $color }} text-white">{{ \App\Models\Report::statuses()[$report->status] ?? ucfirst(str_replace('_', ' ', $report->status)) }}</span>
                        </div>
                        @if ($report->admin_remark)
                            <div class="col-12 border-top pt-3">
                                <div class="small text-secondary fw-semibold">Admin Remarks</div>
                                <p class="text-secondary mt-1 mb-0">{{ $report->admin_remark }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- PROOF SECTION -->
            <div class="col-lg-4">
                <div class="bg-light rounded-4 p-4 h-100">
                    <h2 class="h5 fw-bold mb-3 text-primary">📸 Uploaded Proof</h2>
                    @if ($report->image)
                        <img src="{{ asset('storage/'.$report->image) }}" alt="Uploaded proof" class="img-fluid rounded-4 border mb-3" style="max-height: 300px; object-fit: cover; width: 100%;">
                        <p class="small text-secondary">Image file: {{ basename($report->image) }}</p>
                    @else
                        <div class="text-center py-5">
                            <div style="font-size: 2rem;" class="mb-2">📭</div>
                            <small class="text-secondary">No image provided</small>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection