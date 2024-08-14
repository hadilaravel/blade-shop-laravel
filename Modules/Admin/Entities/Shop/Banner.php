<?php

namespace Modules\Admin\Entities\Shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = ['image' , 'position' , 'status'];


    public function getBannerPositionAttribute()
    {
        if($this->position == 1){
            $result = 'اسلایدر';
        }
        else if($this->position == 2){
            $result = 'تصویر زیر اسلایدر';
        }
        else if($this->position == 3){
            $result = 'تصویر ها';
        }
        else if($this->position == 4){
            $result = 'دو تصویر';
        }
        else if($this->position == 5){
            $result = 'عکس آخرین پیشنهاد';
        }
        return $result ;
    }

}
