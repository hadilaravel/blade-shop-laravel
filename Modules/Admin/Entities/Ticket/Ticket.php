<?php

namespace Modules\Admin\Entities\Ticket;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'image',
        'status',
        'seen',
        'user_id',
        'category_id',
        'ticket_id',
    ];




}
