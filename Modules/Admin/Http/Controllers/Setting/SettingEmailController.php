<?php

namespace Modules\Admin\Http\Controllers\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Setting\SettingEmail;

class SettingEmailController extends Controller
{

    public function index()
    {
        $settingEmail = SettingEmail::query()->first();
        return view('admin::setting.email.index' , compact('settingEmail'));
    }


    public function edit(SettingEmail $settingEmail)
    {
        return view('admin::setting.email.edit' , compact('settingEmail'));
    }


    public function update(Request $request, SettingEmail $settingEmail)
    {
        $request->validate([
           'name' => 'required',
            'password' => 'required',
        ]);
        $inputs = [
            'name' => $request->name,
            'password' => $request->password,
        ];
        $settingEmail->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.setting.email-setting.index');
    }

}
