<?php

namespace Modules\Item\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Item\Interfaces\ItemRepositoryInterface;
use DB;
use Modules\Item\Entities\Item;

class ItemController extends Controller
{
    protected $item_repository;

    public function __construct(ItemRepositoryInterface $item_repository)
    {
        $this->item_repository = $item_repository;
    }

    public function index()
    {
        $items = $this->item_repository->all();
        return view('item::index', compact('items'));
    }
    public function create()
    {
        $items = Item::get();
        return view('item::create', compact('items'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $filename = time().'.'.$request->file('item_image')->getClientOriginalExtension();
        $request->file('item_image')->move(public_path().'/img/item_images/', $filename);
        $data['image'] = $filename;
        if(array_key_exists('items_combo', $data)){
            $data['items_combo'] = implode(';', $data['items_combo']);
        }
        try {
            DB::beginTransaction();
            $this->item_repository->create($data);
            DB::commit();
            $status = 'success';
            $message = 'item has been created.';
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
            dd($e->getMessage());
        }
        return redirect()->route('item.index')->with($status, $message);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item = $this->item_repository->findById($id);
        $items_content = [];
        if($item->item_type == 'Combo')
        {
            $items_content = $item->comboItems();
        }
        $items = Item::where('item_type', 'Single')->get();
        if (empty($item)) {
            return redirect()->route('item.index')->with('error', 'Item does not exist.');
        }
        return view('item::edit', compact('item', 'items', 'items_content'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        if(array_key_exists('items_combo', $data)){
            $data['items_combo'] = implode(';', $data['items_combo']);
        }
        if($request->hasFile('item_image')){
            $filename = time().'.'.$request->file('item_image')->getClientOriginalExtension();
            $request->file('item_image')->move(public_path().'/img/item_images/', $filename);
            $data['image'] = $filename;
        }
        try {
            DB::beginTransaction();
            $data['id'] = $id;
            $user = $this->item_repository->update($data);
            DB::commit();
            $status = 'success';
            $message = 'Item has been updated.';
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
        }
        return redirect()->route('item.index')->with($status, $message);
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $this->item_repository->delete($id);
            $status = 'success';
            $message = 'item has been deleted.';
            DB::commit();
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
        }
        return redirect()->route('item.index')->with($status, $message);
    }
}
