@extends('layouts.master')

@section('content')
    <div class="section-surface p-4 p-lg-5 mb-4">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
            <div>
                <h1 class="bauhaus-uppercase text-3xl mb-1">My Reports</h1>
                <p class="text-secondary mb-0">Track the cases you have submitted and manage updates.</p>
            </div>
            <a href="{{ route('reports.create') }}" class="bauhaus-btn bauhaus-btn--red">+ New Report</a>
        </div>
    </div>

    <!-- BREADCRUMB -->
    <div class="mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active">My Reports</li>
            </ol>
        </nav>
    </div>

    <div class="section-surface p-4 p-lg-5">
        <!-- REPORTS TABLE -->
        <div class="table-responsive">
            <table class="table report-table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="fw-semibold">Child</th>
                        <th class="fw-semibold">Age</th>
                        <th class="fw-semibold">Location</th>
                        <th class="fw-semibold">Status</th>
                        <th class="fw-semibold">Created</th>
                        <th class="fw-semibold">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reports as $report)
                        <tr>
                            <td class="fw-semibold">{{ $report->child_name ?: '👤 Anonymous' }}</td>
                            <td><span class="badge bg-light text-dark">{{ $report->age }} yrs</span></td>
                            <td>📍 {{ $report->location }}</td>
                            <td>
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
                            </td>
                            <td class="small text-secondary">{{ $report->created_at->format('d M Y') }}</td>
                            <td class="text-end">
                                <a href="{{ route('reports.show', $report) }}" class="bauhaus-btn bauhaus-btn--outline btn-sm">View</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-secondary py-5">
                                <div style="font-size: 2rem;" class="mb-2">📭</div>
                                <strong>No reports yet</strong><br>
                                <small>Create your first report to start protecting children</small>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- PAGINATION -->
        <div class="mt-4">
            {{ $reports->links() }}
        </div>
    </div>
@endsection