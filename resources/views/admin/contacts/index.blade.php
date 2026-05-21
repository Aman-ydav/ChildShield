
@extends('layouts.master')

@section('content')
    <div class="section-surface p-4 p-lg-5 mb-4">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
            <div>
                <h1 class="bauhaus-uppercase text-3xl mb-1">Contact Submissions</h1>
                <p class="text-secondary mb-0">All messages sent through the public contact form.</p>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="bauhaus-btn bauhaus-btn--outline">Back to Dashboard</a>
        </div>
    </div>

    <div class="section-surface p-4 p-lg-5">
        <form class="row g-3 mb-4" method="GET" action="{{ route('admin.contacts.index') }}">
            <div class="col-md-9">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control" placeholder="Search by name, email or subject">
            </div>
            <div class="col-md-3 d-grid">
                <button class="bauhaus-btn bauhaus-btn--red" type="submit">Filter</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>From</th>
                        <th>Subject</th>
                        <th>Date</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contacts as $c)
                        <tr>
                            <td>{{ $c->name ?? '—' }}<div class="small text-secondary">{{ $c->email }}</div></td>
                            <td>{{ $c->subject }}</td>
                            <td>{{ $c->created_at->toDayDateTimeString() }}</td>
                            <td class="text-end"><a href="{{ route('admin.contacts.show', $c) }}" class="bauhaus-btn bauhaus-btn--outline btn-sm">Open</a></td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="text-center text-secondary py-5">No contact submissions found.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">{{ $contacts->links() }}</div>
    </div>
@endsection
