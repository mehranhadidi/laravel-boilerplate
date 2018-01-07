<?php

namespace App\Http\Controllers\Auth;

use App\Models\ConfirmationToken;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivationController extends Controller
{
    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('confirmation_token.expired:/');
    }

    public function activate(ConfirmationToken $token, Request $request)
    {
        // Update user active state
        $token->user()->update([
            'activated' => true,
        ]);

        // Delete the existing token
        $token->delete();

        // Login user
        auth()->loginUsingId($token->user->id);

        return redirect()
            ->intended($this->redirectPath())
            ->withSuccess('Your account activated successfully');
    }

    protected function redirectPath()
    {
        return $this->redirectTo;
    }
}
