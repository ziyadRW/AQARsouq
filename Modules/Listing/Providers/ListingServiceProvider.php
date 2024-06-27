<?php

namespace Modules\Listing\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Listing\Repositories\ListingRepository;
use Modules\Listing\Repositories\ListingRepositoryInterface;


class ListingServiceProvider extends ServiceProvider
{
    protected string $moduleName = 'Listing';
    protected string $moduleNameLower = 'listing';

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
        $this->app->bind(ListingRepositoryInterface::class, ListingRepository::class);
        $this->app->register(RouteServiceProvider::class);
    }
}
