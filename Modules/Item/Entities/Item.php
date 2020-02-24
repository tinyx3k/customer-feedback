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
        'category_id',
    ];

    public function expressions()
    {
        return $this->hasMany('App\Expression', 'item_id');
    }

    public function category()
    {
        return $this->belongsTo('Modules\Item\Category\ItemCategory', 'category_id');
    }
}
