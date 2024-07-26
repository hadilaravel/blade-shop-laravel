<?php

namespace Modules\Admin\Entities\Shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Copan extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'amount',
        'amount_type',
        'discount_ceiling',
        'type',
        'status',
        'use',
        'start_date',
        'end_date',
        'user_id',
    ];


}
