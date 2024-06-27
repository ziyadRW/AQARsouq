<?php

namespace Modules\User\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\User\Repositories\UserRepositoryInterface;
use Modules\User\Repositories\UserRepository;

class UserServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'User';
    protected string $moduleNameLower = 'user';

    /**
     * Boot the application events.
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
        $this->loadViewsFrom(__DIR__ . '/../Resources/views', $this->moduleNameLower);
    }

    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->register(RouteServiceProvider::class);
    }
}
