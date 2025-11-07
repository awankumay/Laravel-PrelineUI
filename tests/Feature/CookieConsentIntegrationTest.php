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
        'hostname' => 'localhost',
        'expires_at' => now()->addYear(),
    ]);

    CookieConsent::create([
        'consent_type' => 'rejected',
        'ip_address' => '192.168.1.1',
        'hostname' => 'example.com',
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
    CookieConsent::create([
        'consent_type' => 'accepted',
        'ip_address' => '127.0.0.1',
        'hostname' => 'localhost',
        'expires_at' => now()->addYear(),
    ]);

    $response = $this->get('/api/cookie-consent/export');

    $response->assertSuccessful()
        ->assertJsonStructure([
            'success',
            'data',
            'count',
        ]);
});

it('stores hostname when recording consent', function () {
    $response = $this->postJson('/api/cookie-consent', [
        'consent_type' => 'accepted',
    ], [
        'Host' => 'example.com'
    ]);

    $response->assertSuccessful();

    $this->assertDatabaseHas('cookie_consents', [
        'consent_type' => 'accepted',
        'hostname' => 'example.com',
    ]);
});

it('can find consent by ip and hostname', function () {
    $consent = CookieConsent::create([
        'consent_type' => 'accepted',
        'ip_address' => '192.168.1.1',
        'hostname' => 'example.com',
        'expires_at' => now()->addYear(),
    ]);

    $found = CookieConsent::byIpAndHostname('192.168.1.1', 'example.com')->first();

    expect($found->id)->toBe($consent->id);
});

it('can get hostname statistics', function () {
    CookieConsent::create([
        'consent_type' => 'accepted',
        'ip_address' => '127.0.0.1',
        'hostname' => 'localhost',
        'expires_at' => now()->addYear(),
    ]);

    CookieConsent::create([
        'consent_type' => 'rejected',
        'ip_address' => '192.168.1.1',
        'hostname' => 'localhost',
        'expires_at' => now()->addYear(),
    ]);

    CookieConsent::create([
        'consent_type' => 'accepted',
        'ip_address' => '10.0.0.1',
        'hostname' => 'example.com',
        'expires_at' => now()->addYear(),
    ]);

    $service = app(\App\Services\CookieConsentService::class);
    $stats = $service->getHostnameStatistics();

    expect($stats)->toHaveCount(2);
    expect($stats[0]['hostname'])->toBe('localhost');
    expect($stats[0]['total'])->toBe(2);
    expect($stats[0]['accepted'])->toBe(1);
    expect($stats[0]['rejected'])->toBe(1);
});
