<?php

namespace Modules\Item\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Item\Entities\Item;
use Modules\Item\Repositories\ItemRepository;

class ItemServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(resource_path('views/modules/item'), 'item');
        $this->loadViewsFrom(resource_path('views/modules/deal'), 'deal');
        $this->loadViewsFrom(resource_path('views/modules/redeem'), 'redeem');
    }

    public function providers()
    {
        $this->app->bind('Modules\Item\Interfaces\ItemRepositoryInterface', function ($app) {
            return new ItemRepository(new Item());
        });
    }

    public function eventProviders()
    {
        $this->app->register("Modules\Item\Providers\EventProviders\ItemEventServiceProvider");
    }

    public function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/config.php', 'item'
        );
    }
}
