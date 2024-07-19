<?php

namespace Modules\Admin\Entities\Blog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Label extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'post_id',
        'status'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }


}
