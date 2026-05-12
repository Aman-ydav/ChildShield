<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Report;
use App\Services\CaseNotificationService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function __construct(private readonly CaseNotificationService $notifier)
    {
    }

    public function index(Request $request): JsonResponse
    {
        $reports = $request->user()->reports()->latest()->get();

        return response()->json(['data' => $reports]);
    }

    public function store(StoreReportRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;
        $data['image'] = $request->file('image')->store('reports', 'public');
        $data['status'] = Report::STATUS_PENDING;

        $report = Report::create($data);

        $this->notifier->notify(
            $request->user(),
            'Report submitted',
            'Your ChildShield report has been submitted and is now under review.'
        );

        return response()->json(['message' => 'Report created successfully.', 'data' => $report], 201);
    }

    public function updateStatus(Request $request, Report $report): JsonResponse
    {
        abort_unless($report->user_id === $request->user()->id || $request->user()?->isAdmin(), 403);

        $validated = $request->validate([
            'status' => ['required', 'in:pending,under_review,verified,resolved,rejected'],
            'admin_remark' => ['nullable', 'string', 'max:5000'],
        ]);

        $report->update($validated);

        return response()->json(['message' => 'Status updated successfully.', 'data' => $report]);
    }

    public function destroy(Request $request, Report $report): JsonResponse
    {
        abort_unless($report->user_id === $request->user()->id || $request->user()?->isAdmin(), 403);

        if ($report->image) {
            Storage::disk('public')->delete($report->image);
        }

        $report->delete();

        return response()->json(['message' => 'Report deleted successfully.']);
    }
}