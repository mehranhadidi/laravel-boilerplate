<?php

namespace App\Models\Traits;

use App\Models\ConfirmationToken;

trait HasConfirmationTokens
{
    /**
     * Generate a confirmation token for user
     *
     * @return string
     */
    public function generateConfirmationToken()
    {
        $this->confirmationToken()->create([
            'token' => ($token = str_random(200)),
            'expires_at' => $this->getConfirmationTokenExpiry()
        ]);

        return $token;
    }

    /**
     * Get existing confirmation token
     *
     * @return mixed
     */
    public function confirmationToken()
    {
        return $this->hasOne(ConfirmationToken::class);
    }

    /**
     * Get confirmation token expire time
     *
     * @return mixed
     */
    private function getConfirmationTokenExpiry()
    {
        return $this->freshTimestamp()->addMinutes(10);
    }
}