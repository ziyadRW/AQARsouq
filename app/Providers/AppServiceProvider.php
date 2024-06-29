<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Listing\Providers\ListingServiceProvider;
use Modules\User\Providers\UserServiceProvider;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(ListingServiceProvider::class);
        $this->app->register(UserServiceProvider::class);
    }

    public function boot()
    {
        Inertia::share([
            'auth' => function () {
                $user = Auth::user();
                if ($user) {
                    logger()->info('Authenticated User:', ['user' => $user]);
                    return [
                        'user' => [
                            'id' => $user->id,
                            'name' => $user->name,
                            'email' => $user->email,
                        ]
                    ];
                }
                return null;
            },
        ]);
    }
    
}
