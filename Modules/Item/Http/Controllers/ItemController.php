<?php

namespace Modules\Item\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Item\Interfaces\ItemRepositoryInterface;
use DB;
use Modules\Item\Entities\Item;
use Modules\Item\Entities\ItemCategory;
use App\Expression;

class ItemController extends Controller
{
    protected $item_repository;

    public function __construct(ItemRepositoryInterface $item_repository)
    {
        $this->item_repository = $item_repository;
    }

    public function index()
    {
        $categories = ItemCategory::with(['items'])->get();
        return view('item::index', compact('categories'));
    }

    public function create()
    {
        $categories = ItemCategory::get();
        return view('item::create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $filename = time().'.'.$request->file('item_image')->getClientOriginalExtension();
        $request->file('item_image')->move(public_path().'/img/item_images/', $filename);
        $data['image'] = $filename;
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
        $item = Item::find($id);
        return view('item::show', compact('item'));
    }

    public function edit($id)
    {
        $item = $this->item_repository->findById($id);
        $categories = ItemCategory::get();
        if (empty($item)) {
            return redirect()->route('item.index')->with('error', 'Item does not exist.');
        }
        return view('item::edit', compact('item', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
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

    public function expression(Request $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            Expression::create($data);
            DB::commit();
            $status = 'success';
            $message = 'Successfully collected expressions!';
        } catch (\Exception $e) {
            DB::rollBack();
            $status = 'error';
            $message = $e->getMessage();
        }

        return redirect()->route('item.menu')->with($status, $message);
    }

    public function showExpression($id)
    {
        $item = Item::find($id);
        $expressions = $item->expressions;
        $exp_arr = [
            'Neutral' => $expressions->avg('neutral_score'),
            'Happy' => $expressions->avg('happy_score'),
            'Sad' => $expressions->avg('sad_score'),
            'Angry' => $expressions->avg('angry_score'),
            'Fearful' => $expressions->avg('fearful_score'),
            'Disgusted' => $expressions->avg('disgusted_score'),
            'Surprised' => $expressions->avg('surprised_score'),
        ];
        $dominant = array_search($this->getClosest(1, $exp_arr), $exp_arr);
        foreach ($expressions as $expression) {
            $single_exp_arr = [
                'Neutral' => $expression->neutral_score,
                'Happy' => $expression->happy_score,
                'Sad' => $expression->sad_score,
                'Angry' => $expression->angry_score,
                'Fearful' => $expression->fearful_score,
                'Disgusted' => $expression->disgusted_score,
                'Surprised' => $expression->surprised_score,
            ];
            $dominant_expression = array_search($this->getClosest(1, $single_exp_arr), $single_exp_arr);
            $expression->dominant = $dominant_expression;
        }
        return view('item::dominant', compact('item', 'dominant', 'expressions'));
    }

    private function getClosest($search, $arr){
        $closest = null;
        foreach ($arr as $item) {
            if ($closest === null || abs($search - $closest) > abs($item - $search)) {
                $closest = $item;
            }
        }
        return $closest;
    }

    public function menu()
    {
        $categories = ItemCategory::with(['items'])->get();
        return view('item::menu', compact('categories'));
    }

    public function question($id)
    {
        $item = Item::find($id);
        return view('item::question', compact('item'));
    }
}
