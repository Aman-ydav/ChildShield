@extends('layouts.master')

@section('content')
    <div class="section-surface p-4 p-lg-5 mb-4">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
            <div>
                <h1 class="bauhaus-uppercase text-3xl mb-1">Edit Report</h1>
                <p class="text-secondary mb-0">Update the report before the case is finalized.</p>
            </div>
            <a href="{{ route('reports.show', $report) }}" class="bauhaus-btn bauhaus-btn--outline">Back</a>
        </div>
    </div>

    <div class="section-surface p-4 p-lg-5">
        <form method="POST" action="{{ route('reports.update', $report) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @include('reports._form', ['report' => $report, 'isCreate' => false])
            <div class="mt-4 d-flex gap-2">
                <button class="bauhaus-btn bauhaus-btn--red" type="submit">Save Changes</button>
            </div>
        </form>
    </div>
@endsection