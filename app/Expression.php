<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expression extends Model
{
    protected $fillable = [
    	'item_id',
    	'neutral_score',
    	'happy_score',
    	'sad_score',
    	'angry_score',
    	'fearful_score',
    	'disgusted_score',
    	'surprised_score',
        'created_at',
    ];
}
