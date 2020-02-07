<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Modules\Core\Traits\Authorizable;
use Modules\User\Interfaces\KeyRepositoryInterface;
use Yajra\DataTables\Facades\DataTables;

class KeyController extends Controller
{
    use Authorizable;
    protected $key_repository;

    public function __construct(KeyRepositoryInterface $key_repository)
    {
        $this->key_repository = $key_repository->model;
    }

    public function apis()
    {
        $key_count = auth()->user()->keys()->count();
        $apis = $this->key_repository->all();
        return view('key::xxx', compact('apis', 'key_count'));
    }

    public function apisUpdate(Request $request)
    {
        $data = $request->all();
        $auth = auth()->user();
        $check_key = $auth->keys()->where('id', $data['key_id'])->first();

        try {
            DB::beginTransaction();
            if (empty($check_key)) {
                $x = $auth->keys()->attach($data['key_id'], array('data' => json_encode($data['data'])));
            } else {
                $check_key->pivot->data = json_encode($data['data']);
                $check_key->pivot->save();
            }
            DB::commit();
            $status = 'success';
            $message = 'Api has been saved.';
        } catch (\Exception $e) {
            $status = 'error';
            //$message = 'Internal Server Error. Try again later.';
            $message = $e->getMessage();
            DB::rollBack();
        }
        return redirect()->back()->with($status, $message);
    }

    public function datatable()
    {
        $apis = $this->key_repository->select(['id', 'name', 'description', 'fields'])->get();
        return Datatables::of($apis)
            ->addColumn('action', function ($api) {
                return view('key::includes._index_action', compact('api'))->render();
            })->toJson();
    }

    public function index()
    {
        $breadcrumbs[]['name'] = 'Api List';
        return view('key::index', compact('breadcrumbs'));
    }

    public function create()
    {
        return abort(404);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['fields'] = json_encode($data['fields']);

        if (empty($data['fields'])) {
            $data['fields'] = json_encode([]);
        }
        try {
            DB::beginTransaction();
            $api = $this->key_repository->create($data);
            DB::commit();
            $status = 'success';
            $message = 'Api has been added.';
        } catch (\Exception $e) {
            $status = 'error';
            //$message = 'Internal Server Error. Try again later.';
            $message = $e->getMessage();
            DB::rollBack();
        }
        return redirect()->route('key.index')->with($status, $message);
    }

    public function show($id, Request $request)
    {
        if (!$request->ajax()) {
            abort(404);
        }
        $api = $this->key_repository->find($id);
        if (empty($api)) {
            return response()->json('User not found', 404);
        }

        $api->fields = json_decode($api->fields);

        return response()->json($api, 200);
    }

    public function edit($id)
    {
        return abort(404);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $data['fields'] = json_encode($data['fields']);
        try {
            DB::beginTransaction();
            $key = $this->key_repository->find($id)->update($data);
            DB::commit();
            $status = 'success';
            $message = 'Api has been updated.';
        } catch (\Exception $e) {
            $status = 'error';
            // $message = 'Internal Server Error. Try again later.';
            $message = $e->getMessage();
            DB::rollBack();
        }
        return redirect()->route('key.index')->with($status, $message);
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $api = $this->key_repository->find($id)->delete();
            DB::commit();
            $status = 'success';
            $message = 'Api has been deleted.';
        } catch (\Exception $e) {
            $status = 'error';
            // $message = 'Internal Server Error. Try again later.';
            $message = $e->getMessage();
            DB::rollBack();
        }
        return redirect()->route('key.index')->with($status, $message);
    }
}
