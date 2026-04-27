<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;

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
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6'
        ]);

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
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

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