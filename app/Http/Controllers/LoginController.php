<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index () {
        return view('backend.login');
    }

    public function authenticate (Request $request) {
        $credentials = $request->validate([
            'username'  => 'required|max:255',
            'password'  => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout () {
        Auth::logout();
        
        request()->session()->invalidate();
        
        request()->session()->regenerateToken();
    
        return redirect('/');
    }

    public function registration () {
        return view('backend.register');
    }
}
