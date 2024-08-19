<?php

namespace Modules\Admin\Entities\Shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'slug' , 'status' , 'image' , 'parent_id'];


    public function parent()
    {
        return $this->belongsTo(ProductCategory::class , 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(ProductCategory::class , 'parent_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class , 'category_id');
    }

}
