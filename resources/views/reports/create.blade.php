@extends('layouts.master')

@section('content')
    <!-- BREADCRUMB -->
    <div class="mb-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('reports.index') }}" class="text-decoration-none">My Reports</a></li>
                <li class="breadcrumb-item active">Submit New Report</li>
            </ol>
        </nav>
    </div>

    <div class="section-surface p-4 p-lg-5 rounded-4">
        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <h1 class="display-5 fw-bold mb-1">Submit a Report</h1>
                <p class="text-secondary mb-0">Provide evidence and details so the case can be reviewed quickly and accurately.</p>
            </div>
            <a href="{{ route('reports.index') }}" class="btn btn-outline-secondary">← Back</a>
        </div>

        <form method="POST" action="{{ route('reports.store') }}" enctype="multipart/form-data">
            @csrf
            @include('reports._form', ['report' => $report, 'isCreate' => true])
            <div class="mt-5 d-flex gap-2">
                <button class="btn btn-primary btn-lg px-5 fw-semibold" type="submit">📤 Submit Report</button>
                <a href="{{ route('reports.index') }}" class="btn btn-outline-secondary btn-lg px-5">Cancel</a>
            </div>
        </form>
    </div>
@endsection