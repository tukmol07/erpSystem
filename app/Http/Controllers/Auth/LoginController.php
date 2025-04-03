<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login request
    public function login(Request $request)
    {
        // Validate login credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirect based on role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard'); // Redirect to admin dashboard
            }

            return redirect('/home'); // Redirect non-admin users
        }

        // If authentication fails, redirect back with an error message
        return back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
    }

    // Handle logout request
    public function logout(Request $request)
    {
        Auth::logout();

        // Redirect to login page
        return redirect()->route('login');
    }
}
