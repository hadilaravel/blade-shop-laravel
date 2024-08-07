<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\Admin\Entities\Access\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        admin
       User::query()->create([
           'name' => 'admin',
           'username' => 'admin',
           'password' => bcrypt('Admin@22'),
           'user_type' => 1,
           'activation' => 1,
           'status' => 1,
           'profile' => 'image/admin/admin.png'
       ]);


        foreach (Permission::$permissions as $permission)
        {
            $permissionExists = Permission::query()->where('name' , $permission)->first();
            if(empty($permissionExists)) {
                Permission::query()->create([
                    'name' => $permission,
                ]);
            }

        }


    }
}
