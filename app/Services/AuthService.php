<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function register(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        return $user->createToken('auth_token', ['*'], now()->addMinutes(20))->plainTextToken;
    }

    public function login(array $credentials)
    {
        if (!Auth::attempt($credentials)) {
            return null;
        }

        $user = User::where('email', $credentials['email'])->firstOrFail();
        return $user->createToken('auth_token')->plainTextToken;
    }

    public function logout()
    {
        // Get the current authenticated user's token and delete it
        Auth::user()->currentAccessToken()->delete();
    }
}