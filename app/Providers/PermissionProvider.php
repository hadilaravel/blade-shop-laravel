<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Modules\Admin\Entities\Access\Permission;

class PermissionProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {

        $permissions = Permission::all();
        foreach ($permissions as $permission){
            Gate::define($permission->name , function ($user) use ($permission){
                return $user->hasPermissionTo($permission);
            });
        }

        Blade::directive('permission' , function ($permission){
            return "<?php
                    if(auth()->check() and auth()->user()->hasPermissionToBlade($permission))
                    {
            ?>
            ";
        });

        Blade::directive('endpermission' , function (){
            return "<?php
            }
            ?>";
        });

    }
}
