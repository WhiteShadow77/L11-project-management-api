<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginAuthRequest;
use App\Http\Requests\Auth\RegisterAuthRequest;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;

    // Dependency Injection: Laravel automatically instantiates the Service
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Register
     * @unauthenticated
     */
    public function register(RegisterAuthRequest $request)
    {
        $token = $this->authService->register($request->all());

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    /**
     * Login
     * @unauthenticated
     */
    public function login(LoginAuthRequest $request)
    {
        $token = $this->authService->login($request->only('email', 'password'));

        if (!$token) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    /**
     * Logout
     */
    public function logout()
    {
        $this->authService->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}