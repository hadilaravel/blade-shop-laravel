<?php

namespace Modules\Admin\Entities\Notify;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Email extends Model
{
    use HasFactory;

    protected $fillable = ['title' , 'status' , 'body' , 'published_at'];

}
