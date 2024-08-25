<?php

namespace Modules\Admin\Entities\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Enamad extends Model
{
    use HasFactory;

    protected $fillable = ['image' , 'link'];

}
