<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Models\User;

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
        Gate::define('viewPulse', function (User $user) {
            $userRoles = $user->hasRole(['Developer', 'Super Admin'], 'web');

            if (!$userRoles) {
                return abort(403, 'User doesn\'t have right permission.');
            }

            return true;
        });

    }
}
