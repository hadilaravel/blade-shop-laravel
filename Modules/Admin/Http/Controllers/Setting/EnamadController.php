<?php

namespace Modules\Admin\Http\Controllers\Setting;

use App\Http\Service\ShareService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Setting\Enamad;

class EnamadController extends Controller
{

    public function index()
    {
        $enamad = Enamad::query()->first();
        return view('admin::setting.enamad.index' , compact('enamad'));
    }


    public function edit(Enamad $enamad)
    {
        return view('admin::setting.enamad.edit' , compact('enamad'));
    }


    public function update(Request $request, Enamad $enamad)
    {
        $request->validate([
            'link' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,webp',
        ]);
        $inputs = [
          'link' => $request->link,
        ];
        if($request->hasFile('image')) {
            ShareService::deleteFilePublic($enamad->image);
            $imageName = ShareService::uploadFilePublic($request->file('image') ,'image/logo/enamad');
            $inputs['image'] = $imageName;
        }
        $enamad->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.setting.enamad.index');
    }

}
