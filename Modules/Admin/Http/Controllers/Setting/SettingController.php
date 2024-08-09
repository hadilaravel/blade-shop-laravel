<?php

namespace Modules\Admin\Http\Controllers\Setting;

use App\Http\Service\ShareService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Setting\Setting;
use Modules\Admin\Http\Requests\Setting\SettingRequest;

class SettingController extends Controller
{

    public function index()
    {
        $setting = Setting::query()->first();
        return view('admin::setting.setting.index' , compact('setting'));
    }

    public function edit(Setting $setting)
    {
        return view('admin::setting.setting.edit' , compact('setting'));
    }

    public function update(SettingRequest $request , Setting $setting)
    {
        $inputs = $request->all();

        if($request->hasFile('icon')) {
            ShareService::deleteFilePublic($setting->icon);
            $imageName = ShareService::uploadFilePublic($request->file('icon') ,'image/setting');
            $inputs['icon'] = $imageName;
        }
        if($request->hasFile('logo_footer')) {
            ShareService::deleteFilePublic($setting->logo_footer);
            $imageName = ShareService::uploadFilePublic($request->file('logo_footer') ,'image/setting/logo-footer');
            $inputs['logo_footer'] = $imageName;
        }
        if($request->hasFile('logo_header')) {
            ShareService::deleteFilePublic($setting->logo_header);
            $imageName = ShareService::uploadFilePublic($request->file('logo_header') ,'image/setting/logo-header');
            $inputs['logo_header'] = $imageName;
        }

        $setting->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.setting.index');
    }

}
