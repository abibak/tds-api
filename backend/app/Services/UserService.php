<?php

namespace App\Services;

use App\Exceptions\APIException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserService
{
    public function register($request)
    {
        $user = User::create($request);

        if (!$user) {
            throw new APIException('Error creating.', 400);
        }

        return $user;
    }

    public function login($request)
    {
        if (!Auth::attempt($request)) {
            throw new APIException('User not found.', 404);
        }

        return auth()->user();
    }

    public function createUserToken($user): string
    {
        return $user->createToken('access_token')->accessToken;
    }
}
