<?php

namespace Modules\Admin\Entities\Access;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;

    protected $fillable = ['name' ];

    public function roles ()
    {
        return $this->belongsToMany(Role::class );
    }

    public function users ()
    {
        return $this->belongsToMany(User::class );
    }


    public Const PermissionAccess = 'PermissionAccess';


    public static array $permissions = [
        self::PermissionAccess,
    ];


}
