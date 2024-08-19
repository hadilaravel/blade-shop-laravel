<?php

namespace Modules\Admin\Entities\Shop;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Entities\Blog\Comment;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'weight',
        'length',
        'width',
        'height',
        'price',
        'status',
        'marketable',
        'sold_number',
        'frozen_number',
        'marketable_number',
        'introduction',
        'brand_id',
        'category_id',
        'view',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(ProductCategory::class , 'category_id');
    }

    public function colors()
    {
        return $this->hasMany(ProductColor::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function guarantees()
    {
        return $this->hasMany(Guarantee::class);
    }

    public function metas()
    {
        return $this->hasMany(ProductMeta::class);
    }

    public function amazingSales()
    {
        return $this->hasMany(AmazingSale::class);
    }

    public function activeAmazingSales()
    {
        return $this->amazingSales()->where('status' , 1)->where('start_date' , '<' , Carbon::now())->where('end_date' , '>' , Carbon::now())->first();
    }

    public function comments()
    {
        return $this->morphMany(Comment::class , 'commentable');
    }

    public function activeComments()
    {
        return $this->comments()->where('status' , 1)->whereNull('parent_id')->latest()->get();
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
