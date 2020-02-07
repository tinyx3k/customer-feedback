<?php

namespace Modules\User\Repositories;

use Modules\Core\Repositories\AbstractEloquentRepository;
use Modules\User\Interfaces\RoleRepositoryInterface;
use Modules\User\Entities\Role;

class RoleRepository extends AbstractEloquentRepository implements RoleRepositoryInterface
{
    publiC function withTrashed()
    {
        return Role::withTrashed();
    }
}
