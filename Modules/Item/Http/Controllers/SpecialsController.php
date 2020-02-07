<?php

namespace Modules\Item\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Modules\User\Entities\Role;
use Modules\Item\Entities\Redeem;
use Modules\Item\Entities\Item;
use Modules\Point\Entities\Point;

class SpecialsController extends Controller
{
    public function index() {
        return view('redeem::specials');
    }
}
