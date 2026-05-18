@extends('layouts.master')

@section('content')
    <div class="section-surface p-4 p-lg-5">
        <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-4">
            <div>
                <h1 class="bauhaus-uppercase text-3xl mb-1">Notifications</h1>
                <p class="text-secondary mb-0">Messages, status updates, and follow-ups from the ChildShield team.</p>
            </div>
        </div>
        <div class="d-grid gap-3">
            @forelse ($notifications as $notification)
                <div class="bauhaus-card d-flex flex-column flex-lg-row justify-content-between gap-3">
                    <div>
                        <div class="fw-semibold">{{ $notification->title }}</div>
                        <div class="text-secondary">{{ $notification->message }}</div>
                        <div class="small text-muted mt-2">{{ $notification->created_at->diffForHumans() }}</div>
                    </div>
                    <div class="d-flex gap-2 align-items-start">
                        @unless ($notification->is_read)
                            <form method="POST" action="{{ route('notifications.read', $notification) }}">
                                @csrf
                                <button class="bauhaus-btn bauhaus-btn--yellow btn-sm" type="submit">Mark Read</button>
                            </form>
                        @endunless
                        <form method="POST" action="{{ route('notifications.destroy', $notification) }}" onsubmit="return confirm('Remove this notification?');">
                            @csrf
                            @method('DELETE')
                                <button class="bauhaus-btn bauhaus-btn--outline btn-sm" type="submit">Delete</button>
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