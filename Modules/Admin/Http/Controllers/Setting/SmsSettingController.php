<?php

namespace Modules\Admin\Http\Controllers\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Setting\SmsSetting;
use Modules\Admin\Http\Requests\Setting\SmsSettingRequest;

class SmsSettingController extends Controller
{

    public function index()
    {
        $smsSetting = SmsSetting::query()->first();
        return view('admin::setting.sms.index' , compact('smsSetting'));
    }


    public function edit(SmsSetting $smsSetting)
    {
        return view('admin::setting.sms.edit' , compact('smsSetting'));
    }


    public function update(SmsSettingRequest $request, SmsSetting $smsSetting)
    {
        $inputs = [
            'username' => $request->username,
            'password' => $request->password,
            'from' => $request->from,
        ];
        $smsSetting->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.setting.sms-setting.index');
    }


}
