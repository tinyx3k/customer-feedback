<?php

namespace Modules\User\Entities;

use Config;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Traits\UuidForKey;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    use UuidForKey;
    use SoftDeletes;
    protected $table = 'roles';
    public $fillable = [
        'name',
        'display_name',
        'description',
    ];
    protected $dates = ['deleted_at'];

    public function users()
    {
        return $this->belongsToMany(
            Config::get('auth.providers.users.model'),
            Config::get('entrust.role_user_table'),
            Config::get('entrust.role_foreign_key'),
            Config::get('entrust.user_foreign_key')
        );
    }
}
