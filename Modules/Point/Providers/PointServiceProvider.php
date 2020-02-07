<?php

namespace Modules\Point\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Point\Entities\Point;
use Modules\Point\Repositories\PointRepository;

class PointServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes();
        $this->registerViews();
    }

    public function register()
    {
        $this->providers();
        $this->eventProviders();
    }

    public function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
    }

    public function registerViews()
    {
        $this->loadViewsFrom(resource_path('views/modules/point'), 'point');
    }

    public function providers()
    {
        $this->app->bind('Modules\Point\Interfaces\PointRepositoryInterface', function ($app) {
            return new PointRepository(new Point());
        });
    }

    public function eventProviders()
    {
        $this->app->register("Modules\Point\Providers\EventProviders\PointEventServiceProvider");
    }

    public function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/config.php', 'point'
        );
    }
}
