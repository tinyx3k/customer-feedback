<?php

namespace Modules\User\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\User\Entities\Credit;
use Modules\User\Entities\Key;
use Modules\User\Entities\Permission;
use Modules\User\Entities\Role;
use Modules\User\Entities\RolePermission;
use Modules\User\Entities\User;
use Modules\User\Repositories\CreditRepository;
use Modules\User\Repositories\KeyRepository;
use Modules\User\Repositories\PermissionRepository;
use Modules\User\Repositories\RolePermissionRepository;
use Modules\User\Repositories\RoleRepository;
use Modules\User\Repositories\UserRepository;

class UserServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerRoutes();
        $this->registerViews();
        $this->registerConfig();
    }

    public function register()
    {
        $this->providers();
        $this->eventProviders();
    }

    public function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/../Routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../Routes/key.php');
    }

    public function registerViews()
    {
        $this->loadViewsFrom(resource_path('views/modules/user'), 'user');
        $this->loadViewsFrom(resource_path('views/modules/role'), 'role');
        $this->loadViewsFrom(resource_path('views/modules/member'), 'member');
        $this->loadViewsFrom(resource_path('views/modules/permission'), 'permission');
        $this->loadViewsFrom(resource_path('views/modules/role_permission'), 'role_permission');
        $this->loadViewsFrom(resource_path('views/modules/profile'), 'profile');
        $this->loadViewsFrom(resource_path('views/modules/activity'), 'activity');
        $this->loadViewsFrom(resource_path('views/keys'), 'key');
    }

    public function providers()
    {
        $this->app->bind('Modules\User\Interfaces\KeyRepositoryInterface', function ($app) {
            return new KeyRepository(new Key());
        });

        $this->app->bind('Modules\User\Interfaces\UserRepositoryInterface', function ($app) {
            return new UserRepository(new User());
        });

        $this->app->bind('Modules\User\Interfaces\RoleRepositoryInterface', function ($app) {
            return new RoleRepository(new Role());
        });

        $this->app->bind('Modules\User\Interfaces\PermissionRepositoryInterface', function ($app) {
            return new PermissionRepository(new Permission());
        });

        $this->app->bind('Modules\User\Interfaces\RolePermissionRepositoryInterface', function ($app) {
            return new RolePermissionRepository(new RolePermission());
        });

        $this->app->bind('Modules\User\Interfaces\CreditRepositoryInterface', function ($app) {
            return new CreditRepository(new Credit());
        });

    }

    public function eventProviders()
    {
        $this->app->register("Modules\User\Providers\EventProviders\UserEventServiceProvider");
    }

    public function registerConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../Config/config.php', 'user'
        );
    }
}
