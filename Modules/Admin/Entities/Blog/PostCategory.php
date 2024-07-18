<?php

namespace Modules\Admin\Entities\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PostCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name' , 'slug' , 'status' , 'parent_id'];


    public function parent()
    {
        return $this->belongsTo(PostCategory::class , 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(PostCategory::class , 'parent_id');
    }

}
