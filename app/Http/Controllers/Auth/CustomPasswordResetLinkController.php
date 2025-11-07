<?php

namespace App\Http\Controllers\Auth;

use App\Actions\Fortify\SendPasswordResetLinkAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Fortify\Contracts\RequestPasswordResetLinkViewResponse;

class CustomPasswordResetLinkController extends Controller
{
    /**
     * Show the reset password link request view.
     */
    public function create(Request $request)
    {
        return app(RequestPasswordResetLinkViewResponse::class);
    }

    /**
     * Handle incoming password reset link request with security.
     */
    public function store(Request $request, SendPasswordResetLinkAction $action)
    {
        return $action->handle($request);
    }
}
