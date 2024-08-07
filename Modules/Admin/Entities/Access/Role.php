<?php

namespace Modules\Admin\Entities\Access;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    protected function hasPermission($permission)
    {
        return (bool)$this->permissions->where('name', $permission->name)->count();
    }

    public function hasPermissionTo($permission)
    {
        return $this->hasPermission($permission);
    }

}
