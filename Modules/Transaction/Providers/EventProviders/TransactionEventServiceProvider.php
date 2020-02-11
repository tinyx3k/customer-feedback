<?php

namespace Modules\Transaction\Providers\EventProviders;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class TransactionEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        'Modules\Transaction\Events\SomeEvent' => [
            'Modules\Transaction\Listeners\EventListener',
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
