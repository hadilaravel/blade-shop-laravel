<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Entities\Shop\Product;

class OrderItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function singleProduct()
    {
        return $this->belongsTo(Product::class , 'product_id');
    }

}
