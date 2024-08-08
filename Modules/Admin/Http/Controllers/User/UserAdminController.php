<?php

namespace Modules\Admin\Http\Controllers\User;

use App\Http\Service\ShareService;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Access\Role;
use Modules\Admin\Http\Requests\Admin\UserAdminRequest;

class UserAdminController extends Controller
{

    public function index()
    {
        $userAdmins = User::query()->where('user_type' , 1)->get();
        return view('admin::user.user-admin.index' , compact('userAdmins'));
    }

    public function create()
    {
        return view('admin::user.user-admin.create');
    }


    public function store(UserAdminRequest $request)
    {
        $request->password = Hash::make($request->password);
        $inputs = [
            'name' => $request->name,
            'password' => $request->password,
            'activation' => $request->activation,
            'user_type'=> 1,
        ];
        if($request->hasFile('profile')) {
            $imageName = ShareService::uploadFilePublic($request->file('profile') ,'profile/user-admin');
            $inputs['profile'] = $imageName;
        }
        User::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.user-admin.index');
    }


    public function edit(User $user)
    {
        return view('admin::user.user-admin.edit' , compact('user' ));
    }


    public function update(UserAdminRequest $request, User $user)
    {
        if(!empty($request->password)) {
            $request->password = Hash::make($request->password);
        }
        $inputs = [
            'name' => $request->name,
            'password' => $request->password,
            'activation' => $request->activation,
            'user_type'=> 1,
        ];
        if($request->hasFile('profile')) {
            ShareService::deleteFilePublic($user->profile);
            $imageName = ShareService::uploadFilePublic($request->file('profile') ,'profile/user-admin');
            $inputs['profile'] = $imageName;
        }
        $user->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.user-admin.index');
    }

    public function destroy(User $user)
    {
        ShareService::deleteFilePublic($user->profile);
        $user->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.user-admin.index');
    }

    public function status(User $user)
    {
        $user->activation = $user->activation == 0 ? 1 : 0;
        $user->save();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.user-admin.index');
    }


    public function roleShow(User $user)
    {
        $roles = Role::all();
        return view('admin::user.user-admin.set-role' , compact('user' , 'roles'));
    }

    public function roleStore(Request $request , User $user)
    {
        $request->validate([
            'role' => 'required|exists:roles,id',
        ]);
        $user->roles()->sync($request->role);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.user-admin.index');
    }

    public function roleDelete(User $user , Role $role)
    {
        $user->roles()->detach($role->id);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.user-admin.index');
    }

}
