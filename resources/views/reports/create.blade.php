@extends('layouts.master')

@section('content')
    <div class="section-surface p-4 p-lg-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fw-bold mb-1">Submit a Report</h1>
                <p class="text-secondary mb-0">Provide evidence and details so the case can be reviewed quickly.</p>
            </div>
            <a href="{{ route('reports.index') }}" class="btn btn-outline-secondary">Back</a>
        </div>

        <form method="POST" action="{{ route('reports.store') }}" enctype="multipart/form-data">
            @csrf
            @include('reports._form', ['report' => $report, 'isCreate' => true])
            <div class="mt-4">
                <button class="btn btn-primary px-4" type="submit">Submit Report</button>
            </div>
        </form>
    </div>
@endsection