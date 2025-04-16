<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Gate::define('is-admin', function ($user) {
            return $user->role === 'Admin'; // Adjust field as per your database
        });

        Gate::define('is-hr', fn($user) => $user->role === 'HR');
        Gate::define('is-accounting', fn($user) => $user->role === 'Accounting');
        Gate::define('is-planning', callback: fn($user) => $user->role === 'Planning');
        Gate::define('is-production', callback: fn($user) => $user->role === 'Production');
        Gate::define(ability: 'is-inventory', callback: fn($user) => $user->role === 'Inventory');
        Gate::define('is-marketing', callback: fn($user) => $user->role === 'Marketing');
        Gate::define(ability: 'is-CRM', callback: fn($user) => $user->role === 'CRM');
    }
}
