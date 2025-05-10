<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->with('success', 'Login successful');
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Logout successful');
    }
}
