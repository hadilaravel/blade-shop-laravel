<?php

namespace Modules\Admin\Entities\Shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LabelProduct extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'product_id' , 'status'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
