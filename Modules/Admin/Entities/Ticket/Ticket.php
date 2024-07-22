<?php

namespace Modules\Admin\Entities\Ticket;

use App\Models\User;
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(TicketCategory::class);
    }

    public function parent()
    {
        return $this->belongsTo($this , 'ticket_id');
    }

    public function answers ()
    {
        return $this->hasMany($this , 'ticket_id');
    }

}
