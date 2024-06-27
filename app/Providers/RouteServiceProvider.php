<?php
namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));
            
            $this->mapModuleRoutes();
        });
    }

    protected function mapModuleRoutes()
    {
        $modules = config('modules.paths.modules');

        foreach (glob($modules . '/*/routes/web.php') as $module) {
            Route::middleware('web')
                ->group($module);
        }
    }
}