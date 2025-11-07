<?php

namespace App\Actions\Fortify;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SendPasswordResetLinkAction
{
    /**
     * Handle password reset link request with security logging.
     */
    public function handle(Request $request)
    {
        // Validate input
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Check rate limiting
        $throttleKey = Str::lower($request->input('email')).'|'.$request->ip();

        if (RateLimiter::tooManyAttempts($throttleKey, 3)) {
            $seconds = RateLimiter::availableIn($throttleKey);

            throw ValidationException::withMessages([
                'email' => trans('auth.throttle', [
                    'seconds' => $seconds,
                    'minutes' => ceil($seconds / 60),
                ]),
            ]);
        }

        RateLimiter::hit($throttleKey, 60);

        try {
            $status = Password::sendResetLink($request->only('email'));

            // Log different scenarios for internal monitoring
            // But NEVER expose these to the user for security reasons
            if ($status !== Password::RESET_LINK_SENT) {
                Log::warning('Password Reset Link Request Failed', [
                    'email' => $request->input('email'),
                    'status' => $status,
                    'status_message' => $this->getStatusMessage($status),
                    'ip' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                    'timestamp' => now()->toDateTimeString(),
                ]);
            } else {
                Log::info('Password Reset Link Sent Successfully', [
                    'email' => $request->input('email'),
                    'ip' => $request->ip(),
                    'timestamp' => now()->toDateTimeString(),
                ]);
            }
        } catch (\Exception $e) {
            // Catch SMTP/Mail sending errors
            Log::error('SMTP Error During Password Reset', [
                'email' => $request->input('email'),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'ip' => $request->ip(),
                'timestamp' => now()->toDateTimeString(),
            ]);
        }

        // SECURITY: Always return the same success message
        // This prevents email enumeration attacks
        return back()->with('status', __('We have emailed your password reset link!'));
    }

    /**
     * Get human readable status message for logging
     */
    private function getStatusMessage($status): string
    {
        return match ($status) {
            Password::RESET_LINK_SENT => 'Reset link sent successfully',
            Password::INVALID_USER => 'User not found with this email address',
            Password::INVALID_TOKEN => 'Invalid or expired reset token',
            Password::RESET_THROTTLED => 'Too many reset attempts',
            default => 'Unknown status: '.$status,
        };
    }
}
