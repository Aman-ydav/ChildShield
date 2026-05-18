@extends('layouts.master')

@section('content')
    <div class="section-surface p-4 p-lg-5 mb-4">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
            <div>
                <h1 class="bauhaus-uppercase text-3xl mb-1">Submit a Report</h1>
                <p class="text-secondary mb-0">Provide evidence and details so the case can be reviewed quickly and accurately.</p>
            </div>
            <a href="{{ route('reports.index') }}" class="bauhaus-btn bauhaus-btn--outline">Back</a>
        </div>
    </div>

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

    <div class="section-surface p-4 p-lg-5">
        <form method="POST" action="{{ route('reports.store') }}" enctype="multipart/form-data">
            @csrf
            @include('reports._form', ['report' => $report, 'isCreate' => true])
            <div class="mt-5 d-flex gap-2">
                <button class="bauhaus-btn bauhaus-btn--red" type="submit">📤 Submit Report</button>
                <a href="{{ route('reports.index') }}" class="bauhaus-btn bauhaus-btn--outline">Cancel</a>
            </div>
        </form>
    </div>
@endsection