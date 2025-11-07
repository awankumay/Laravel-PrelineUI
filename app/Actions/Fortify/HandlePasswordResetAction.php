<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;

class HandlePasswordResetAction
{
    /**
     * Handle the password reset request with detailed logging.
     */
    public function handle(Request $request)
    {
        $email = $request->input('email');
        $token = $request->input('token');

        Log::info('Password Reset Attempt Started', [
            'email' => $email,
            'token_present' => ! empty($token),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'timestamp' => now()->toDateTimeString(),
        ]);

        // Validate the request
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        try {
            // Check if user exists first
            $user = User::where('email', $email)->first();

            if (! $user) {
                Log::warning('Password Reset Failed - User Not Found', [
                    'email' => $email,
                    'token' => $token,
                    'ip' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'timestamp' => now()->toDateTimeString(),
                ]);

                return back()->withErrors([
                    'email' => 'We can\'t find a user with that email address.',
                ]);
            }

            // Attempt password reset
            $status = Password::reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) use ($email) {
                    $user->forceFill([
                        'password' => Hash::make($password),
                    ])->save();

                    Log::info('Password Reset Successful', [
                        'email' => $email,
                        'user_id' => $user->id,
                        'timestamp' => now()->toDateTimeString(),
                    ]);
                }
            );

            if ($status == Password::PASSWORD_RESET) {
                Log::info('Password Reset Completed Successfully', [
                    'email' => $email,
                    'user_id' => $user->id,
                    'ip' => $request->ip(),
                    'timestamp' => now()->toDateTimeString(),
                ]);

                return app(\Laravel\Fortify\Contracts\PasswordResetResponse::class, ['status' => $status]);
            }

            // Log different failure scenarios
            Log::warning('Password Reset Failed', [
                'email' => $email,
                'status' => $status,
                'status_message' => $this->getResetStatusMessage($status),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent(),
                'timestamp' => now()->toDateTimeString(),
            ]);

            return back()->withErrors([
                'email' => $this->getResetErrorMessage($status),
            ]);

        } catch (\Exception $e) {
            Log::error('Password Reset Exception', [
                'email' => $email,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'ip' => $request->ip(),
                'timestamp' => now()->toDateTimeString(),
            ]);

            return back()->withErrors([
                'email' => 'An error occurred while resetting your password. Please try again.',
            ]);
        }
    }

    /**
     * Get human readable status message for logging
     */
    private function getResetStatusMessage($status): string
    {
        return match ($status) {
            Password::PASSWORD_RESET => 'Password reset successfully',
            Password::INVALID_USER => 'User not found with this email address',
            Password::INVALID_TOKEN => 'Invalid or expired reset token',
            Password::RESET_THROTTLED => 'Too many reset attempts',
            default => 'Unknown status: '.$status,
        };
    }

    /**
     * Get user-friendly error message
     */
    private function getResetErrorMessage($status): string
    {
        return match ($status) {
            Password::INVALID_USER => 'We can\'t find a user with that email address.',
            Password::INVALID_TOKEN => 'This password reset token is invalid or has expired.',
            Password::RESET_THROTTLED => 'Please wait before retrying.',
            default => 'Unable to reset password. Please try again.',
        };
    }
}
