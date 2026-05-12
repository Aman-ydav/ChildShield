<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Report;
use App\Services\CaseNotificationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ReportController extends Controller
{
    public function __construct(private readonly CaseNotificationService $notifier)
    {
    }

    public function index(Request $request): View
    {
        $reports = $request->user()
            ->reports()
            ->latest()
            ->paginate(10);

        return view('reports.index', compact('reports'));
    }

    public function create(): View
    {
        return view('reports.create', [
            'report' => new Report([
                'status' => Report::STATUS_PENDING,
            ]),
        ]);
    }

    public function store(StoreReportRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $data['image'] = $request->file('image')->store('reports', 'public');
        $data['status'] = Report::STATUS_PENDING;

        $report = Report::create($data);

        $this->notifier->notify(
            $request->user(),
            'Report submitted',
            'Your ChildShield report has been submitted and is now under review. We will update you as soon as it changes status.',
            'ChildShield report confirmation',
            route('reports.show', $report),
            'View report'
        );

        return redirect()->route('reports.show', $report)->with('status', __('childshield.report_created'));
    }

    public function show(Report $report): View
    {
        $this->authorizeOwner($report);

        return view('reports.show', compact('report'));
    }

    public function edit(Report $report): View
    {
        $this->authorizeOwner($report);

        return view('reports.edit', compact('report'));
    }

    public function update(UpdateReportRequest $request, Report $report): RedirectResponse
    {
        $this->authorizeOwner($report);

        $data = $request->validated();

        if ($request->hasFile('image')) {
            if ($report->image) {
                Storage::disk('public')->delete($report->image);
            }

            $data['image'] = $request->file('image')->store('reports', 'public');
        }

        $report->update($data);

        return redirect()->route('reports.show', $report)->with('status', __('childshield.report_updated'));
    }

    public function destroy(Request $request, Report $report): RedirectResponse
    {
        $this->authorizeOwner($report);

        if ($report->image) {
            Storage::disk('public')->delete($report->image);
        }

        $report->delete();

        return redirect()->route('reports.index')->with('status', __('childshield.report_deleted'));
    }

    private function authorizeOwner(Report $report): void
    {
        abort_unless($report->user_id === auth()->id() || auth()->user()?->isAdmin(), 403);
    }
}