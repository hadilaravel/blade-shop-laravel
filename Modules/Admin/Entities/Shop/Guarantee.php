<?php

namespace Modules\Admin\Entities\Shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guarantee extends Model
{
    use HasFactory;

    protected $fillable = ['name' ,'product_id' ,'price_increase' ,'status'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
