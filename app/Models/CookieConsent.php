<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CookieConsent extends Model
{
    protected $fillable = [
        'ip_address',
        'user_agent',
        'hostname',
        'consent_type',
        'consent_details',
        'expires_at',
    ];

    protected $casts = [
        'consent_details' => 'array',
        'expires_at' => 'datetime',
    ];

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
     * Get consent by hostname
     */
    public function scopeByHostname($query, string $hostname)
    {
        return $query->where('hostname', $hostname);
    }

    /**
     * Get consent by IP and hostname combination
     */
    public function scopeByIpAndHostname($query, string $ip, ?string $hostname = null)
    {
        $query = $query->where('ip_address', $ip);

        if ($hostname) {
            $query->where('hostname', $hostname);
        }

        return $query;
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
