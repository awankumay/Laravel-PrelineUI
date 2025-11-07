<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CookieConsent extends Model
{
    protected $fillable = [
        'ip_address',
        'user_agent',
        'user_id',
        'consent_type',
        'consent_details',
        'session_id',
        'expires_at',
    ];

    protected $casts = [
        'consent_details' => 'array',
        'expires_at' => 'datetime',
    ];

    /**
     * Get the user that owns the consent
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope for active consents (not expired)
     */
    public function scopeActive($query)
    {
        return $query->where('expires_at', '>', now());
    }

    /**
     * Scope for accepted consents
     */
    public function scopeAccepted($query)
    {
        return $query->where('consent_type', 'accepted');
    }

    /**
     * Scope for rejected consents
     */
    public function scopeRejected($query)
    {
        return $query->where('consent_type', 'rejected');
    }

    /**
     * Get consent by IP address
     */
    public function scopeByIp($query, string $ip)
    {
        return $query->where('ip_address', $ip);
    }

    /**
     * Get consent by user
     */
    public function scopeByUser($query, int $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Check if consent is expired
     */
    public function isExpired(): bool
    {
        return $this->expires_at < now();
    }

    /**
     * Check if consent is accepted
     */
    public function isAccepted(): bool
    {
        return $this->consent_type === 'accepted';
    }

    /**
     * Check if consent is rejected
     */
    public function isRejected(): bool
    {
        return $this->consent_type === 'rejected';
    }
}
