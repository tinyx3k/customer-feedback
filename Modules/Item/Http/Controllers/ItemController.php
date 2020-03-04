<?php

namespace Modules\Item\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Item\Interfaces\ItemRepositoryInterface;
use DB;
use Modules\Item\Entities\Item;
use Modules\Item\Entities\ItemCategory;
use App\Expression;
use Carbon\Carbon;

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
        $weeks = $expressions->groupBy(function($q) {
            return Carbon::parse($q->created_at)->format('W');
        })->toArray();
        ksort($weeks);
        $formatted_graph_data = [];
        foreach ($weeks as $key => $value) {
            $formatted_graph_data[] = [
                $key, count($value)
            ];
        }
        $totals = [];
        foreach ($formatted_graph_data as $v) {
            $totals[] = $v[1];
        }
        $a = array_filter($totals);
        $average = array_sum($a)/count($a);
        $formatted_graph_data[] = [
            'Projected Sales Next Week', $average,
        ];
        return view('item::dominant', compact('item', 'dominant', 'expressions', 'formatted_graph_data'));
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

    public function predictionIndex()
    {
        $predictions = ItemCategory::with(['items' => function($q){
            $q->with('expressions')->withCount('expressions')->orderBy('expressions_count', 'desc');
        }])->get();
        $recommended_by_sales = [];
        $recommended_by_expression = [];
        foreach ($predictions as $prediction) {
            $recommended_by_sales[$prediction->name] = $prediction->items->first();
            foreach ($prediction->items as $item) {
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
                $item->neutral_score = abs($expressions->avg('neutral_score'));
                $item->happy_score = abs($expressions->avg('happy_score'));
                $item->sad_score = abs($expressions->avg('sad_score'));
                $item->angry_score = abs($expressions->avg('angry_score'));
                $item->fearful_score = abs($expressions->avg('fearful_score'));
                $item->disgusted_score = abs($expressions->avg('disgusted_score'));
                $item->surprised_score = abs($expressions->avg('surprised_score'));
                $item->dominant = array_search($this->getClosest(1, $exp_arr), $exp_arr);
            }
            $recommended_by_expression[$prediction->name] = $prediction->items->where('dominant', 'Happy')->first();
        }
        return view('item::prediction.index', compact('recommended_by_sales', 'recommended_by_expression'));
    }

    public function predictionWeeklySales()
    {
        return view('item::prediction.weekly', compact('predictions'));
    }

    public function customerRecommended()
    {
        $predictions = ItemCategory::with(['items' => function($q){
            $q->with('expressions')->withCount('expressions')->orderBy('expressions_count', 'desc');
        }])->get();
        $recommended_by_sales = [];
        $recommended_by_expression = [];
        foreach ($predictions as $prediction) {
            $recommended_by_sales[$prediction->name] = $prediction->items->first();
            foreach ($prediction->items as $item) {
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
                $item->neutral_score = abs($expressions->avg('neutral_score'));
                $item->happy_score = abs($expressions->avg('happy_score'));
                $item->sad_score = abs($expressions->avg('sad_score'));
                $item->angry_score = abs($expressions->avg('angry_score'));
                $item->fearful_score = abs($expressions->avg('fearful_score'));
                $item->disgusted_score = abs($expressions->avg('disgusted_score'));
                $item->surprised_score = abs($expressions->avg('surprised_score'));
                $item->dominant = array_search($this->getClosest(1, $exp_arr), $exp_arr);
            }
            $recommended_by_expression[$prediction->name] = $prediction->items->where('dominant', 'Happy')->first();
        }
        return view('item::customer.recommended', compact('recommended_by_sales', 'recommended_by_expression'));
    }

    public function kidsQuestion()
    {
        return view('item::customer.kids-question');
    }

    public function kidsGetExpression()
    {
        return view('item::customer.kids-expression');
    }

    public function kidsRecommended(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $predictions = ItemCategory::with(['items' => function($q){
            $q->with('expressions')->withCount('expressions')->orderBy('expressions_count', 'desc');
        }])->get();
        $exp_arr = [
            'Neutral' => $data['neutral_score'],
            'Happy' => $data['happy_score'],
            'Sad' => $data['sad_score'],
            'Angry' => $data['angry_score'],
            'Fearful' => $data['fearful_score'],
            'Disgusted' => $data['disgusted_score'],
            'Surprised' => $data['surprised_score'],
        ];
        $dominant = array_search($this->getClosest(1, $exp_arr), $exp_arr);
        $exp_to_query = 'Happy';
        switch ($dominant) {
            case 'Neutral':
                $exp_to_query = 'Surprised';
                break;
            case 'Happy':
                $exp_to_query = 'Happy';
                break;
            case 'Sad':
                $exp_to_query = 'Happy';
                break;
            case 'Angry':
                $exp_to_query = 'Neutral';
                break;
            case 'Fearful':
                $exp_to_query = 'Happy';
                break;
            case 'Disgusted':
                $exp_to_query = 'Happy';
                break;
            case 'Surprised':
                $exp_to_query = 'Happy';
                break;
            default:
                $exp_to_query = 'Happy';
                break;
        }
        $recommended_by_expression = [];
        foreach ($predictions as $k => $prediction) {
            $recommended_by_sales[$prediction->name] = $prediction->items->first();
            foreach ($prediction->items as $item) {
                $expressions = $item->expressions; 
                $item->neutral_score = abs($expressions->avg('neutral_score'));
                $item->happy_score = abs($expressions->avg('happy_score'));
                $item->sad_score = abs($expressions->avg('sad_score'));
                $item->angry_score = abs($expressions->avg('angry_score'));
                $item->fearful_score = abs($expressions->avg('fearful_score'));
                $item->disgusted_score = abs($expressions->avg('disgusted_score'));
                $item->surprised_score = abs($expressions->avg('surprised_score'));
                $item->dominant = array_search($this->getClosest(1, $exp_arr), $exp_arr);
            }
            $prediction_items = $prediction->items->where('dominant', $exp_to_query);
            if($prediction_items->count() > 0){
                $recommended_by_expression[$prediction->name] = $prediction_items->last();
            }else{
                $recommended_by_expression[$prediction->name] = [];
            }
        }
        // dd($recommended_by_expression);
        return view('item::customer.kids-recommended', compact('recommended_by_sales', 'recommended_by_expression'));
    }

    public function adultQuestion()
    {
        return view('item::customer.adult-question');
    }

    public function adultGetExpression()
    {
        return view('item::customer.adult-expression');
    }

    public function adultRecommended(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $predictions = ItemCategory::with(['items' => function($q){
            $q->with('expressions')->withCount('expressions')->orderBy('expressions_count', 'desc');
        }])->get();
        $exp_arr = [
            'Neutral' => $data['neutral_score'],
            'Happy' => $data['happy_score'],
            'Sad' => $data['sad_score'],
            'Angry' => $data['angry_score'],
            'Fearful' => $data['fearful_score'],
            'Disgusted' => $data['disgusted_score'],
            'Surprised' => $data['surprised_score'],
        ];
        $dominant = array_search($this->getClosest(1, $exp_arr), $exp_arr);
        $exp_to_query = 'Happy';
        switch ($dominant) {
            case 'Neutral':
                $exp_to_query = 'Surprised';
                break;
            case 'Happy':
                $exp_to_query = 'Happy';
                break;
            case 'Sad':
                $exp_to_query = 'Happy';
                break;
            case 'Angry':
                $exp_to_query = 'Neutral';
                break;
            case 'Fearful':
                $exp_to_query = 'Happy';
                break;
            case 'Disgusted':
                $exp_to_query = 'Happy';
                break;
            case 'Surprised':
                $exp_to_query = 'Happy';
                break;
            default:
                $exp_to_query = 'Happy';
                break;
        }
        $recommended_by_expression = [];
        foreach ($predictions as $k => $prediction) {
            $recommended_by_sales[$prediction->name] = $prediction->items->first();
            foreach ($prediction->items as $item) {
                $expressions = $item->expressions; 
                $item->neutral_score = abs($expressions->avg('neutral_score'));
                $item->happy_score = abs($expressions->avg('happy_score'));
                $item->sad_score = abs($expressions->avg('sad_score'));
                $item->angry_score = abs($expressions->avg('angry_score'));
                $item->fearful_score = abs($expressions->avg('fearful_score'));
                $item->disgusted_score = abs($expressions->avg('disgusted_score'));
                $item->surprised_score = abs($expressions->avg('surprised_score'));
                $item->dominant = array_search($this->getClosest(1, $exp_arr), $exp_arr);
            }
            $prediction_items = $prediction->items->where('dominant', $exp_to_query);
            if($prediction_items->count() > 0){
                $recommended_by_expression[$prediction->name] = $prediction_items->first();
            }else{
                $recommended_by_expression[$prediction->name] = [];
            }
        }
        // dd($recommended_by_expression);
        return view('item::customer.adult-recommended', compact('recommended_by_sales', 'recommended_by_expression'));
    }
}
