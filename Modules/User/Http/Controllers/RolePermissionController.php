<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Modules\Core\Traits\Authorizable;
use Modules\User\Interfaces\PermissionRepositoryInterface;
use Modules\User\Interfaces\RolePermissionRepositoryInterface;
use Modules\User\Interfaces\RoleRepositoryInterface;

class RolePermissionController extends Controller
{
    use Authorizable;

    protected $rolepermission_repository;
    protected $role_repository;
    protected $permission_repository;

    public function __construct(
        RoleRepositoryInterface $role_repository,
        PermissionRepositoryInterface $permission_repository,
        RolePermissionRepositoryInterface $rolepermission_repository
    ) {
        $this->role_repository = $role_repository->model;
        $this->permission_repository = $permission_repository->model;
        $this->rolepermission_repository = $rolepermission_repository->model;
    }

    public function index()
    {
        $permissions = $this->permission_repository->orderBy('description')->get();
        $roles = $this->role_repository->select(['*'])->where('name', '<>', 'Super Admin')->get();
        $role_permissions = $this->rolepermission_repository->all();

        return view('role_permission::index', compact('roles', 'permissions', 'role_permissions'));
    }
    public function create()
    {

    }

    public function store(Request $request)
    {
        $params = $request->all();
        if (!isset($params['role_id'])) {
            throw new Exception("Error Processing Request", 1);
        }

        try {
            DB::beginTransaction();
            //remove old
            $this->rolepermission_repository->where('role_id', $params['role_id'])->delete();

            //save new
            if (isset($params['permissions'])) {
                foreach ($params['permissions'] as $key => $permission) {
                    $this->rolepermission_repository->create([
                        'permission_id' => $permission,
                        'role_id' => $params['role_id'],
                    ]);
                }
            }

            DB::commit();
            $status = 'success';
            $message = 'Role permission has been created.';
        } catch (\Exception $e) {
            $status = 'error';
            //$message = 'Internal Server Error. Try again later.';
            $message = $e->getMessage();
            DB::rollBack();
        }
        return redirect()->route('role_permission.index')->with($status, $message);
    }

    public function show($id, Request $request)
    {
        //  if (!$request->ajax()) {
        //     abort(404);
        // }
        // $permission = $this->permission_repository->find($id);
        // if (empty($permission)) {
        //     return response()->json('User not found', 404);
        // }

        // return response()->json($permission, 200);
    }

    public function edit($id)
    {
        // $permission = $this->permission_repository->find($id);

        // $breadcrumbs[] = [
        //     'route' => route('permission.index'),
        //     'name' => 'Permission',
        // ];
        // $breadcrumbs[]['name'] = 'Permission Edit';

        // return view('permission::edit', compact('permission', 'breadcrumbs'));
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

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
