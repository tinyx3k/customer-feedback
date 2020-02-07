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

class RedeemController extends Controller
{
    public function index() {
    	$users = Role::with('users')->where('name', 'Customer')->first()->users;
    	$items = Item::get();
        return view('redeem::index', compact('users', 'items'));
    }

    public function store(Request $request) {
        $auth = auth()->user();
    	$data = $request->all();
        if(!array_key_exists('item', $data)){
            $status = 'error';
            $message = 'You cannot add any points without any items';
            return redirect()->route('redeem.index')->with($status, $message);
        }
    	try {
    		DB::beginTransaction();
    		foreach ($data['item'] as $key => $item) {
    			$item_data = Item::find($key);
                $user = User::where('qr_data', $data['user_id'])->first();
                $user = User::find($user->id);
    			$redeem_data = [
    				'user_id' => $user->id,
    				'item_id' => $item_data->id,
    				'points_redeemed' => $item_data->points * $item,
                    'redeemed_by' => $auth->first_name.' '.$auth->last_name,
    			];
    			$user_points = Point::where('user_id', $user->id)->first();
    			$user_points = Point::find($user_points->id);
    			$user_points->points = $user_points->points + $redeem_data['points_redeemed'];
    			$user_points->save();
    			Redeem::create($redeem_data);
    		}
    		DB::commit();
    		$status = 'success';
    		$message = 'Successfully redeemed points!';
    	} catch (\Exception $e) {
    		DB::rollBack();
    		dd($e->getMessage());
    		$status = 'error';
    		$message = $e->getMessage();
    	}

    	return redirect()->route('redeem.index')->with($status, $message);
    }
}
