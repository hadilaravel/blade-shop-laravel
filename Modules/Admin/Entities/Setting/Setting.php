<?php

namespace Modules\Admin\Entities\Setting;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'keywords',
        'description',
        'icon',
        'body',
        'logo_footer',
        'logo_header',
    ];

}
