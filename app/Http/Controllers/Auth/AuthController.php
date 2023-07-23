<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        if($user = Auth::user()) {
            return redirect()->intended('/dashboard');
        }

        $title  = 'Login';
        return view('auth.login', compact('title'));
    }

    public function login(Request $request)
    {
        $validation = $request->validate([
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if(Auth::attempt($validation)) {
            $request->session()->regenerate();

            emotify('success', 'Welcome back '. Auth::user()->username);

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Failed');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
