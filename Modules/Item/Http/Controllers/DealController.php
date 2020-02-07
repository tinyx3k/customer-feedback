<?php

namespace Modules\Item\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Modules\Item\Entities\Item;
use Modules\User\Entities\User;
use Modules\Item\Entities\RedeemLog;
use Modules\Point\Entities\Point;

class DealController extends Controller
{
    public function index(){
    	$items = Item::get();
        return view('deal::index', compact('items'));
    }

    public function redeemItem($id){
    	$item = Item::find($id);
    	return view('deal::redeem', compact('item'));
    }

    public function redeemSuccess($user_id, $item_id)
    {
    	$user = User::with('points')->find($user_id);
    	$item = Item::find($item_id);
    	return view('deal::success', compact('user','item'));
    }

    public function processRedemption($user_id, $item_id) {
        $auth = auth()->user();
    	try {
    		DB::beginTransaction();
	    	$user_points = Point::where('user_id', $user_id)->first();
	    	$user_points = Point::find($user_points->id);
	    	$item_data = Item::find($item_id);
	    	$user_points->points = $user_points->points - $item_data->points_price;
	    	$user_points->save();
            RedeemLog::create([
                'user_id' => $user_id,
                'item_id' => $item_id,
                'points_spent' => $item_data->points_price,
                'redeemed_by' => $auth->first_name.' '.$auth->last_name,
            ]);
    		DB::commit();
    		$status = 'success';
    		$message = 'Successfully pushed through transaction';
    		return redirect()->route('redeem.success', [$user_id, $item_id])->with($status, $message);
    	} catch (\Exception $e) {
    		DB::rollBack();
    		$status = 'error';
    		$message = $e->getMessage();
    		return redirect()->route('dashboard')->with($status, $message);
    	}
    }
}
