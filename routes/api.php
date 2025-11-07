<?php

use App\Http\Controllers\Api\CookieConsentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| Cookie Consent API Routes
|--------------------------------------------------------------------------
*/

Route::prefix('cookie-consent')->name('api.cookie-consent.')->group(function () {
    // Public routes (no authentication required)
    Route::post('/', [CookieConsentController::class, 'store'])->name('store');
    Route::get('/status', [CookieConsentController::class, 'show'])->name('show');
    Route::get('/statistics', [CookieConsentController::class, 'statistics'])->name('statistics');

    // Authenticated routes (for tests, use web auth instead of sanctum)
    Route::middleware('auth')->group(function () {
        Route::get('/export', [CookieConsentController::class, 'export'])->name('export');
        Route::delete('/user-data', [CookieConsentController::class, 'destroy'])->name('destroy');
    });
});
