<?php

namespace Modules\Point\Entities;

use Illuminate\Database\Eloquent\Model;
// use OwenIt\Auditing\Contracts\Auditable;

class Point extends Model
{
    // use \OwenIt\Auditing\Auditable;

    public $fillable = [
        'user_id',
        'points',
    ];
}
