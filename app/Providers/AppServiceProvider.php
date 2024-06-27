<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Listing\Providers\ListingServiceProvider;
use Modules\User\Providers\UserServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(ListingServiceProvider::class);
        $this->app->register(UserServiceProvider::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
