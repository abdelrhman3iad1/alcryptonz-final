<?php

namespace App\Services\Auth;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserAuthService
{
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);
        if ($request->is('api/*')) {
            $user = new UserResource($user);
            $token = $user->createToken('Personal Access Token')->plainTextToken;
            return [
                'user' => $user,
                'token' => $token
            ];
        } else {
            Auth::login($user);
            return [
                'user' => new UserResource($user),
            ];
        }
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|string|email|max:255|exists:users,email',
            'password' => 'required|string|min:8'
        ]);

        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']])) {
            $user = Auth::user();

            if ($request->is('api/*')) {
                $user = new UserResource($user);
                $token = $user->createToken('Personal Access Token')->plainTextToken;
                return [
                    'user' => $user,
                    'token' => $token
                ];
            } else {
                return [
                    'user' => new UserResource($user),
                ];
            }
        }
        throw new \Exception('Invalid credentials');
    }

    public function changePassword(Request $request)
    {
        $validated = $request->validate([
            "old_password" => "required|string",
            "password" => ["required", "string", "min:8", "confirmed"]
        ]);
        $user = $request->user();
        if (Hash::check($validated['old_password'], $user->password)) {
            $user->update([
                "password" => Hash::make($validated["password"])
            ]);
        } else {
            throw new \Exception('The old password is not correct');
        }
    }

    public function logout(Request $request): void
    {
        if ($request->is('api/*')) {
            $user = $request->user();
            $user->tokens()->delete();
        } else {
            Auth::logout();
        }
    }
}