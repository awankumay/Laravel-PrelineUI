<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\CookieConsentService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CookieConsentController extends Controller
{
    public function __construct(
        private CookieConsentService $consentService
    ) {}

    /**
     * Store a new cookie consent record
     */
    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'consent_type' => 'required|in:accepted,rejected',
                'ip_address' => 'sometimes|ip', // Allow override from request
                'details' => 'sometimes|array',
                'details.analytics' => 'sometimes|boolean',
                'details.marketing' => 'sometimes|boolean',
                'details.personalization' => 'sometimes|boolean',
            ]);

            // Check if database storage is enabled
            if (! config('cookie-consent.enable_database_storage', false)) {
                return response()->json([
                    'success' => true,
                    'message' => 'Consent recorded in browser only',
                    'database_storage' => false,
                ]);
            }

            $consent = $this->consentService->recordConsent(
                $request,
                $validated['consent_type'],
                $validated['details'] ?? []
            );

            return response()->json([
                'success' => true,
                'message' => 'Consent recorded successfully',
                'id' => $consent->id,
                'database_storage' => true,
                'consent_type' => $consent->consent_type,
                'expires_at' => $consent->expires_at->toISOString(),
            ]);

        } catch (ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid data provided',
                'errors' => $e->errors(),
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to record consent',
                'error' => app()->environment('local') ? $e->getMessage() : 'Internal server error',
            ], 500);
        }
    }

    /**
     * Get current user's consent status
     */
    public function show(Request $request): JsonResponse
    {
        try {
            if (! config('cookie-consent.enable_database_storage', false)) {
                return response()->json([
                    'success' => true,
                    'message' => 'Database storage disabled',
                    'database_storage' => false,
                    'consent' => null,
                ]);
            }

            $consent = $this->consentService->getLatestConsent($request);

            if (! $consent) {
                return response()->json([
                    'success' => true,
                    'message' => 'No consent found',
                    'consent' => null,
                ]);
            }

            return response()->json([
                'success' => true,
                'consent' => [
                    'id' => $consent->id,
                    'consent_type' => $consent->consent_type,
                    'details' => $consent->consent_details,
                    'created_at' => $consent->created_at->toISOString(),
                    'expires_at' => $consent->expires_at->toISOString(),
                    'is_expired' => $consent->isExpired(),
                ],
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve consent',
                'error' => app()->environment('local') ? $e->getMessage() : 'Internal server error',
            ], 500);
        }
    }

    /**
     * Get consent statistics (admin only)
     */
    public function statistics(Request $request): JsonResponse
    {
        try {
            // Add authorization check here if needed
            // $this->authorize('view-consent-statistics');

            $filters = $request->validate([
                'from' => 'sometimes|date',
                'to' => 'sometimes|date|after_or_equal:from',
            ]);

            $stats = $this->consentService->getConsentStatistics($filters);

            return response()->json([
                'success' => true,
                'statistics' => $stats,
                'filters' => $filters,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve statistics',
                'error' => app()->environment('local') ? $e->getMessage() : 'Internal server error',
            ], 500);
        }
    }

    /**
     * Export user consent data (GDPR)
     */
    public function export(Request $request): JsonResponse
    {
        try {
            $userId = auth()->id();

            if (! $userId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Authentication required',
                ], 401);
            }

            $consents = $this->consentService->exportUserConsents($userId);

            return response()->json([
                'success' => true,
                'data' => $consents,
                'count' => count($consents),
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to export consent data',
                'error' => app()->environment('local') ? $e->getMessage() : 'Internal server error',
            ], 500);
        }
    }

    /**
     * Delete user consent data (GDPR right to be forgotten)
     */
    public function destroy(Request $request): JsonResponse
    {
        try {
            $userId = auth()->id();

            if (! $userId) {
                return response()->json([
                    'success' => false,
                    'message' => 'Authentication required',
                ], 401);
            }

            $deletedCount = \App\Models\CookieConsent::where('user_id', $userId)->delete();

            return response()->json([
                'success' => true,
                'message' => 'Consent data deleted successfully',
                'deleted_count' => $deletedCount,
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete consent data',
                'error' => app()->environment('local') ? $e->getMessage() : 'Internal server error',
            ], 500);
        }
    }
}
