<?php

namespace Modules\Admin\Entities\Shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfflinePayment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function payments()
    {
        return $this->morphMany(Payment::class , 'paymentable');
    }
}
