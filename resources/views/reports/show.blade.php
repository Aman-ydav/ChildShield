@extends('layouts.master')

@section('content')
    <div class="section-surface p-4 p-lg-5">
        <div class="d-flex flex-column flex-lg-row justify-content-between gap-3 mb-4">
            <div>
                <h1 class="fw-bold mb-1">Report Details</h1>
                <p class="text-secondary mb-0">Case reference #{{ $report->id }}</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('reports.edit', $report) }}" class="btn btn-outline-primary">Edit</a>
                <form method="POST" action="{{ route('reports.destroy', $report) }}" onsubmit="return confirm('Delete this report?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                </form>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-lg-8">
                <div class="bg-white rounded-4 border p-4 h-100">
                    <div class="row g-3">
                        <div class="col-md-6"><strong>Child Name:</strong> {{ $report->child_name ?: 'Anonymous' }}</div>
                        <div class="col-md-6"><strong>Age:</strong> {{ $report->age }}</div>
                        <div class="col-md-6"><strong>Gender:</strong> {{ ucfirst(str_replace('_', ' ', $report->gender)) }}</div>
                        <div class="col-md-6"><strong>Location:</strong> {{ $report->location }}</div>
                        <div class="col-12"><strong>Description:</strong><p class="text-secondary mt-2 mb-0">{{ $report->description }}</p></div>
                        <div class="col-12"><strong>Reporter Contact:</strong> {{ $report->reporter_contact }}</div>
                        <div class="col-12"><strong>Status:</strong> <span class="badge text-bg-light border">{{ \App\Models\Report::statuses()[$report->status] ?? ucfirst($report->status) }}</span></div>
                        @if ($report->admin_remark)
                            <div class="col-12"><strong>Admin Remark:</strong><p class="text-secondary mt-2 mb-0">{{ $report->admin_remark }}</p></div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="bg-light rounded-4 p-3 h-100">
                    <strong class="d-block mb-2">Uploaded Proof</strong>
                    @if ($report->image)
                        <img src="{{ asset('storage/'.$report->image) }}" alt="Uploaded proof" class="img-fluid rounded-4 border">
                    @else
                        <div class="text-secondary">No image provided.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection