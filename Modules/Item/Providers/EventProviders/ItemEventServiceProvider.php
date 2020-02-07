<?php

namespace Modules\Item\Providers\EventProviders;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class ItemEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        // 'Modules\Dump\Events\SomeEvent' => [
        //     'Modules\Dump\Listeners\EventListener',
        // ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
