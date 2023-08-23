<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($credentials)) {
            
            $request->session()->regenerate();
            return redirect()->intended('/setting');
            // if (auth()->user()->is_active == 1) {
            //     if (auth()->user()->role_id == 1) {
            //         $request->session()->regenerate();
            //         return redirect()->intended('/admin');
            //     } elseif (auth()->user()->role_id == 2) {
            //         $request->session()->regenerate();
            //         return redirect()->intended('/user');
            //     } else {
            //         request()->session()->invalidate();
            //         request()->session()->regenerateToken();
            //         return back()->with('loginError', 'Login failed!');
            //     }
            // } else {
            //     request()->session()->invalidate();
            //     request()->session()->regenerateToken();
            //     return back()->with('loginError', 'Login failed! Not activated');
            // }
        }
        return back()->with('loginError', 'Login failed!');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
