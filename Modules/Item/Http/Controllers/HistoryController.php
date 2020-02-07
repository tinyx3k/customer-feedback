<?php

namespace Modules\Item\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Modules\User\Entities\Role;
use Modules\Item\Entities\Redeem;
use Modules\Item\Entities\Item;
use Modules\Point\Entities\Point;

class HistoryController extends Controller
{
    public function index() {
    	$histories = auth()->user()->history()->with('item')->get();
    	$earned = auth()->user()->earned()->with('item')->get();
        return view('redeem::history', compact('histories', 'earned'));
    }
}
