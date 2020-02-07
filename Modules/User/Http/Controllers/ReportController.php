<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Modules\User\Entities\Role;
use Modules\Item\Entities\Item;
use Modules\Item\Entities\Redeem;
use Modules\Item\Entities\RedeemLog;
use Modules\Point\Entities\BonusPoint;

class ReportController extends Controller
{
	public function customerReports()
	{
		$customers = Role::with('users')->where('name', 'Customer')->first()->users;
		return view('modules.report.customers', compact('customers'));
	}

	public function itemReports()
	{
		$items = Item::get();
		return view('modules.report.items', compact('items'));
	}

	public function redeemReports()
	{
		$redeems = RedeemLog::with(['item', 'user'])->get();
		$earned_points = Redeem::with(['item', 'user'])->get();
		$bonus_points = BonusPoint::with('user')->get();
		return view('modules.report.points', compact('redeems', 'earned_points', 'bonus_points'));
	}
}