<?php

namespace Modules\User\Entities;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\Core\Traits\UuidForKey;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable, UuidForKey;

    use SoftDeletes, EntrustUserTrait {

        SoftDeletes::restore insteadof EntrustUserTrait;
        EntrustUserTrait::restore insteadof SoftDeletes;

    }
    protected $table = 'users';

    public $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'address1',
        'province',
        'city',
        'country',
        'zip_code',
        'profile_picture',
        'account_number',
        'username',
        'email',
        'mobile',
        'telephone',
        'birthdate',
        'created_by',
        'civil_status',
        'is_active',
        'password',
        'verified',
        'token',
        'wp_email',
        'wp_site',
        'wp_blog',
        'wp_blog_username',
        'qr_data',
    ];
    protected $dates = ['deleted_at'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function points() {
        return $this->hasOne('Modules\Point\Entities\Point', 'user_id', 'id');
    }

    public function history() {
        return $this->hasMany('Modules\Item\Entities\RedeemLog', 'user_id', 'id');
    }

    public function earned() {
        return $this->hasMany('Modules\Item\Entities\Redeem', 'user_id', 'id');
    }

    public function bonus() {
        return $this->hasMany('Modules\Point\Entities\BonusPoint', 'user_id', 'id');
    }

}
