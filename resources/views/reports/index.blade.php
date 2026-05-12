@extends('layouts.master')

@section('content')
    <div class="section-surface p-4 p-lg-5">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-4">
            <div>
                <h1 class="fw-bold mb-1">My Reports</h1>
                <p class="text-secondary mb-0">Track the cases you have submitted and manage updates.</p>
            </div>
            <a href="{{ route('reports.create') }}" class="btn btn-primary px-4">New Report</a>
        </div>

        <div class="table-responsive">
            <table class="table report-table table-hover align-middle">
                <thead>
                    <tr>
                        <th>Child</th>
                        <th>Age</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reports as $report)
                        <tr>
                            <td>{{ $report->child_name ?: 'Anonymous child' }}</td>
                            <td>{{ $report->age }}</td>
                            <td>{{ $report->location }}</td>
                            <td><span class="badge text-bg-light border">{{ \App\Models\Report::statuses()[$report->status] ?? ucfirst($report->status) }}</span></td>
                            <td>{{ $report->created_at->format('d M Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('reports.show', $report) }}" class="btn btn-sm btn-outline-primary">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-secondary py-5">No reports found. Create your first report to get started.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">{{ $reports->links() }}</div>
    </div>
@endsection