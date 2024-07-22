<?php

namespace Modules\Admin\Http\Controllers\Shop;

use App\Http\Service\ShareService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop\Brand;
use Modules\Admin\Http\Requests\Shop\BrandRequest;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::query()->latest()->paginate(8);
        return view('admin::shop.brand.index' , compact('brands'));
    }

    public function create()
    {
        return view('admin::shop.brand.create' );
    }


    public function store(BrandRequest $request)
    {
        $inputs = [
            'persian_name' => $request->persian_name,
            'original_name' => $request->original_name,
            'status'=> $request->status,
        ];
        $inputs['slug'] = persianSlug($request->persian_name);
        if($request->hasFile('logo')) {
            $imageName = ShareService::uploadFilePublic($request->file('logo') ,'image/shop/brand');
            $inputs['logo'] = $imageName;
        }
        Brand::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.brand.index');
    }

    public function edit(Brand $brand)
    {
        return view('admin::shop.brand.edit' , compact('brand'));
    }

    public function update(BrandRequest $request , Brand $brand)
    {
        $inputs = [
            'persian_name' => $request->persian_name,
            'original_name' => $request->original_name,
            'status'=> $request->status,
        ];
        $inputs['slug'] = persianSlug($request->persian_name);
        if($request->hasFile('logo')) {
            ShareService::deleteFilePublic($brand->logo);
            $imageName = ShareService::uploadFilePublic($request->file('logo') ,'image/shop/brand');
            $inputs['logo'] = $imageName;
        }
        $brand->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.brand.index');
    }

    public function destroy(Brand $brand)
    {
        ShareService::deleteFilePublic($brand->logo);
        $brand->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.brand.index');
    }

    public function status(Brand $brand)
    {
        $brand->status = $brand->status == 0 ? 1 : 0;
        $brand->save();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.brand.index');
    }

}
