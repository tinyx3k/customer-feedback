<?php

namespace Modules\User\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Notifications\VerifyToken;
use Auth;
use DB;
use Hash;
use Illuminate\Http\Request;
use Modules\User\Interfaces\RoleRepositoryInterface;
use Modules\User\Interfaces\UserRepositoryInterface;
use Notification;
use Yajra\DataTables\Facades\DataTables;
use Modules\Point\Entities\Point;


class UserController extends Controller
{
    protected $user_repository;
    protected $role_repository;

    public function __construct(
        UserRepositoryInterface $user_repository,
        RoleRepositoryInterface $role_repository
    ) {
        $this->user_repository = $user_repository->model;
        $this->role_repository = $role_repository->model;

    }

    public function datatable()
    {
        $auth = auth()->user();
        $users = $this->user_repository->withTrashed()->select([
            'id',
            'first_name',
            'last_name',
            'middle_name',
            'email',
            'created_by',
            'deleted_at',
        ])->with('roles');

        // $users->whereHas('roles', function ($q) {
        //     $q->where('name', '<>', 'Super Admin')
        //    ->with('roles');
        // });
        if ($auth->roles()->first()->name == 'Reseller') {
            $users = $users->where('created_by', $auth->id)->get();
        } else {
            $users = $users->get();
        }
        return Datatables::of($users)
            ->addColumn('name', function ($user) {
                return $user->first_name . ' ' . $user->middle_name . ' ' . $user->last_name;
            })
            ->addColumn('status', function ($user) {
                return $user->deleted_at ? 'In-active' : 'Active';
            })
            ->addColumn('created_by', function ($user) {
                $creator = $this->user_repository->where('id', $user->created_by)->first();
                if (!$creator) {
                    return 'None';
                }
                return $creator->first_name . ' ' . $creator->last_name;
            })
            ->editColumn('role', function ($user) {
                return view('user::includes._index_role_badges', compact('user'))->render();
            })
            ->addColumn('action', function ($user) {
                return view('user::includes._index_action', compact('user'))->render();
            })
            ->rawColumns(['role', 'action'])
            ->toJson();
    }

    public function index()
    {
        $roles = $this->role_repository->all();
        $breadcrumbs[]['name'] = 'User List';
        return view('user::index', compact('roles', 'breadcrumbs'));
    }

    public function create()
    {
        $roles = $this->role_repository->all();
        return view('user::create', compact('roles'));
    }

    public function store(Request $request)
    {
        $auth = auth()->user();
        $data = $request->all();

        $data['created_by'] = auth()->user()->id;

        $code = $this->generateRandomString(6);
        $data['created_by'] = $auth->id;
        $data['password'] = bcrypt(substr($data['birthdate'], -4));
        // dd($data);

        try {
            DB::beginTransaction();
            $token = $this->generateRandomString();
            $data['verified'] = 0;

            $user = $this->user_repository->create($data);
            $user->roles()->attach($user->id, ['role_id' => $data['role_id'], 'user_id' => $user->id]);
            $point = new Point(['points' => 0]);
            $user->points()->save($point);
            DB::commit();
            $status = 'success';
            $message = 'User has been created.';
        } catch (\Exception $e) {
            $status = 'error';
            $message = $e->getMessage();
            DB::rollBack();
        }
        return redirect()->route('user.index')->with($status, $message);
    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    private function sendVerification($user, $data)
    {
        $data['verification_token'] = $user->token;
        Notification::send($user, new VerifyToken($data));
        return;
    }

    public function verifyEmail($token)
    {
        $user = $this->user_repository->where('token', $token)->where('verified', 0)->first();
        if ($user) {
            $status = 'success';
            $message = 'Your account has been verified.Pls fill up the form';
            return redirect()->route('profile.details', $token)->with($status, $message);
        } else {
            abort(404);
        }
    }
    public function show($id, Request $request)
    {
        if (!$request->ajax()) {
            abort(404);
        }
        $user = $this->user_repository->find($id);
        if (empty($user)) {
            return response()->json('User not found', 404);
        }
        $user->role_id = $user->roles()->first()->id;

        return response()->json($user, 200);
    }

    public function edit($id)
    {
        $user = $this->user_repository->find($id);
        $roles = $this->role_repository->all();

        return view('user::edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            $user = $this->user_repository->find($data['id'])->update($data);
            DB::commit();
            $status = 'success';
            $message = 'User has been updated.';
        } catch (\Exception $e) {
            $status = 'error';
            $message = $e->getMessage();
            DB::rollBack();
        }
        return redirect()->back()->with($status, $message);
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $user = $this->user_repository->find($id)->delete();
            $status = 'success';
            $message = 'User has been deleted.';
            DB::commit();
        } catch (\Exception $e) {
            $status = 'error';
            $message = $e->getMessage();
            DB::rollBack();
        }
        return redirect()->route('user.index')->with($status, $message);
    }

