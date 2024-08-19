<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Service\ShareService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\About;
use Modules\Admin\Http\Requests\AboutRequest;

class AboutController extends Controller
{

    public function index()
    {
        $about = About::query()->first();
        return view('admin::about.index' , compact('about'));
    }


    public function edit(About $about)
    {
        return view('admin::about.edit' , compact('about'));
    }


    public function update(AboutRequest $request, About $about)
    {
        $inputs = [
            'title' => $request->title,
            'body' => $request->body,
        ];
        if($request->hasFile('image')) {
            ShareService::deleteFilePublic($about->image);
            $imageName = ShareService::uploadFilePublic($request->file('image') ,'image/about');
            $inputs['image'] = $imageName;
        }
        $about->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.about.index');
    }

}
