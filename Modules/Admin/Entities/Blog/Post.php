<?php

namespace Modules\Admin\Entities\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'body',
        'image',
        'status',
        'commentable',
        'category_id'
    ];


    public function category()
    {
        return $this->belongsTo(PostCategory::class  , 'category_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class , 'commentable');
    }

    public function activeComments()
    {
        return $this->comments()->where('status' , 1)->whereNull('parent_id')->latest()->get();
    }

}
