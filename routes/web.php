<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'sendContact'])->name('contact.send');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('reports', ReportController::class);

    Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
    Route::post('notifications/{notification}/read', [NotificationController::class, 'markRead'])->name('notifications.read');
    Route::delete('notifications/{notification}', [NotificationController::class, 'destroy'])->name('notifications.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function (): void {
        Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/reports', [AdminController::class, 'reports'])->name('admin.reports.index');
        Route::get('/reports/{report}', [AdminController::class, 'show'])->name('admin.reports.show');
        Route::patch('/reports/{report}/status', [AdminController::class, 'updateStatus'])->name('admin.reports.status');
        Route::delete('/reports/{report}', [AdminController::class, 'destroy'])->name('admin.reports.destroy');
    });

require __DIR__.'/auth.php';
