<?php

namespace Modules\Core\Providers;

use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function boot()
    {
        $this->registerConfig();
    }

    public function register()
    {
        $this->registerProvider();
        $this->registerAlias();
    }

    public function registerProvider()
    {
        $this->app->register(\Cviebrock\EloquentSluggable\ServiceProvider::class);
        $this->app->register(\Intervention\Image\ImageServiceProvider::class);
        $this->app->register(\Zizaco\Entrust\EntrustServiceProvider::class);
        $this->app->register(\Laravel\Passport\PassportServiceProvider::class);
        $this->app->register(\Yajra\DataTables\DataTablesServiceProvider::class);

    }

    public function registerAlias()
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Image', \Intervention\Image\Facades\Image::class);
        $loader->alias('Entrust', \Zizaco\Entrust\EntrustFacade::class);
        $loader->alias('Datatables', \Yajra\DataTables\Facades\DataTables::class);
        $loader->alias('Uuid', \Webpatser\Uuid\Uuid::class);

    }

    public function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/kog3nt.php', 'kog3nt'
        );

        $this->mergeConfigFrom(
            __DIR__ . '/../Config/dashmix.php', 'dashmix'
        );
    }
}
