<?php

namespace Modules\Listing\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(ListingServiceProvider::class);
    }

    public function boot()
    {
        //
    }
}
