<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\UserAuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuthController extends Controller
{
    protected $authService;

    public function __construct(UserAuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        try {
            $this->authService->register($request);
            // return redirect()->route('dashboard');
            $user = Auth::user();
            if ($user['role'] == 1) {
                return redirect()->route("categories.index");
            } else {
                return redirect()->route('home');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function login(Request $request)
    {
        try {
            $this->authService->login($request);
            $user = Auth::user();
            if ($user['role'] == 1) {
                return redirect()->route("categories.index");
            } else {
                return redirect()->route('home');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function changePassword(Request $request)
    {
        try {
            $this->authService->changePassword($request);
            $user = Auth::user();
            if ($user['role'] == 1) {
                return redirect()->route("categories.index");
            } else {
                return redirect()->route('home');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function logout(Request $request)
    {
        try {
            $this->authService->logout($request);
            return redirect()->route('login')->with('message', 'Logged out successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}