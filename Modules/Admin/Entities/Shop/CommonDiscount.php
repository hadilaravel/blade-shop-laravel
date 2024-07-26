<?php

namespace Modules\Admin\Entities\Shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommonDiscount extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'percentage',
        'discount_ceiling',
        'minimal_order_amount',
        'status',
        'start_date',
        'end_date',
    ];

}
