@extends('layouts.master')

@section('content')
    <div class="section-surface p-4 p-lg-5 mb-4">
        <div class="d-flex flex-column flex-lg-row justify-content-between gap-3 align-items-lg-center mb-4">
            <div>
                <h1 class="bauhaus-uppercase text-3xl mb-1">Admin Dashboard</h1>
                <p class="text-secondary mb-0">Monitor and manage all ChildShield cases from one control panel.</p>
            </div>
            <a href="{{ route('admin.reports.index') }}" class="bauhaus-btn bauhaus-btn--red">Manage Reports</a>
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
                    <h2 class="h5 fw-bold mb-3">Monthly Reports</h2>
                    <canvas id="monthlyReportsChart" height="120"></canvas>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="bauhaus-card p-4 h-100">
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
            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.3/dist/chart.umd.min.js"></script>
        <script>
            const monthlyData = @json($monthlySeries);
            const labels = Object.keys(monthlyData);
            const values = Object.values(monthlyData);
            const canvas = document.getElementById('monthlyReportsChart');

            if (canvas) {
                new Chart(canvas, {
                    type: 'bar',
                    data: {
                        labels,
                        datasets: [{
                            label: 'Reports',
                            data: values,
                            backgroundColor: '#ff6b00',
                            borderRadius: 10,
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: { legend: { display: false } },
                        scales: {
                            y: { beginAtZero: true, ticks: { precision: 0 } }
                        }
                    }
                });
            }
        </script>
    @endpush
@endsection