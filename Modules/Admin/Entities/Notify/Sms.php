<?php

namespace Modules\Admin\Entities\Notify;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sms extends Model
{
    use HasFactory;

    protected $table = 'sms';

    protected $fillable = ['title' , 'status' , 'body' , 'published_at'];

}
