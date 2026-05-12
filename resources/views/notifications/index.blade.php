@extends('layouts.master')

@section('content')
    <div class="section-surface p-4 p-lg-5">
        <h1 class="fw-bold mb-4">Notifications</h1>
        <div class="d-grid gap-3">
            @forelse ($notifications as $notification)
                <div class="border rounded-4 p-4 bg-white d-flex flex-column flex-lg-row justify-content-between gap-3">
                    <div>
                        <div class="fw-semibold">{{ $notification->title }}</div>
                        <div class="text-secondary">{{ $notification->message }}</div>
                        <div class="small text-muted mt-2">{{ $notification->created_at->diffForHumans() }}</div>
                    </div>
                    <div class="d-flex gap-2 align-items-start">
                        @unless ($notification->is_read)
                            <form method="POST" action="{{ route('notifications.read', $notification) }}">
                                @csrf
                                <button class="btn btn-sm btn-success" type="submit">Mark Read</button>
                            </form>
                        @endunless
                        <form method="POST" action="{{ route('notifications.destroy', $notification) }}" onsubmit="return confirm('Remove this notification?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="text-secondary">You have no notifications yet.</div>
            @endforelse
        </div>
        <div class="mt-3">{{ $notifications->links() }}</div>
    </div>
@endsection