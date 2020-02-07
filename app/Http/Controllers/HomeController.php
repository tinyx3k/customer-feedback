<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\User\Entities\User;
use Modules\Item\Entities\Item;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function checkUser($id) {
        $user = User::find($id);
        return response()->json($user);
    }

    public function checkItem($id) {
        $item = Item::find($id);
        return response()->json($item);
    }
}
