<?php

namespace App\Providers;

use Modules\Listing\Entities\Listing;
use Modules\Listing\Policies\ListingPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Listing::class => ListingPolicy::class,
    ];

    public function boot(): void
    {
        $this->registerPolicies();
    }
}
