<?php

namespace App\Http\Controllers\API;

use App\Exceptions\APIException;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Services\UserService;

class UserController extends Controller
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function register(UserRegisterRequest $request)
    {
        $user = $this->service->register($request->validated());
        $token = $this->service->createUserToken($user);

        return response()->json([
            'data' => $user,
            'access_token' => $token,
            'message' => 'Registration successful.'
        ], 201);
    }

    public function login(UserLoginRequest $request)
    {
        $this->service->login($request->validated());
        $token = $this->service->createUserToken(auth()->user());
        auth()->user()->withAccessToken($token);

        return response()->json([
            'data' => [
                'user' => auth()->user(),
                'access_token' => $token,
                'message' => 'Login successfully.'
            ]
        ], 200);
    }

    public function get_user()
    {
        return response()->json([
            'data' => auth()->user(),
            'message' => 'Received.'
        ], 200);
    }
}
