<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Fortify\HandlePasswordResetAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Laravel\Fortify\Contracts\ResetPasswordViewResponse;

class CustomNewPasswordController extends Controller
{
    /**
     * Show the reset password view.
     */
    public function create(Request $request, $token = null)
    {
        Log::info('Password Reset Page Accessed', [
            'token' => $token ? 'present' : 'missing',
            'email' => $request->get('email'),
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'timestamp' => now()->toDateTimeString(),
        ]);

        return app(ResetPasswordViewResponse::class, [
            'request' => $request,
        ]);
    }

    /**
     * Handle the password reset request with detailed logging.
     */
    public function store(Request $request, HandlePasswordResetAction $action)
    {
        return $action->handle($request);
    }
}
