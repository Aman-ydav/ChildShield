<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Services\CaseNotificationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function __construct(private readonly CaseNotificationService $notifier)
    {
    }

    public function index(): View
    {
        $reports = Report::latest()->take(8)->get();

        return view('admin.dashboard', [
            'stats' => [
                'total' => Report::count(),
                'pending' => Report::where('status', Report::STATUS_PENDING)->count(),
                'underReview' => Report::where('status', Report::STATUS_UNDER_REVIEW)->count(),
                'verified' => Report::where('status', Report::STATUS_VERIFIED)->count(),
                'resolved' => Report::where('status', Report::STATUS_RESOLVED)->count(),
                'rejected' => Report::where('status', Report::STATUS_REJECTED)->count(),
            ],
            'reports' => $reports,
            'monthlySeries' => $this->monthlySeries(),
        ]);
    }

    public function reports(Request $request): View
    {
        $reports = Report::with('user')
            ->search($request->string('search')->toString())
            ->when($request->filled('status'), fn ($query) => $query->where('status', $request->string('status')->toString()))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('admin.reports.index', [
            'reports' => $reports,
            'statuses' => Report::statuses(),
        ]);
    }

    public function show(Report $report): View
    {
        return view('admin.reports.show', compact('report'));
    }

    public function updateStatus(Request $request, Report $report): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'in:pending,under_review,verified,resolved,rejected'],
            'admin_remark' => ['nullable', 'string', 'max:5000'],
        ]);

        $report->update($validated);

        $this->notifier->notify(
            $report->user,
            'Report status updated',
            'Your ChildShield case status has been updated to '.Report::statuses()[$validated['status']].'.',
            'Case status updated',
            route('reports.show', $report),
            'Review case'
        );

        return back()->with('status', __('childshield.status_updated'));
    }

    public function destroy(Report $report): RedirectResponse
    {
        if ($report->image) {
            Storage::disk('public')->delete($report->image);
        }

        $report->delete();

        return back()->with('status', __('childshield.report_deleted'));
    }

    private function monthlySeries(): array
    {
        return Report::query()
            ->get()
            ->groupBy(fn (Report $report) => $report->created_at->format('M'))
            ->map->count()
            ->toArray();
    }
}