@extends('layouts.master')

@section('content')
    <div class="section-surface p-4 p-lg-5 mb-2">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
            <div>
                <h1 class="bauhaus-uppercase text-3xl mb-2">Dashboard</h1>
                <p class="text-secondary mb-0">Overview of your reporting activity and response progress.</p>
            </div>
            <a href="{{ route('reports.create') }}" class="bauhaus-btn bauhaus-btn--red">+ Submit New Report</a>
        </div>
    </div>

    <!-- BREADCRUMB -->
    <div class="mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <!-- WELCOME SECTION -->
    <div class="section-surface p-4 my-6 p-lg-5 mb-5 bg-gradient" style="background: linear-gradient(135deg, rgba(18, 49, 91, 0.08) 0%, rgba(255, 107, 0, 0.04) 100%);">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <h1 class="display-5 fw-bold mb-2">Welcome back, {{ auth()->user()->name }}! 👋</h1>
                <p class="lead text-secondary mb-0">Here's a summary of your reporting activity and impact</p>
            </div>
            <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                <a href="{{ route('reports.create') }}" class="bauhaus-btn bauhaus-btn--yellow">+ Submit New Report</a>
            </div>
        </div>
    </div>

    <!-- STATS CARDS -->
    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="section-surface p-4 h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-secondary small text-uppercase fw-semibold">My Reports</div>
                        <div class="display-6 fw-bold text-primary mt-2">{{ $reportStats['total'] }}</div>
                    </div>
                    <div style="font-size: 2.5rem;">📋</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="section-surface p-4 h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-secondary small text-uppercase fw-semibold">Pending</div>
                        <div class="display-6 fw-bold text-warning mt-2">{{ $reportStats['pending'] }}</div>
                    </div>
                    <div style="font-size: 2.5rem;">⏳</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="section-surface p-4 h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-secondary small text-uppercase fw-semibold">Verified</div>
                        <div class="display-6 fw-bold text-success mt-2">{{ $reportStats['verified'] }}</div>
                    </div>
                    <div style="font-size: 2.5rem;">✅</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="section-surface p-4 h-100">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <div class="text-secondary small text-uppercase fw-semibold">Resolved</div>
                        <div class="display-6 fw-bold text-info mt-2">{{ $reportStats['resolved'] }}</div>
                    </div>
                    <div style="font-size: 2.5rem;">🎯</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- MAIN CONTENT -->
        <div class="col-lg-8">
            <!-- RECENT REPORTS -->
            <div class="section-surface p-4 p-lg-5 mb-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="h4 fw-bold mb-1">Your Recent Reports</h2>
                        <p class="text-secondary small mb-0">Track the status of your submissions</p>
                    </div>
                    <a href="{{ route('reports.index') }}" class="bauhaus-btn bauhaus-btn--outline btn-sm">View All</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="fw-semibold">Case</th>
                                <th class="fw-semibold">Location</th>
                                <th class="fw-semibold">Status</th>
                                <th class="fw-semibold">Date</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reports->take(5) as $report)
                                <tr>
                                    <td class="fw-semibold">{{ $report->child_name ?: '👤 Anonymous' }}</td>
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
                                    <td class="small text-secondary">{{ $report->created_at->format('M d, Y') }}</td>
                                    <td><a href="{{ route('reports.show', $report) }}" class="bauhaus-btn bauhaus-btn--outline btn-sm">View</a></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-secondary py-5">
                                        <div class="mb-2" style="font-size: 2rem;">📭</div>
                                        <strong>No reports yet</strong><br>
                                        <small>Start protecting children by submitting your first report</small>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- STATUS OVERVIEW CHART -->
            <div class="section-surface p-4 p-lg-5">
                <h2 class="h4 fw-bold mb-4">Report Status Breakdown</h2>
                <div class="d-grid gap-3">
                    <div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="fw-semibold">Pending Review</span>
                            <span class="badge bg-warning">{{ $reportStats['pending'] }}</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-warning" style="width: {{ $reportStats['total'] ? ($reportStats['pending'] / $reportStats['total']) * 100 : 0 }}%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="fw-semibold">Verified Cases</span>
                            <span class="badge bg-success">{{ $reportStats['verified'] }}</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-success" style="width: {{ $reportStats['total'] ? ($reportStats['verified'] / $reportStats['total']) * 100 : 0 }}%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="fw-semibold">Resolved Cases</span>
                            <span class="badge bg-info">{{ $reportStats['resolved'] }}</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-info" style="width: {{ $reportStats['total'] ? ($reportStats['resolved'] / $reportStats['total']) * 100 : 0 }}%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SIDEBAR -->
        <div class="col-lg-4">
            <!-- UNREAD NOTIFICATIONS -->
            <div class="section-surface p-4 p-lg-5 mb-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="h5 fw-bold mb-0">🔔 Notifications</h2>
                    @if ($unreadNotifications->count() > 0)
                        <span class="badge bg-danger">{{ $unreadNotifications->count() }}</span>
                    @endif
                </div>
                <div class="d-grid gap-3">
                    @forelse ($unreadNotifications->take(4) as $notification)
                        <div class="bauhaus-card p-3">
                            <div class="fw-semibold small mb-1 text-primary">{{ $notification->title }}</div>
                            <div class="small text-secondary">{{ Str::limit($notification->message, 60) }}</div>
                        </div>
                    @empty
                        <div class="text-center text-secondary py-4">
                            <div style="font-size: 2rem;" class="mb-2">✨</div>
                            <small>All caught up! No new notifications</small>
                        </div>
                    @endforelse
                    @if ($unreadNotifications->count() > 0)
                        <a href="{{ route('notifications.index') }}" class="bauhaus-btn bauhaus-btn--outline btn-sm w-100">View All Notifications</a>
                    @endif
                </div>
            </div>

            <!-- QUICK LINKS -->
            <div class="section-surface p-4 p-lg-5">
                <h2 class="h5 fw-bold mb-4">Quick Links</h2>
                <div class="d-grid gap-2">
                    <a href="{{ route('reports.create') }}" class="bauhaus-btn bauhaus-btn--red d-flex align-items-center gap-2.5 mb-1">
                        <span>📝</span> Submit Report
                    </a>
                    <a href="{{ route('reports.index') }}" class="bauhaus-btn bauhaus-btn--yellow d-flex align-items-center gap-2.5 mb-1">
                        <span>📋</span> My Reports
                    </a>
                    <a href="{{ route('notifications.index') }}" class="bauhaus-btn bauhaus-btn--blue d-flex align-items-center gap-2.5 mb-1">
                        <span>🔔</span> Notifications
                    </a>
                    <a href="{{ route('about') }}" class="bauhaus-btn bauhaus-btn--outline d-flex align-items-center gap-2.5 mb-1">
                        <span>ℹ️</span> Learn More
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
