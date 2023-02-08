<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Hash;

class LoginController extends Controller
{
    public function index () {
        return view('backend.login');
    }

    public function authenticate (Request $request) {
        $credentials = $request->validate([
            'email'     => '',
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
        return view('backend.registration');
    }

    public function storeRegistration (Request $request) {
        $validatedData = $request->validate([
            'email'     => 'required|email',
            'username'  => 'required|max:255',
            'password'  => 'required|min:8|confirmed'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/login');
    }
}
