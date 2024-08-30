<?php

namespace Modules\Admin\Entities\Shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'slug' , 'status' , 'image' , 'parent_id' , 'status_header'];


    public function parent()
    {
        return $this->belongsTo(ProductCategory::class , 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(ProductCategory::class , 'parent_id');
    }

    public function activeChildren()
    {
        return $this->children()->where('status' , 1)->where('status_header' , 1);
    }

    public function products()
    {
        return $this->hasMany(Product::class , 'category_id');
    }

}
