<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop\Order;

class OrderController extends Controller
{

    public function newOrders()
    {
        $title = 'سفارشات جدید';
        $orders = Order::query()->where('order_status' , 0)->get();
        foreach ($orders as $order){
            $order->order_status = 1;
            $order->save();
        }
        return view('admin::shop.order.index' , compact('orders' , 'title'));
    }
    public function sending()
    {
        $title = 'سفارشات در حال ارسال';
        $orders = Order::query()->where('delivery_status' , 1)->get();
        return view('admin::shop.order.index' , compact('orders' , 'title'));
    }
    public function unpaid()
    {
        $title = 'سفارشات پرداخت نشده';
        $orders = Order::query()->where('payment_status' , 0)->get();
        return view('admin::shop.order.index' , compact('orders' , 'title'));
    }
    public function canceled()
    {
        $title = 'سفارشات باطل شده';
        $orders = Order::query()->where('order_status' , 4)->get();
        return view('admin::shop.order.index' , compact('orders' , 'title'));
    }
    public function returned()
    {
        $title = 'سفارشات مرجوعی';
        $orders = Order::query()->where('order_status' , 5)->get();
        return view('admin::shop.order.index' , compact('orders' , 'title'));
    }
    public function all()
    {
        $title = 'تمام سفارشات';
        $orders = Order::all();
        return view('admin::shop.order.index' , compact('orders' , 'title'));
    }
    public function show(Order $order)
    {
        return view('admin::shop.order.show' , compact('order'));
    }
    public function changeSendStatus(Order $order)
    {
        switch ($order->delivery_status){
            case 0:
                $order->delivery_status = 1;
                break;
            case 1:
                $order->delivery_status = 2;
                break;
            case 2:
                $order->delivery_status = 3;
                break;
            default :
                $order->delivery_status = 0;
        }
        $order->save();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.order.all');
    }
    public function changeOrderStatus(Order $order)
    {
        switch ($order->order_status){
            case 1:
                $order->order_status = 2;
                break;
            case 2:
                $order->order_status = 3;
                break;
            case 3:
                $order->order_status = 4;
                break;
            case 4:
                $order->order_status = 5;
                break;
            case 5:
                $order->order_status = 6;
                break;
            default :
                $order->order_status = 0;
        }
        $order->save();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.order.all');
    }

    public function cancelOrder(Order $order)
    {
        $order->order_status = 4;
        $order->save();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.order.all');
    }

    public function detail(Order $order)
    {
        return view('admin.market.order.detail' , compact('order'));
    }

}