    public function restore(Request $request)
    {
        try {
            $id = $request->id;
            DB::beginTransaction();
            $user = $this->user_repository->withTrashed()->find($id)->restore();
            DB::commit();
            $status = 'success';
            $message = 'User has been restored.';
        } catch (\Exception $e) {
            $status = 'error';
            $message = $e->getMessage();
            DB::rollBack();
        }
        return redirect()->route('user.index')->with($status, $message);

    }

    public function dashboard(Request $request)
    {
        $data = $request->all();
        if (isset($request->search)) {
            $search_bool = true;
            $qstring = $request->search;
        } else {
            $search_bool = false;
            $qstring = '';
        }
        return view('modules.home.dashboard', compact('search_bool', 'qstring'));

    }

    public function getProfile()
    {
        $user = auth()->user();
        return view('modules.profile.index', compact('user'));
    }

    private function uploadImage($value)
    {
        $data = $value['image'];
        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);
        $data = base64_decode($data);
        $imageName = time();
        $path = 'img/' . $imageName . '.png';
        file_put_contents(base_path() . '/public/' . $path, $data);
        return $path;
    }

    public function getPassword(Request $request)
    {
        return view('modules.profile.change_password');
    }

    public function getChangepassword(Request $request)
    {
        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            // matches password
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided.");
        }
        if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            //Current and new are the same
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }
        if (strcmp($request->get('new_password'), $request->get('confirm_new_password')) != 0) {return redirect()->back()->with("error", "New password doesn't match the confirm password field.");}
        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:4',
        ]);

        //Change Password
        $user = Auth::user();
        $password = $request->new_password;
        $user->password = bcrypt($password);
        try {
            DB::beginTransaction();
            $user->save();
            DB::commit();
            $status = 'success';
            $message = 'Password has been updated.';
        } catch (\Exception $e) {
            $status = 'error';
            $message = 'Internal Server Error. Try again later.';
            DB::rollBack();
        }
        return redirect()->back()->with($status, $message);
    }

    public function userProfile($id)
    {
        $user = $this->user_repository->find($id);
        return view('profile::public', compact('user'));
    }

    public function acceptTerms() {
        $user = auth()->user();
        try {
            $user->accepted_terms = 1;
            $user->save();
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
        return redirect()->route('dashboard');
    }

    public function profileImage()
    {
        return view('modules.profile.change_profile_image');
    }

    public function changeProfileImage(Request $request)
    {
        $data = $request->all();
        try {
            DB::beginTransaction();
            $filename = time().'.'.$request->file('img')->getClientOriginalExtension();
            $request->file('img')->move(public_path().'/profile_images', $filename);
            $user = auth()->user();
            $user->profile_image = $filename;
            $user->save();
            DB::commit();
            $status = 'success';
            $message = 'Successfully changed profile image!';
        } catch (\Exception $e) {
            DB::rollBack();
            $status = 'error';
            $message = $e->getMessage();
        }
        return redirect()->route('profile.image')->with($status, $message);
    }
}
