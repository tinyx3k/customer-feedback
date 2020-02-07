<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Modules\Core\Traits\Authorizable;
use Modules\User\Http\Requests\RoleRequest;
use Modules\User\Interfaces\RoleRepositoryInterface;
use Modules\User\Interfaces\UserRepositoryInterface;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    use Authorizable;

    protected $role_repository;
    protected $user_repository;

    public function __construct(
        UserRepositoryInterface $user_repository,
        RoleRepositoryInterface $role_repository
    ) {
        $this->role_repository = $role_repository->model;
        $this->user_repository = $user_repository->model;
    }

    public function datatable()
    {
        if (auth()->user()->hasRole(['Super Admin'])) {
            $roles = $this->role_repository->withTrashed()->select(['id', 'name', 'deleted_at'])->where('name', '<>', 'Super Admin')->get();
        } else {
            $roles = $this->role_repository->select(['id', 'name', 'deleted_at'])->where('name', '<>', 'Super Admin')->get();
        }

        return Datatables::of($roles)
            ->addColumn('status', function ($role) {
                return $role->deleted_at ? 'In-active' : 'Active';
            })
            ->addColumn('action', function ($role) {
                return view('role::includes._index_action', compact('role'))->render();
            })->toJson();
    }

    public function index()
    {
        $user = $this->user_repository->all();
        $breadcrumbs[]['name'] = 'Role List';
        return view('role::index', compact('breadcrumbs', 'user'));
    }

    public function create()
    {
        return view('role::create');
    }

    public function store(RoleRequest $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            $role = $this->role_repository->create($data);
            DB::commit();
            $status = 'success';
            $message = 'Role has been created.';
        } catch (\Exception $e) {
            $status = 'error';
            //$message = 'Internal Server Error. Try again later.';
            $message = $e->getMessage();
            DB::rollBack();
        }
        return redirect()->route('role.index')->with($status, $message);
    }

    public function show($id, Request $request)
    {
        if (!$request->ajax()) {
            abort(404);
        }
        $role = $this->role_repository->find($id);
        if (empty($role)) {
            return response()->json('User not found', 404);
        }

        return response()->json($role, 200);
    }

    public function edit($id)
    {
        $role = $this->role_repository->find($id);

        $breadcrumbs[] = [
            'name' => 'Role List',
            'link' => route('role.index'),
        ];
        $breadcrumbs[]['name'] = 'Role Edit';

        return view('role::edit', compact('role', 'breadcrumbs'));
    }

    public function update(RoleRequest $request, $id)
    {
        $data = $request->all();
        $id = $data['id'];
        try {
            DB::beginTransaction();
            $role = $this->role_repository->find($id)->update($data);
            DB::commit();
            $status = 'success';
            $message = 'Role has been updated.';
        } catch (\Exception $e) {
            $status = 'error';
            // $message = 'Internal Server Error. Try again later.';
            $message = $e->getMessage();
            DB::rollBack();
        }
        return redirect()->route('role.index')->with($status, $message);
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $role = $this->role_repository->find($id)->delete();
            DB::commit();
            $status = 'success';
            $message = 'Role has been deleted.';
        } catch (\Exception $e) {
            $status = 'error';
            // $message = 'Internal Server Error. Try again later.';
            $message = $e->getMessage();
            DB::rollBack();
        }
        return redirect()->route('role.index')->with($status, $message);
    }

    public function restore(Request $request)
    {
        try {
            $id = $request->id;
            DB::beginTransaction();
            $role = $this->role_repository->withTrashed()->find($id)->restore();
            DB::commit();
            $status = 'success';
            $message = 'Role has been restored.';
        } catch (\Exception $e) {
            $status = 'error';
            // $message = 'Internal Server Error. Try again later.';
            $message = $e->getMessage();
            DB::rollBack();
        }
        return redirect()->route('role.index')->with($status, $message);

    }
}
