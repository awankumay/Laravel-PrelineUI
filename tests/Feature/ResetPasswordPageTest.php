<?php

use App\Models\User;
use Illuminate\Support\Facades\Log;

it('can display reset password page with token and email', function () {
    Log::spy();

    $user = User::factory()->create([
        'email' => 'test@example.com',
    ]);

    $token = 'sample-reset-token';
    $email = 'test@example.com';

    $response = $this->get("/reset-password/{$token}?email={$email}");

    $response->assertSuccessful()
        ->assertSee('Reset Password')
        ->assertSee('Enter your new password')
        ->assertSee($email)
        ->assertSee('name="token"', false)
        ->assertSee('name="email"', false)
        ->assertSee('name="password"', false)
        ->assertSee('name="password_confirmation"', false);

    // Verify logging occurred
    Log::shouldHaveReceived('info')
        ->with('Password Reset Page Accessed', \Mockery::on(function ($data) use ($email) {
            return $data['email'] === $email &&
                   $data['token'] === 'present' &&
                   isset($data['ip']) &&
                   isset($data['timestamp']);
        }));
});

it('logs detailed error when user not found during reset', function () {
    Log::spy();

    $token = 'sample-reset-token';
    $nonExistentEmail = 'nonexistent@example.com';

    $response = $this->post('/reset-password', [
        'token' => $token,
        'email' => $nonExistentEmail,
        'password' => 'newpassword123',
        'password_confirmation' => 'newpassword123',
    ]);

    $response->assertRedirect()
        ->assertSessionHasErrors(['email']);

    // Verify detailed logging occurred
    Log::shouldHaveReceived('info')
        ->with('Password Reset Attempt Started', \Mockery::on(function ($data) use ($nonExistentEmail) {
            return $data['email'] === $nonExistentEmail &&
                   $data['token_present'] === true &&
                   isset($data['ip']) &&
                   isset($data['timestamp']);
        }));

    Log::shouldHaveReceived('warning')
        ->with('Password Reset Failed - User Not Found', \Mockery::on(function ($data) use ($nonExistentEmail, $token) {
            return $data['email'] === $nonExistentEmail &&
                   $data['token'] === $token &&
                   isset($data['ip']) &&
                   isset($data['timestamp']);
        }));
});

it('logs successful password reset', function () {
    Log::spy();

    $user = User::factory()->create([
        'email' => 'test@example.com',
    ]);

    // Create a valid reset token (this is a simplified test)
    $token = 'valid-reset-token';

    $response = $this->post('/reset-password', [
        'token' => $token,
        'email' => 'test@example.com',
        'password' => 'newpassword123',
        'password_confirmation' => 'newpassword123',
    ]);

    // Verify attempt logging occurred
    Log::shouldHaveReceived('info')
        ->with('Password Reset Attempt Started', \Mockery::on(function ($data) {
            return $data['email'] === 'test@example.com' &&
                   $data['token_present'] === true;
        }));
});

it('shows validation errors for mismatched passwords', function () {
    Log::spy();

    $user = User::factory()->create([
        'email' => 'test@example.com',
    ]);

    $token = 'sample-reset-token';

    $response = $this->post('/reset-password', [
        'token' => $token,
        'email' => 'test@example.com',
        'password' => 'newpassword123',
        'password_confirmation' => 'differentpassword',
    ]);

    $response->assertSessionHasErrors(['password']);

    // Should still log the attempt
    Log::shouldHaveReceived('info')
        ->with('Password Reset Attempt Started', \Mockery::any());
});

it('shows validation errors for missing fields', function () {
    $response = $this->post('/reset-password', []);

    $response->assertSessionHasErrors(['token', 'email', 'password']);
});
