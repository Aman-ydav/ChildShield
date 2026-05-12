<?php

test('public childshield pages render', function () {
    $this->get('/')->assertOk();
    $this->get('/about')->assertOk();
    $this->get('/contact')->assertOk();
});

test('dashboard page renders for authenticated users', function () {
    $user = \App\Models\User::factory()->create();

    $this->actingAs($user)
        ->get('/dashboard')
        ->assertOk();
});