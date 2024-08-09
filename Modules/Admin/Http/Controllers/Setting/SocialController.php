<?php

namespace Modules\Admin\Http\Controllers\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Setting\Social;

class SocialController extends Controller
{


    public function index()
    {
        $title = ' شبکه های اجتماعی';
        $socials = Social::query()->get();
        return view('admin::setting.social.index', compact('socials' ,'title'));
    }



    public function edit(Social $social)
    {
        $title = ' شبکه های اجتماعی';
        return view('admin::setting.social.edit', compact('social' , 'title'));
    }


    public function update(Request $request, Social $social)
    {
        $request->validate([
            'link' => 'required',
        ]);
        $inputs = $request->all();
        $social->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.setting.social.index');
    }


}
