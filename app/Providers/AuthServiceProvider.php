<?php 
namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Example Gate: Only admins can manage blogs
        Gate::define('manage-blogs', function ($user) {
            return $user->role === 'admin';
        });

        // Admin & Editor can create or update blogs
        Gate::define('ecreate-blogs', function ($user) {
            return in_array($user->role, ['admin', 'Editor']);
        });
    }
}
