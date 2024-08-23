<?php

namespace Modules\Home\Http\Controllers;

use App\Http\Service\Payment\PaymentService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Modules\Admin\Entities\OrderItem;
use Modules\Admin\Entities\SettingPayment;
use Modules\Admin\Entities\Shop\CartItem;
use Modules\Admin\Entities\Shop\CashPayment;
use Modules\Admin\Entities\Shop\Copan;
use Modules\Admin\Entities\Shop\OnlinePayment;
use Modules\Admin\Entities\Shop\Order;
use Modules\Admin\Entities\Shop\Payment;

class PaymentController extends Controller
{

    public function payment()
    {
        $user = auth()->user();
        $cartItems = CartItem::query()->where('user_id', $user->id)->get();
        $order = Order::query()->where('user_id', $user->id)->where('order_status', 0)->first();
        return view('home::customer.payment', compact('cartItems', 'order'));
    }

    public function copanDiscount(Request $request)
    {
        $request->validate(
            ['copan' => 'required']
        );

        $copan = Copan::query()->where([['code', $request->copan], ['status', 1], ['end_date', '>', now()], ['start_date', '<', now()]])->first();
        if ($copan != null) {
            if ($copan->user_id != null) {
                $copan = Copan::query()->where([['code', $request->copan], ['status', 1], ['end_date', '>', now()], ['start_date', '<', now()], ['user_id', \auth()->id()]])->first();
                if ($copan == null) {
                    return back()->withErrors(['copan' => 'کد تخفیف اشتباه وارد شده است']);
                }
            }

            $order = Order::query()->where('user_id', \auth()->id())->where('order_status', 0)->where('copan_id', null)->first();

            if ($order) {
                if ($copan->amount_type == 0) {
                    $copanDiscountAmount = $order->order_final_amount * ($copan->amount / 100);
                    if ($copanDiscountAmount > $copan->discount_ceiling) {
                        $copanDiscountAmount = $copan->discount_ceiling;
                    }
                } else {
                    $copanDiscountAmount = $copan->amount;
                }

                $order->order_final_amount = $order->order_final_amount - $copanDiscountAmount;

                $finalDiscount = $order->order_total_products_discount_amount + $copanDiscountAmount;

                $order->update(
                    ['copan_id' => $copan->id, 'order_copan_discount_amount' => $copanDiscountAmount, 'order_total_products_discount_amount' => $finalDiscount]
                );
                alert()->success('کد تخفیف با موفقیت اعمال شد');
                return back();
            } else {
                return back()->withErrors(['copan' => 'کد تخفیف اشتباه وارد شده است']);
            }
        } else {
            return back()->withErrors(['copan' => 'کد تخفیف اشتباه وارد شده است']);
        }
    }


