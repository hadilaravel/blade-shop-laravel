<?php

namespace Modules\Admin\Entities\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Social extends Model
{
    use HasFactory;

    protected $fillable = [ 'name_id' ,'link'];

}
