<?php

namespace Modules\Admin\Entities\Shop;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['color_id' , 'product_id' , 'number' , 'user_id' , 'guarantee_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(ProductColor::class);
    }

    public function guarantee()
    {
        return $this->belongsTo(Guarantee::class);
    }


//    productPrice + colorPrice + guaranteePrice
    public function cartItemProductPrice()
    {
        $guaranteePriceIncrease =  empty($this->guarantee_id) ? 0: $this->guarantee->price_increase;
        $colorPriceIncrease =  empty($this->color_id) ? 0: $this->color->price_increase;

        return $this->product->price + $guaranteePriceIncrease + $colorPriceIncrease;

    }

//    productPrice * (discount / 100)

    public function cartItemProductDiscount()
    {
        $cartItemProductPrice = $this->cartItemProductPrice();
        $productDiscount = empty($this->product->activeAmazingSales()) ? 0 : $cartItemProductPrice * ($this->product->activeAmazingSales()->percentage / 100);
        return $productDiscount;
    }

//     number * (productPrice + colorPrice + guaranteePrice - discountPrice)

    public function cartItemFinalPrice()
    {
        $cartItemProductPrice = $this->cartItemProductPrice();
        $productDiscount = $this->cartItemProductDiscount();
        return $this->number * ($cartItemProductPrice - $productDiscount);
    }

//number * productDiscount

    public function cartItemFinalDiscount()
    {
        $productDiscount = $this->cartItemProductDiscount();
        return $this->number * $productDiscount;
    }

}
