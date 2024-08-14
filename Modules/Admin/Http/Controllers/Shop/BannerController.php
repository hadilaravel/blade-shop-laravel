<?php

namespace Modules\Admin\Http\Controllers\Shop;

use App\Http\Service\ShareService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop\Banner;
use Modules\Admin\Http\Requests\Shop\ProductCategoryRequest;

class BannerController extends Controller
{

    public function index()
    {
        $title = 'بنر ها';
        $banners = Banner::query()->latest()->paginate(8);
        return view('admin::shop.banner.index' , compact('banners' , 'title'));
    }


    public function create()
    {
        $title = 'بنر ها';
        return view('admin::shop.banner.create' , compact('title') );
    }


    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,webp',
            'position' => 'required|numeric|in:1,2,3,4,5',
            'status' => 'required|numeric|in:0,1',
        ]);

        $inputs = $request->all();
        if($request->hasFile('image')) {
            $imageName = ShareService::uploadFilePublic($request->file('image') ,'image/shop/banners');
            $inputs['image'] = $imageName;
        }
        Banner::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.banner.index');
    }


    public function edit(Banner $banner)
    {
        $title = 'بنر ها';
        return view('admin::shop.banner.edit' , compact('banner' , 'title'));
    }


    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,webp',
            'position' => 'required|numeric|in:1,2,3,4,5',
            'status' => 'required|numeric|in:0,1',
        ]);

        $inputs = $request->all();
        if($request->hasFile('image')) {
            ShareService::deleteFilePublic($banner->image);
            $imageName = ShareService::uploadFilePublic($request->file('image') ,'image/shop/banners');
            $inputs['image'] = $imageName;
        }
        $banner->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.banner.index');
    }

    public function destroy(Banner $banner)
    {
        ShareService::deleteFilePublic($banner->image);
        $banner->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.banner.index');
    }

    public function status(Banner $banner)
    {
        $banner->status = $banner->status == 0 ? 1 : 0;
        $banner->save();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.banner.index');
    }

}
