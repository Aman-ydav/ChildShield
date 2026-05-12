@extends('layouts.master')

@section('content')
    <div class="section-surface p-4 p-lg-5">
        <div class="d-flex flex-column flex-lg-row justify-content-between gap-3 mb-4">
            <div>
                <h1 class="fw-bold mb-1">Case Review</h1>
                <p class="text-secondary mb-0">Report #{{ $report->id }}</p>
            </div>
            <a href="{{ route('admin.reports.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>

        <div class="row g-4">
            <div class="col-lg-7">
                <div class="bg-white border rounded-4 p-4 h-100">
                    <div class="row g-3">
                        <div class="col-md-6"><strong>Reporter:</strong> {{ $report->user?->name }}</div>
                        <div class="col-md-6"><strong>Contact:</strong> {{ $report->reporter_contact }}</div>
                        <div class="col-md-6"><strong>Child:</strong> {{ $report->child_name ?: 'Anonymous' }}</div>
                        <div class="col-md-6"><strong>Age:</strong> {{ $report->age }}</div>
                        <div class="col-md-6"><strong>Location:</strong> {{ $report->location }}</div>
                        <div class="col-md-6"><strong>Status:</strong> {{ \App\Models\Report::statuses()[$report->status] ?? ucfirst($report->status) }}</div>
                        <div class="col-12"><strong>Description:</strong><p class="text-secondary mt-2 mb-0">{{ $report->description }}</p></div>
                        @if ($report->admin_remark)
                            <div class="col-12"><strong>Admin Remark:</strong><p class="text-secondary mt-2 mb-0">{{ $report->admin_remark }}</p></div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="bg-light rounded-4 p-4 mb-4">
                    <strong class="d-block mb-2">Uploaded Image</strong>
                    @if ($report->image)
                        <img src="{{ asset('storage/'.$report->image) }}" alt="Proof" class="img-fluid rounded-4 border">
                    @else
                        <div class="text-secondary">No image available.</div>
                    @endif
                </div>

                <div class="bg-white border rounded-4 p-4">
                    <h2 class="h6 fw-bold mb-3">Update Status</h2>
                    <form method="POST" action="{{ route('admin.reports.status', $report) }}" class="d-grid gap-3">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="form-select" required>
                            @foreach (\App\Models\Report::statuses() as $value => $label)
                                <option value="{{ $value }}" @selected($report->status === $value)>{{ $label }}</option>
                            @endforeach
                        </select>
                        <textarea name="admin_remark" rows="4" class="form-control" placeholder="Optional admin remark">{{ old('admin_remark', $report->admin_remark) }}</textarea>
                        <button type="submit" class="btn btn-primary">Save Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection