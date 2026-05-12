<?php

namespace App\Http\Controllers;

use App\Models\SystemNotification;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NotificationController extends Controller
{
    public function index(Request $request): View
    {
        $notifications = $request->user()
            ->systemNotifications()
            ->latest()
            ->paginate(10);

        return view('notifications.index', compact('notifications'));
    }

    public function markRead(Request $request, SystemNotification $notification): RedirectResponse
    {
        abort_unless($notification->user_id === $request->user()->id, 403);

        $notification->update(['is_read' => true]);

        return back()->with('status', __('childshield.notification_read'));
    }

    public function destroy(Request $request, SystemNotification $notification): RedirectResponse
    {
        abort_unless($notification->user_id === $request->user()->id, 403);

        $notification->delete();

        return back()->with('status', __('childshield.notification_deleted'));
    }
}