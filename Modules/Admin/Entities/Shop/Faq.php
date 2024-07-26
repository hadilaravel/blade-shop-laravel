<?php

namespace Modules\Admin\Entities\Shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = ['question' , 'answer' , 'status'];


}
