<?php

namespace Modules\Admin\Entities\Ticket;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TicketCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status'
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class , 'category_id');
    }

}
