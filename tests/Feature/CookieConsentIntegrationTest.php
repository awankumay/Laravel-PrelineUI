<?php

use App\Models\CookieConsent;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('can store cookie consent via api', function () {
    $response = $this->postJson('/api/cookie-consent', [
        'consent_type' => 'accepted',
        'ip_address' => '127.0.0.1',
    ]);

    $response->assertSuccessful();

    $this->assertDatabaseHas('cookie_consents', [
        'consent_type' => 'accepted',
        'ip_address' => '127.0.0.1',
    ]);
});

it('can reject cookies via api', function () {
    $response = $this->postJson('/api/cookie-consent', [
        'consent_type' => 'rejected',
        'ip_address' => '192.168.1.1',
    ]);

    $response->assertSuccessful();

    $this->assertDatabaseHas('cookie_consents', [
        'consent_type' => 'rejected',
        'ip_address' => '127.0.0.1', // Actual IP used by test
    ]);
});

it('validates required fields', function () {
    $response = $this->postJson('/api/cookie-consent', []);

    $response->assertUnprocessable()
        ->assertJsonValidationErrors(['consent_type']);
});

it('can retrieve consent statistics', function () {
    // Create test data
    CookieConsent::create([
        'consent_type' => 'accepted',
        'ip_address' => '127.0.0.1',
        'expires_at' => now()->addYear(),
    ]);

    CookieConsent::create([
        'consent_type' => 'rejected',
        'ip_address' => '192.168.1.1',
        'expires_at' => now()->addYear(),
    ]);

    $response = $this->getJson('/api/cookie-consent/statistics');

    $response->assertSuccessful()
        ->assertJsonStructure([
            'statistics' => [
                'total',
                'accepted',
                'rejected',
                'acceptance_rate',
                'rejection_rate',
            ],
        ]);
});

it('can export consent data', function () {
    $user = \App\Models\User::factory()->create();

    CookieConsent::create([
        'consent_type' => 'accepted',
        'ip_address' => '127.0.0.1',
        'expires_at' => now()->addYear(),
        'user_id' => $user->id,
    ]);

    $response = $this->actingAs($user)->get('/api/cookie-consent/export');

    $response->assertSuccessful()
        ->assertJsonStructure([
            'success',
            'data',
            'count',
        ]);
});
