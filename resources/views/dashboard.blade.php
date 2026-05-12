@extends('layouts.master')

@section('content')
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="text-secondary small text-uppercase">Total Reports</div>
                    <div class="display-6 fw-bold text-primary">{{ $reportStats['total'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="text-secondary small text-uppercase">Pending</div>
                    <div class="display-6 fw-bold text-warning">{{ $reportStats['pending'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="text-secondary small text-uppercase">Verified</div>
                    <div class="display-6 fw-bold text-success">{{ $reportStats['verified'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card h-100">
                <div class="card-body">
                    <div class="text-secondary small text-uppercase">Resolved</div>
                    <div class="display-6 fw-bold text-info">{{ $reportStats['resolved'] }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-8">
            <div class="section-surface p-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="h5 fw-bold mb-0">Recent Reports</h2>
                    <a href="{{ route('reports.create') }}" class="btn btn-sm btn-primary">Submit Report</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Case</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reports as $report)
                                <tr>
                                    <td>{{ $report->child_name ?: 'Anonymous child' }}</td>
                                    <td>{{ $report->location }}</td>
                                    <td><span class="status-pill bg-light text-dark">{{ \App\Models\Report::statuses()[$report->status] ?? ucfirst($report->status) }}</span></td>
                                    <td><a href="{{ route('reports.show', $report) }}" class="btn btn-sm btn-outline-primary">View</a></td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center text-secondary py-4">No reports submitted yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="section-surface p-4 mb-4">
                <h2 class="h5 fw-bold mb-3">Unread Notifications</h2>
                <div class="d-grid gap-3">
                    @forelse ($unreadNotifications as $notification)
                        <div class="border rounded-4 p-3 bg-white">
                            <div class="fw-semibold">{{ $notification->title }}</div>
                            <div class="small text-secondary">{{ $notification->message }}</div>
                        </div>
                    @empty
                        <div class="text-secondary">You have no unread notifications.</div>
                    @endforelse
                </div>
            </div>
            <div class="section-surface p-4">
                <h2 class="h5 fw-bold mb-3">Status Overview</h2>
                <div class="mb-2 small text-secondary">Pending</div>
                <div class="progress mb-3"><div class="progress-bar bg-warning" style="width: {{ $reportStats['total'] ? ($reportStats['pending'] / $reportStats['total']) * 100 : 0 }}%"></div></div>
                <div class="mb-2 small text-secondary">Verified</div>
                <div class="progress mb-3"><div class="progress-bar bg-success" style="width: {{ $reportStats['total'] ? ($reportStats['verified'] / $reportStats['total']) * 100 : 0 }}%"></div></div>
                <div class="mb-2 small text-secondary">Resolved</div>
                <div class="progress"><div class="progress-bar bg-info" style="width: {{ $reportStats['total'] ? ($reportStats['resolved'] / $reportStats['total']) * 100 : 0 }}%"></div></div>
            </div>
        </div>
    </div>
@endsection<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
