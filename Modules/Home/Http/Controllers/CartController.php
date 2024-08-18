<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Entities\Shop\CartItem;
use Modules\Admin\Entities\Shop\Product;

class CartController extends Controller
{

    public function addToCart(Product $product , Request $request)
    {

        if(Auth::check()){

            $request->validate([
                'color' => 'nullable|exists:product_colors,id',
                'guarantee' => 'nullable|exists:guarantees,id',
                'number' => 'numeric|min:1|max:5',
            ]);


            $cartItems = CartItem::query()->where('product_id' , $product->id)->where('user_id' , \auth()->user()->id)->get();

            if(!isset($request->color)){
                $request->color = null;
            }
            if(!isset($request->guarantee)){
                $request->guarantee = null;
            }

            foreach($cartItems as $cartItem){

                if($cartItem->color_id == $request->color && $cartItem->guarantee_id == $request->guarantee){
                    if($cartItem->number != $request->number){
                        $cartItem->update(['number' => $request->number]);
                    }
                    return redirect()->back();
                }

            }

            $inputs = [];
            $inputs['color_id'] = $request->color;
            $inputs['number'] = $request->number;
            $inputs['guarantee_id'] = $request->guarantee;
            $inputs['user_id'] = \auth()->id();
            $inputs['product_id'] = $product->id;

            CartItem::query()->create($inputs);

            alert()->success('محصول مورد نظر با موفقیت به سبد خرید اضافه شد');
            return back();
        }else{
            return to_route('auth.register.view');
        }

    }

    public function cartItems()
    {
        if(Auth::check()) {

            $cartItems = CartItem::query()->where('user_id' , \auth()->id())->get();
            if($cartItems->count() > 0)
            {
                return view('home::home.cart-item' , compact('cartItems'));
            }else{
                return back();
            }

        }else{
            return to_route('auth.register.view');
        }
    }

    public function removeFromCart(CartItem $cartItem)
    {
        if($cartItem->user_id === \auth()->id()){
            $cartItem->delete();
        }
        $cartItems = CartItem::query()->where('user_id' , \auth()->id())->get();
        if($cartItems->count() > 0)
        {
            alert()->success('محصول مورد نظر با موفقیت از سبد خرید حذف شد');
            return back();
        }else{
            alert()->success('محصول مورد نظر با موفقیت از سبد خرید حذف شد');
            return to_route('home.index');
        }

    }

}
