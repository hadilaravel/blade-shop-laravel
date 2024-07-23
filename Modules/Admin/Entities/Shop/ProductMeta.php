<?php

namespace Modules\Admin\Entities\Shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductMeta extends Model
{
    use HasFactory;

    protected $fillable = ['meta_key' , 'meta_value' , 'product_id'];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