    public function paymentSubmit(Request $request, PaymentService $paymentService)
    {
        $request->validate(
            ['payment_type' => 'required']
        );

        $order = Order::query()->where('user_id', Auth::user()->id)->where('order_status', 0)->first();
        $cartItems = CartItem::query()->where('user_id', Auth::user()->id)->get();
        $cash_receiver = null;

        switch ($request->payment_type) {
            case '1':
                $targetModel = OnlinePayment::class;
                $type = 0;
                $paymentType = 0;
                break;
            case '2':
                $targetModel = CashPayment::class;
                $type = 2;
                $paymentType = 2;
                $cash_receiver = $request->cash_receiver ? $request->cash_receiver : null;
                break;
            default:
                return back()->withErrors(['error' => 'خطا']);
        }

        $paymented = $targetModel::create([
            'amount' => $order->order_final_amount,
            'user_id' => \auth()->id(),
            'pay_date' => now(),
            'cash_receiver' => $cash_receiver,
            'status' => 1,
        ]);

        $payment = Payment::query()->create(
            [
                'amount' => $order->order_final_amount,
                'user_id' => auth()->user()->id,
                'pay_date' => now(),
                'type' => $type,
                'paymentable_id' => $paymented->id,
                'paymentable_type' => $targetModel,
                'status' => 1,
            ]
        );

        if ($request->payment_type == 1) {
            $order->update(
                ['payment_type' => $paymentType]
            );
            $merchantCode = SettingPayment::query()->first();
             Config::set('payment.drivers.zarinpal.merchantId', $merchantCode->merchant_code);
//            $val = Config::get('payment.drivers.zarinpal.merchantId');
//            dd($val);
            $paymentPage = $paymentService->zarinpal($order, $paymented);
            return redirect()->away($paymentPage);
        } else {
            $order->update(
                ['order_status' => 3, 'payment_type' => $paymentType]
            );
            foreach ($cartItems as $cartItem) {

                OrderItem::query()->create([
                    'order_id' => $order->id,
                    'product_id' => $cartItem->product_id,
                    'product' => $cartItem->product,
                    'amazing_sale_id' => $cartItem->product->activeAmazingSales()->id ?? null,
                    'amazing_sale_object' => $cartItem->product->activeAmazingSales() ?? null,
                    'amazing_sale_discount_amount' => empty($cartItem->product->activeAmazingSales()) ? 0 : $cartItem->cartItemProductPrice() * ($cartItem->product->activeAmazingSales()->percentage / 100),
                    'number' => $cartItem->number,
                    'final_product_price' => empty($cartItem->product->activeAmazingSales()) ? $cartItem->cartItemProductPrice() : ($cartItem->cartItemProductPrice() - $cartItem->cartItemProductPrice() * ($cartItem->product->activeAmazingSales()->percentage / 100)),
                    'final_total_price' => empty($cartItem->product->activeAmazingSales()) ? $cartItem->cartItemProductPrice() * ($cartItem->number) : ($cartItem->cartItemProductPrice() - $cartItem->cartItemProductPrice() * ($cartItem->product->activeAmazingSales()->percentage / 100)) * ($cartItem->number),
                    'color_id' => $cartItem->color_id,
                    'guarantee_id' => $cartItem->guarantee_id,
                ]);

                $cartItem->delete();
            }

            alert()->success('سفارش شما با موفقیت پرداخت انجام شد');
            return to_route('home.index');
        }

    }

    public function paymentCallback(Request $request, Order $order, OnlinePayment $onlinePayment, paymentService $paymentService)
    {

        $amount = $onlinePayment->amount * 10;
        $cartItems = CartItem::query()->where('user_id', Auth::user()->id)->get();

        foreach ($cartItems as $cartItem) {
            OrderItem::query()->create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product' => $cartItem->product,
                'amazing_sale_id' => $cartItem->product->activeAmazingSales()->id ?? null,
                'amazing_sale_object' => $cartItem->product->activeAmazingSales() ?? null,
                'amazing_sale_discount_amount' => empty($cartItem->product->activeAmazingSales()) ? 0 : $cartItem->cartItemProductPrice() * ($cartItem->product->activeAmazingSales()->percentage / 100),
                'number' => $cartItem->number,
                'final_product_price' => empty($cartItem->product->activeAmazingSales()) ? $cartItem->cartItemProductPrice() : ($cartItem->cartItemProductPrice() - $cartItem->cartItemProductPrice() * ($cartItem->product->activeAmazingSales()->percentage / 100)),
                'final_total_price' => empty($cartItem->product->activeAmazingSales()) ? $cartItem->cartItemProductPrice() * ($cartItem->number) : ($cartItem->cartItemProductPrice() - $cartItem->cartItemProductPrice() * ($cartItem->product->activeAmazingSales()->percentage / 100)) * ($cartItem->number),
                'color_id' => $cartItem->color_id,
                'guarantee_id' => $cartItem->guarantee_id,
            ]);

            $cartItem->delete();
        }

        $bankResponse = [
            'Status' => $request->Status,
            'Authority' => $request->Authority,
        ];

        $onlinePayment->update([
            'bank_first_response' => json_encode($bankResponse),
        ]);

        if($request->Status == "OK"){

            $result = $paymentService->zarinpalVerify((int)$order->order_final_amount , $onlinePayment);
            if($result){
                $onlinePayment->update([
                    'bank_second_response' => json_encode($result),
                ]);
                $order->update([
                    "payment_status" => 1,
                ]);
                alert()->success('سفارش شما با موفقیت پرداخت انجام شد');
                return to_route('home.index');            }

        }else{
            $errorMessage =$paymentService->zarinpalVerify((int)$order->order_final_amount , $onlinePayment);
            $onlinePayment->update([
                'bank_second_response' => $errorMessage,
            ]);
            alert()->error('پرداخت ناموفق بود ! !');
            return to_route('home.index');
        }

    }




}
