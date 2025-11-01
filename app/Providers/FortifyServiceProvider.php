<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::redirectUserForTwoFactorAuthenticationUsing(RedirectIfTwoFactorAuthenticatable::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        // Secure password reset handling
        $this->configurePasswordReset();

        // register
        Fortify::registerView(function () {
            return view('auth.register');
        });

        // login
        Fortify::loginView(function () {
            return view('auth.login');
        });

        // forgot
        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.forgot-password');
        });

        // reset
        Fortify::resetPasswordView(function ($request) {
            return view('auth.reset-password', ['request' => $request]);
        });
    }

    /**
     * Configure secure password reset handling.
     */
    protected function configurePasswordReset(): void
    {
        // Add rate limiting for password reset requests
        RateLimiter::for('password-reset', function (Request $request) {
            $throttleKey = Str::lower($request->input('email')).'|'.$request->ip();

            return Limit::perMinute(3)->by($throttleKey);
        });

        // Custom exception handler for password reset
        $this->app->singleton(\Laravel\Fortify\Http\Controllers\PasswordResetLinkController::class, function ($app) {
            return new class($app)
            {
                protected $app;

                public function __construct($app)
                {
                    $this->app = $app;
                }

                /**
                 * Show the reset password link request view.
                 */
                public function create(Request $request)
                {
                    return app(\Laravel\Fortify\Contracts\RequestPasswordResetLinkViewResponse::class);
                }

                /**
                 * Handle incoming password reset link request with security.
                 */
                public function store(Request $request)
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
                            \Log::warning('User Not Found : ', [
                                'email' => $request->input('email'),
                                'status' => $status,
                                'ip' => $request->ip(),
                            ]);
                        }
                    } catch (\Exception $e) {
                        // Catch SMTP/Mail sending errors
                        \Log::error('SMTP Error :', [
                            'email' => $request->input('email'),
                            'error' => $e->getMessage(),
                            'ip' => $request->ip(),
                        ]);
                    }

                    // SECURITY: Always return the same success message
                    // This prevents email enumeration attacks
                    return back()->with('status', __('We have emailed your password reset link!'));
                }
            };
        });
    }
}
