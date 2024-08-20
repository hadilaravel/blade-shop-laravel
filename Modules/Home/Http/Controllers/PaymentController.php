<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop\CartItem;
use Modules\Admin\Entities\Shop\Order;

class PaymentController extends Controller
{

    public function payment()
    {
        $user = auth()->user();
        $cartItems = CartItem::query()->where('user_id', $user->id)->get();
        $order = Order::query()->where('user_id', $user->id)->where('order_status', 0)->first();
        return view('customer.sales-process.payment', compact('cartItems', 'order'));
    }

}
