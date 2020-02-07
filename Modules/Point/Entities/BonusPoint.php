<?php

namespace Modules\Point\Entities;

use Illuminate\Database\Eloquent\Model;
// use OwenIt\Auditing\Contracts\Auditable;

class BonusPoint extends Model
{
    // use \OwenIt\Auditing\Auditable;
    protected $table = 'bonus_points';

    public $fillable = [
        'user_id',
        'points_added',
        'message',
        'added_by',
    ];

    public function user() {
    	return $this->hasOne('Modules\User\Entities\User', 'id', 'user_id');
    }
}
