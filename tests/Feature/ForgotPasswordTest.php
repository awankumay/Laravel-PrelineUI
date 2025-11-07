<?php

use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;

test('can display forgot password page', function () {
    $response = $this->get('/forgot-password');

    $response->assertStatus(200);
    $response->assertSee('Forgot password');
    $response->assertSee('name="email"', false);
});

test('uses custom controller for forgot password', function () {
    // Test that our custom controller is being used
    $controller = app(\Laravel\Fortify\Http\Controllers\PasswordResetLinkController::class);

    expect(get_class($controller))->toBe('App\Http\Controllers\Auth\CustomPasswordResetLinkController');
});

test('uses custom action for password reset processing', function () {
    $user = User::factory()->create(['email' => 'test@example.com']);

    // Mock the log to verify our custom action is being used
    Log::fake();

    $response = $this->post('/forgot-password', [
        'email' => 'test@example.com'
    ]);

    $response->assertRedirect();
    $response->assertSessionHas('status');

    // Verify our custom logging is working
    Log::assertLogged('info', function ($message, $context) {
        return str_contains($message, 'Password Reset Link Sent Successfully') &&
               isset($context['email']) && $context['email'] === 'test@example.com';
    });
});

test('displays reset password form with token', function () {
    $user = User::factory()->create(['email' => 'test@example.com']);
    $token = Password::createToken($user);

    $response = $this->get("/reset-password/{$token}?email=test@example.com");

    $response->assertStatus(200);
    $response->assertSee('Reset Password');
    $response->assertSee('name="token"', false);
    $response->assertSee('value="test@example.com"', false);
});
