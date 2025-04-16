<?php

namespace App\Http\Controllers\Auth;

use session;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */

    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Role-based redirection
            return match ($user->role) {
                'Admin' => redirect()->route('admin.dashboard'),
                'HR' => redirect()->route('hr.dashboard'),
                'Accounting' => redirect()->route('accounting.dashboard'),
                'Marketing' => redirect()->route('marketing.dashboard'),
                'Production' => redirect()->route('production.dashboard'),
                'Planning' => redirect()->route('planning.dashboard'),
                'Inventory' => redirect()->route('inventory.dashboard'),
                'Reporting' => redirect()->route('reporting.dashboard'),
                default => redirect()->route('dashboard'), // fallback
            };
        }


        throw ValidationException::withMessages([
            'email' => __('auth.failed'),
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
