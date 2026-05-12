@extends('layouts.master')

@section('content')
    <div class="section-surface p-4 p-lg-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="fw-bold mb-1">Edit Report</h1>
                <p class="text-secondary mb-0">Update the report before the case is finalized.</p>
            </div>
            <a href="{{ route('reports.show', $report) }}" class="btn btn-outline-secondary">Back</a>
        </div>

        <form method="POST" action="{{ route('reports.update', $report) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('reports._form', ['report' => $report, 'isCreate' => false])
            <div class="mt-4 d-flex gap-2">
                <button class="btn btn-primary px-4" type="submit">Save Changes</button>
            </div>
        </form>
    </div>
@endsection