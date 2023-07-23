<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $title  = 'Profile';
        $user   = Auth::user();

        return view('dashboard.profile',compact('title', 'user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'username'  => 'required',
            'email'     => 'required|email',
            'password'  => 'required|min:8'
        ]);

        $user->username = $request->username;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        notify()->success('User Berhasil Diubah', 'Success!');
        return redirect()->route('user');
    }
}
