<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;

class RolePermission extends Model
{
    protected $table = 'permission_role';
    public $timestamps = false;

    public $fillable = [
        'permission_id',
        'role_id',
    ];

    public function role()
    {
        return $this->belongsTo('Modules\User\Entities\Role');
    }

    public function permissions()
    {
        return $this->hasMany('Modules\User\Entities\Permission');
    }

}
