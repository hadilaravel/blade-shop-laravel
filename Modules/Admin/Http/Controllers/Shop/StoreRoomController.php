<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\OrderItem;
use Modules\Admin\Entities\Shop\Product;

class StoreRoomController extends Controller
{

    public function index()
    {
        $orderItems = OrderItem::query()->get();
        foreach ($orderItems as $orderItem)
        {
            $orderItem->singleProduct->marketable_number = $orderItem->singleProduct->marketable_number - $orderItem->number;
            $orderItem->singleProduct->sold_number += $orderItem->number;
            $productOrder = $orderItem->singleProduct;
            $productOrder->save();
        }
        $products = Product::all();
        return view('admin::shop.storeroom.index' , compact('products'));
    }


   public function add(Product $product)
   {
       return view('admin::shop.storeroom.add-to-store' , compact('product'));
   }

   public function store(Request $request , Product $product)
   {
    $request->validate([
        'marketable_number' => 'required|numeric'
    ]);
       $product->marketable_number += $request->marketable_number;
       $product->save();
       alert()->success('عملیات با موفقیت انجام شد');
       return to_route('admin.shop.storeroom.index');
   }


   public function edit(Product $product)
   {
       return view('admin::shop.storeroom.edit' , compact('product'));
   }

   public function update(Request $request , Product $product)
   {
       $request->validate([
           'marketable_number' => 'required|numeric',
           'frozen_number' => 'required|numeric',
           'sold_number' => 'required|numeric'
       ]);
       $inputs = $request->all();
       $product->update($inputs);
       alert()->success('عملیات با موفقیت انجام شد');
       return to_route('admin.shop.storeroom.index');
   }

}
