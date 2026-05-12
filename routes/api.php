<?php

use App\Http\Controllers\Api\ReportController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])->prefix('v1')->group(function (): void {
    Route::get('reports', [ReportController::class, 'index'])->name('api.reports.index');
    Route::post('reports', [ReportController::class, 'store'])->name('api.reports.store');
    Route::patch('reports/{report}/status', [ReportController::class, 'updateStatus'])->name('api.reports.status');
    Route::delete('reports/{report}', [ReportController::class, 'destroy'])->name('api.reports.destroy');
});