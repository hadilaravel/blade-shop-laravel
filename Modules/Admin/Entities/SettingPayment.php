<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SettingPayment extends Model
{
    use HasFactory;

    protected $fillable = ['merchant_code'];

}
