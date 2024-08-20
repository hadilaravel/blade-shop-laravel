<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop\Payment;

class PaymentController extends Controller
{

    public function index()
    {
        $title = 'تمام پرداخت ها';
        $payments = Payment::all();
        return view('admin::shop.payment.index' , compact('payments' , 'title'));
    }
    public function online()
    {
        $title = 'پرداخت های آنلاین';
        $payments = Payment::query()->where('paymentable_type' , 'Modules\Admin\Entities\Shop\OnlinePayment')->get();
        return view('admin::shop.payment.index' , compact('payments' , 'title'));
    }
    public function cash()
    {
        $title = 'پرداخت های در محل';
        $payments = Payment::query()->where('paymentable_type' , 'Modules\Admin\Entities\Shop\CashPayment')->get();
        return view('admin::shop.payment.index' , compact('payments' , 'title'));
    }
    public function canceled(Payment $payment)
    {
        $payment->status = 2;
        $payment->save();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.payment.index');
    }

    public function returned(Payment $payment)
    {
        $payment->status = 3;
        $payment->save();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.payment.index');
    }

    public function show(Payment $payment)
    {
        return view('admin::shop.payment.show' , compact('payment'));
    }

}
