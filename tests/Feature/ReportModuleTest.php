<?php

use App\Models\Report;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

test('authenticated users can submit childshield reports', function () {
    Storage::fake('public');
    Mail::fake();

    $user = User::factory()->create();
    $file = UploadedFile::fake()->createWithContent(
        'proof.png',
        base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+jmN0AAAAASUVORK5CYII=')
    );

    $response = $this->actingAs($user)->post(route('reports.store'), [
        'child_name' => 'John Doe',
        'age' => 12,
        'gender' => 'male',
        'location' => 'Central Market',
        'description' => 'Observed a child working in hazardous conditions at the market stall.',
        'reporter_contact' => '0700000000',
        'image' => $file,
    ]);

    $response->assertRedirect();

    $report = Report::first();

    expect($report)->not->toBeNull();
    expect($report->status)->toBe(Report::STATUS_PENDING);
    Storage::disk('public')->assertExists($report->image);
});

test('admin users can access the admin dashboard', function () {
    $admin = User::factory()->create(['role' => 'admin']);

    $this->actingAs($admin)
        ->get(route('admin.dashboard'))
        ->assertOk();
});

test('non admin users are blocked from the admin dashboard', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('admin.dashboard'))
        ->assertForbidden();
});