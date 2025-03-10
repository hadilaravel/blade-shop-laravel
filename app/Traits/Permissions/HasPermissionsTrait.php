<?php

namespace App\Traits\Permissions;




use Modules\Admin\Entities\Access\Permission;
use Modules\Admin\Entities\Access\Role;

trait HasPermissionsTrait
{

    public function permissions ()
    {
        return $this->belongsToMany(Permission::class );
    }

    public function roles ()
    {
        return $this->belongsToMany(Role::class );
    }


    protected function hasPermission($permission)
    {
        return (bool) $this->permissions->where('name' , $permission->name)->count();
    }


    public function hasPermissionTo($permission)
    {
        return  $this->hasPermissionThroughRole($permission);
    }

    public function hasPermissionToBlade($permission)
    {
        $permission = Permission::query()->where('name' , $permission)->first();
        foreach ($permission->roles as $role){
            if($this->roles->contains($role)){
                return true;
            }
        }
        return false;
    }

    public function hasPermissionThroughRole($permission)
    {
        foreach ($permission->roles as $role){
            if($this->roles->contains($role) ){
                return true;
            }
        }
        return false;
    }

    public function hasRole(...$roles)
    {
        foreach ($roles as $role) {
            if($this->roles->contains('name' , $role)){
                return true;
            }
        }
        return false;
    }

}
