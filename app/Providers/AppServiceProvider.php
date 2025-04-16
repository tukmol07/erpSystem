<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
        Gate::define('isAdmin', function ($user) {
            return $user->role == 'admin';
        });
        Gate::define('isHR', function ($user) {
            return $user->role == 'HR';
        });
        Gate::define('isProduction', function ($user) {
            return $user->role == 'production';
        });
        Gate::define('isPlanning', function ($user) {
            return $user->role == 'planning';
        });
        Gate::define('isInventory_Management', function ($user) {
            return $user->role == 'inventory_Management';
        });
        Gate::define('isReporting', function ($user) {
            return $user->role == 'reporting';
        });
        Gate::define('isCRM', function ($user) {
            return $user->role == 'CRM';
        });
        Gate::define('isSales_and_Marketing', function ($user) {
            return $user->role == 'Sales_and_Marketing';
        });
        Gate::define('isFinance_and_Marketing', function ($user) {
            return $user->role == 'Finance_and_Marketing';
        });
        Gate::define('isUser', function ($user) {
            return $user->role == 'user';
        });
    }
}
