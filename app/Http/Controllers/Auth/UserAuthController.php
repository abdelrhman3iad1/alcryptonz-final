<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserAuthController extends Controller
{

    public function create()
    {
        return view("auth.register");
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $user = User::create($validated);

        Auth::login($user);

        if ($user->role == 1) {
            return redirect()->route('categories.index')->with('success', __('translation.You registered successfully!'));
        } else {
            return redirect()->route('home')->with('success', __('translation.You registered successful!'));
        }
    }

    public function getLogin()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|string|min:8',
        ],[
            'email.required' => __('translation.email_req'),
            'email.email' => __('translation.email_em'),
            'email.max' =>__('translation.email_max'),
        
            'password.required' =>__('translation.pass_req'),
            'password.string' => __('translation.pass_string'),
            'password.min' => __('translation.pass_min'),
        ]);


        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            if ($user->role == 1) {
                return redirect()->route('categories.index')->with('success', __('translation.Login successful!'));
            } else {
                return redirect()->route('home')->with('success', __('translation.Login successful!'));
            }
        } else {
            return redirect()->back()->with('fails', __('translation.Invalid credentials!'));
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('home')->with('success', __('translation.Logged out successfully!'));
    }


    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }


    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return redirect()->back()->withErrors(['error' => 'The old password is incorrect.'])->withInput();
        }

        User::where('id', $user->id)->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('home')->with('success', 'Password changed successfully!');
    }
}