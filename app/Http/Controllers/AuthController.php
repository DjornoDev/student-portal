<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $roles = array_map('strtolower', explode(',', Auth::user()->role));

            if (array_intersect($roles, ['super_admin', 'admin'])) {
                return redirect('/admins');
            }

            if (in_array('student', $roles)) {
                return redirect('/student');
            }

            Auth::logout();
            return redirect('/login')->withErrors('Role not defined.');
        }

        return redirect('/login')->withErrors('Invalid credentials.');
    }



    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
