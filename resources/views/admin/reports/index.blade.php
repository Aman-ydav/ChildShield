@extends('layouts.master')

@section('content')
    <div class="section-surface p-4 p-lg-5">
        <div class="d-flex flex-column flex-lg-row justify-content-between gap-3 align-items-lg-center mb-4">
            <div>
                <h1 class="fw-bold mb-1">All Reports</h1>
                <p class="text-secondary mb-0">Search, filter, verify, resolve, or reject reports.</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Back to Dashboard</a>
        </div>

        <form class="row g-3 mb-4" method="GET" action="{{ route('admin.reports.index') }}">
            <div class="col-md-7">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by child name, location, or contact">
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select">
                    <option value="">All statuses</option>
                    @foreach ($statuses as $value => $label)
                        <option value="{{ $value }}" @selected(request('status') === $value)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 d-grid">
                <button class="btn btn-primary" type="submit">Filter</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table report-table align-middle">
                <thead>
                    <tr>
                        <th>Case</th>
                        <th>Reporter</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reports as $report)
                        <tr>
                            <td>#{{ $report->id }} {{ $report->child_name ?: 'Anonymous' }}</td>
                            <td>{{ $report->user?->name ?? 'Unknown' }}</td>
                            <td>{{ $report->location }}</td>
                            <td><span class="badge text-bg-light border">{{ $statuses[$report->status] ?? ucfirst($report->status) }}</span></td>
                            <td class="text-end d-flex justify-content-end gap-2">
                                <a href="{{ route('admin.reports.show', $report) }}" class="btn btn-sm btn-outline-primary">Open</a>
                                <form method="POST" action="{{ route('admin.reports.destroy', $report) }}" onsubmit="return confirm('Delete this report?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="text-center text-secondary py-5">No reports match the current filters.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">{{ $reports->links() }}</div>
    </div>
@endsection