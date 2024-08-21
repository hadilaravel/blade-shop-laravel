<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\SettingPayment;

class SettingPaymentController extends Controller
{
    public function index()
    {
        $settingPayment = SettingPayment::query()->first();
        return view('admin::setting.payment.index' , compact('settingPayment'));
    }


    public function edit(SettingPayment $settingPayment)
    {
        return view('admin::setting.payment.edit' , compact('settingPayment'));
    }


    public function update(Request $request, SettingPayment $settingPayment)
    {
        $request->validate([
            'merchant_code' => ['required'],
        ]);
        $inputs = [
           'merchant_code' => $request->merchant_code,
        ];
        $settingPayment->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.setting.payment-setting.index');
    }
}
