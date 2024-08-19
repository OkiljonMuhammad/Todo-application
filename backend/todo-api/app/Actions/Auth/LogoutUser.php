<?php

namespace App\Actions\Auth;

class LogoutUser
{
    public function execute($user)
    {
        $this->revokeTokens($user);
        return $this->successResponse();
    }

    protected function revokeTokens($user)
    {
        $user->tokens()->delete();
    }

    protected function successResponse()
    {
        return response()->json(['message' => 'Logged out successfully']);
    }
}
