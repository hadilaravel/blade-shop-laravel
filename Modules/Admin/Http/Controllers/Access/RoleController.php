<?php

namespace Modules\Admin\Http\Controllers\Access;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Access\Permission;
use Modules\Admin\Entities\Access\Role;
use Modules\Admin\Http\Requests\Access\PermissionRequest;
use Modules\Admin\Http\Requests\Access\RoleRequest;


class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::query()->whereNot('name' ,'super admin')->paginate(8);
        return view('admin::role.index' , compact('roles'));
    }

    public function create()
    {
        return view('admin::role.create');
    }


    public function store(RoleRequest $request)
    {
        $inputs = [
            'name' => $request->name,
            'description' => $request->description,
        ];
        Role::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.role.index');
    }


    public function edit(Role $role)
    {
        return view('admin::role.edit' , compact('role' ));
    }


    public function update(RoleRequest $request, Role $role)
    {
        $inputs = [
            'name' => $request->name,
            'description' => $request->description,
        ];
        $role->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.role.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.role.index');
    }



    public function permissionShow(Role $role)
    {
        $permissions = Permission::all();
        return view('admin::role.set-permission' , compact('permissions' , 'role'));
    }

    public function permissionStore(PermissionRequest $request , Role $role)
    {
        $inputs = $request->all();
        $inputs['permissions'] = $inputs['permissions'] ?? [];
        $role->permissions()->sync($inputs['permissions']);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.role.index');
    }

    public function permissionDelete(Role $role , Permission $permission)
    {
        $role->permissions()->detach($permission->id);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.role.index');
    }

}
