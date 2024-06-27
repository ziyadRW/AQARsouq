<?php

namespace Modules\User\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        // List your events and listeners here
    ];

    public function boot(): void
    {
        parent::boot();
    }
}
