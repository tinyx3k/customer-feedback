<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\UuidForKey;

class Key extends Model
{
    use UuidForKey;

    public $fillable = [
        'name',
        'description',
        'fields',
    ];

    public function users()
    {
        return $this->belongsToMany('Modules\User\Entities\User')->withPivot('data');
    }
}
