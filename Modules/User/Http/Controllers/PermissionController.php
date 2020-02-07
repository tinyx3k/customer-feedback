<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Modules\Core\Traits\Authorizable;
use Modules\User\Interfaces\PermissionRepositoryInterface;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    use Authorizable;

    protected $permission_repository;

    public function __construct(
        PermissionRepositoryInterface $permission_repository
    ) {
        $this->permission_repository = $permission_repository->model;
    }

    public function datatable()
    {

        $permissions = $this->permission_repository->select([
            'id',
            'name',
        ])->get();

        return Datatables::of($permissions)
            ->addColumn('action', function ($permission) {
                return view('permission::includes._index_action', compact('permission'))->render();
            })->toJson();
    }

    public function index()
    {
        $breadcrumbs[]['name'] = 'Permission List';
        return view('permission::index', compact('breadcrumbs'));
    }
    public function create()
    {
        return view('permission::create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            $permission = $this->permission_repository->create($data);
            DB::commit();
            $status = 'success';
            $message = 'Permission has been created.';
        } catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                $status = 'warning';
                $message = 'You already have ' . $data['name'] . ' in your permissions list!';
            } else {
                $status = 'error';
                $message = $e->getMessage();
            }
            DB::rollBack();
        }
        return redirect()->route('permission.index')->with($status, $message);
    }

    public function show($id, Request $request)
    {
        if (!$request->ajax()) {
            abort(404);
        }
        $permission = $this->permission_repository->find($id);
        if (empty($permission)) {
            return response()->json('User not found', 404);
        }

        return response()->json($permission, 200);
    }

    public function edit($id)
    {
        $permission = $this->permission_repository->find($id);

        $breadcrumbs[] = [
            'route' => route('permission.index'),
            'name' => 'Permission',
        ];
        $breadcrumbs[]['name'] = 'Permission Edit';

        return view('permission::edit', compact('permission', 'breadcrumbs'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $id = $data['id'];
        try {
            DB::beginTransaction();
            $permission = $this->permission_repository->find($id)->update($data);
            DB::commit();
            $status = 'success';
            $message = 'Permission has been updated.';
        } catch (\Exception $e) {
            $status = 'error';
            // $message = 'Internal Server Error. Try again later.';
            $message = $e->getMessage();
            DB::rollBack();
        }
        return redirect()->route('permission.index')->with($status, $message);
    }

    public function destroy($id)
    {

        try {
            DB::beginTransaction();
            $permission = $this->permission_repository->find($id)->delete($id);
            DB::commit();
            $status = 'success';
            $message = 'Permission has been deleted.';
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            //$message = $e->getMessage();
            DB::rollBack();
        }
        return redirect()->route('permission.index')->with($status, $message);
    }

    public function restore(Request $request)
    {

        // try {
        //      $id = $request->id;
        //     DB::beginTransaction();
        //     $this->wallet_repository->withTrashed()->find($id)->restore();
        //     $status = 'success';
        //     $message = 'Wallet Type has been restored.';
        //     DB::commit();
        // } catch (\Exception $e) {
        //     $status = 'error';
        //     $message = 'Internal Server Error. Try again later.';
        //     DB::rollBack();
        // }
        // return redirect()->route('wallet_type.index')->with($status, $message);

    }
}
