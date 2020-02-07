<?php

namespace Modules\Item\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Modules\User\Entities\Role;
use Modules\Item\Entities\Redeem;
use Modules\Item\Entities\Item;
use Modules\Point\Entities\Point;
use Modules\User\Entities\User;

class BonusController extends Controller
{
    public function index() {
    	$bonus = auth()->user()->bonus()->latest('created_at')->first();
        return view('redeem::bonus', compact('bonus'));
    }
}
