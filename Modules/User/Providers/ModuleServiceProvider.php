<?php

namespace Modules\User\Providers;

use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(UserServiceProvider::class);
    }

    public function boot()
    {
        //
    }
}
