<?php

namespace Modules\Point\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Point\Interfaces\PointRepositoryInterface;
use Modules\User\Entities\User;
use Modules\Point\Entities\BonusPoint;
use Modules\Point\Entities\Point;
use DB;

class PointController extends Controller
{

	public function index()
	{
		return view('point::bonus');
	}

	public function pointCustomerSearch(Request $request)
	{
		$data = $request->all();
		$search_term = $data['q'];

		$customer = User::where('qr_data', $search_term)->first();
		$formatted_result = [
			0 => [
				'id' => $customer->id,
				'text' => $customer->first_name.' '.$customer->last_name,
			]
		];
		return response()->json($formatted_result);
	}

	public function bonusAdd(Request $request)
	{
		$data = $request->all();
		$auth = auth()->user();
		$data['added_by'] = $auth->first_name.' '.$auth->last_name;
		try {
			DB::beginTransaction();
			$user = User::find($data['user_id']);
			$user_points = Point::where('user_id', $user->id)->first();
			$user_points = Point::find($user_points->id);
			$user_points->points = $user_points->points + $data['points_added'];
			$user_points->save();
    		BonusPoint::create($data);
    		DB::commit();
			$status = 'success';
			$message = 'Successfully sent bonus points!';
		} catch (\Exception $e) {
			DB::rollBack();
			$status = 'error';
			$message = $e->getMessage();
		}

		return redirect()->route('point.index')->with($status, $message);
	}
}
