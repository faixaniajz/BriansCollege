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

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->branch === 'queen') {
                return redirect()->route('queens.in'); 
            }

            if ($user->branch === 'walton') {
                return redirect()->route('walton.in');
            }
            
            if ($user->branch === 'admin') {
                return redirect()->route('results.in');
            }
            return redirect()->route('results.in');
        }

        return redirect()->route('results.login')->withErrors('Invalid credentials');
    }
    // Handle the logout request
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
