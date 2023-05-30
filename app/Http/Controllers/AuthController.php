<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $user = [
            'email' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($user)) {
            $request->session()->regenerate();
            return redirect()->intended('admin');
        }

        return back()->with([
            'message-type' => 'warning',
            'message' => 'The provided credentials do not match our records.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
