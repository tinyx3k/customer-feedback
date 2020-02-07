<?php

namespace Modules\Point\Providers\EventProviders;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class PointEventServiceProvider extends ServiceProvider
{
    protected $listen = [
        'Modules\Point\Events\SomeEvent' => [
            'Modules\Point\Listeners\EventListener',
        ],
    ];

    public function boot()
    {
        parent::boot();
    }
}
