<?php

namespace Modules\Item\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\UuidForKey;

class Item extends Model
{

    use  UuidForKey;

    // protected $table = '';

    public $fillable = [
        'name',
        'image',
        'price',
        'points',
        'points_price',
        'items_combo',
        'item_type',
    ];

    public function expressions()
    {
        return $this->hasMany('App\Expression', 'item_id');
    }
}
