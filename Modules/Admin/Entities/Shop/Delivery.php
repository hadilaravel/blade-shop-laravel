<?php

namespace Modules\Admin\Entities\Shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Delivery extends Model
{
    use HasFactory;

    protected $table = 'delivery';

    protected $fillable = ['name' , 'amount' , 'delivery_time' , 'delivery_time_unit' , 'status'];


}
