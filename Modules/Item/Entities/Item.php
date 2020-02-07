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

    public function comboItems()
    {
    	$items_array = explode(';', $this->items_combo);
    	$items = [];
    	foreach ($items_array as $v) {
    		$items[] = $this->find($v)->id;
    	}
    	return $items;
    }

    public function comboItemsName()
    {
    	$items_array = explode(';', $this->items_combo);
    	$items = [];
    	foreach ($items_array as $v) {
    		$items[] = $this->find($v);
    	}
    	return $items;
    }
}
