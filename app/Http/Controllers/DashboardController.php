<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(Request $request): View|\Illuminate\Http\RedirectResponse
    {
        $user = $request->user();

        if ($user?->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }

        $reports = $user->reports()->latest()->take(5)->get();
        $unreadNotifications = $user->systemNotifications()->where('is_read', false)->latest()->take(5)->get();

        return view('dashboard', [
            'reports' => $reports,
            'unreadNotifications' => $unreadNotifications,
            'reportStats' => [
                'total' => $user->reports()->count(),
                'pending' => $user->reports()->where('status', Report::STATUS_PENDING)->count(),
                'verified' => $user->reports()->where('status', Report::STATUS_VERIFIED)->count(),
                'resolved' => $user->reports()->where('status', Report::STATUS_RESOLVED)->count(),
            ],
        ]);
    }
}