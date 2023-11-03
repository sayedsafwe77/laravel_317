<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Admin;
use App\Models\Order;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('show-orders', function (User|Admin $user, Order $order) {
            return ($user->type == 'admin') || ($order->user_id == $user->id);
        });


        Gate::define('create-order', function (User|Admin $user) {
            return $user->type == 'admin';
        });
    }
}
