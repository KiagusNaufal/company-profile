<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                'max:255',
                'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'
            ],
            'password' => [
                'required',
                'string',
                'min:6',
                'max:50',
                'regex:/^[\w!@#$%^&*()\-_=+{};:,<.>]{6,50}$/'
            ],
        ], [
            'email.regex' => 'Email format is invalid.',
            'password.regex' => 'Password contains invalid characters.',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            Log::info('User logged in', ['email' => $request->input('email')]);
            return redirect()->intended('dashboard')->with('success', 'Login successful');
        }

        Log::warning('Failed login attempt', ['email' => $request->input('email')]);
        return redirect('/login')->back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logout successful');
    }
}
