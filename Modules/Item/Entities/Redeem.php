<?php

namespace Modules\Item\Entities;

use Illuminate\Database\Eloquent\Model;

class Redeem extends Model
{

    public $fillable = [
        'user_id',
        'item_id',
        'points_redeemed',
        'redeemed_by',
    ];

    public function user() {
    	return $this->hasOne('Modules\User\Entities\User', 'id', 'user_id');
    }

    public function item() {
    	return $this->hasOne('Modules\Item\Entities\Item', 'id', 'item_id');
    }
}
