<?php

namespace Modules\Transaction\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Transaction\Entities\Transaction;
use Modules\Transaction\Repositories\TransactionRepository;

class TransactionServiceProvider extends ServiceProvider
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
        $this->loadViewsFrom(resource_path('views/modules/transaction'), 'transaction');
    }

    public function providers()
    {
        $this->app->bind('Modules\Transaction\Interfaces\TransactionRepositoryInterface', function ($app) {
            return new TransactionRepository(new Transaction());
        });
    }

    public function eventProviders()
    {
        $this->app->register("Modules\Transaction\Providers\EventProviders\TransactionEventServiceProvider");
    }

    public function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/config.php', 'transaction'
        );
    }
}
