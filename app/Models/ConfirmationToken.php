<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConfirmationToken extends Model
{
    public $timestamps = false;

    protected $dates = [
        'expires_at',
    ];

    protected $fillable = [
        'token',
        'expires_at',
    ];

    protected static function boot()
    {
        // Destroy any existing confirmation token before creating new one
        static::creating(function ($token) {
            $token->user->confirmationToken()->delete();
        });
    }

    public function getRouteKeyName()
    {
        return 'token';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Check if a token is expired or not
     *
     * @return bool
     */
    public function hasExpired()
    {
        return $this->freshTimestamp()
            ->greaterThan($this->expires_at);
    }
}
