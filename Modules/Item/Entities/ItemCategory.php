<?php

namespace Modules\Item\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Traits\UuidForKey;

class ItemCategory extends Model
{

    use  UuidForKey;

    public $fillable = [
        'name',
    ];

    public function items()
    {
        return $this->hasMany('Modules\Item\Entities\Item', 'category_id');
    }
}
