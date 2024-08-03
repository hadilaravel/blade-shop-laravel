<?php

namespace Modules\Admin\Entities\Shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AmazingSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'percentage',
        'status',
        'start_date',
        'end_date',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
