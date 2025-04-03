<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Registration routes
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register'); // Show registration form
Route::post('register', [RegisterController::class, 'register']); // Handle registration

// Login routes
Route::get('/', [LoginController::class, 'showLoginForm'])->name('login'); // Show login form
Route::post('/login', [LoginController::class, 'login']); // Handle login

// Logout route
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Logout route

// Admin Dashboard - Only accessible after login
Route::middleware('auth')->get('/dashboard', function () {
    // Check if the user is an admin
    if (Auth::user()->role !== 'admin') {
        abort(403, 'Unauthorized');
    }
    return view('admin.dashboard'); // Admin dashboard view
})->name('admin.dashboard');
