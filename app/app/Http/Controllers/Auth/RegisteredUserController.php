<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        Gate::authorize('is-admin'); // Only admins can view the registration form
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        Gate::authorize('is-admin'); // Only admins can submit registration

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string'], // Make sure role is validated too
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);


        event(new Registered($user));

        switch ($user->role) {
            case 'Admin':
                return redirect()->route('admin.dashboard');
            case 'HR':
                return redirect()->route('hr.dashboard')->with('success', 'HR user registered.');
            case 'Accounting':
                return redirect()->route('accounting.dashboard')->with('success', 'Accounting user registered.');
            case 'Inventory':
                return redirect()->route('inventory.dashboard')->with('success', 'Inventory user registered.');
            default:
                return redirect()->route('admin.dashboard')->with('success', 'User registered.');
        }
    }
}
