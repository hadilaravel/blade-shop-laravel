<?php

namespace Modules\Admin\Http\Controllers\Shop;

use App\Http\Service\ShareService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop\Brand;
use Modules\Admin\Entities\Shop\Product;
use Modules\Admin\Entities\Shop\ProductCategory;
use Modules\Admin\Http\Requests\Shop\ProductRequest;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::query()->latest()->paginate(8);
        return view('admin::shop.product.index' , compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::query()->where('status' , 1)->get();
        $brands = Brand::query()->where('status' , 1)->get();
        return view('admin::shop.product.create' , compact('categories' , 'brands'));
    }


    public function store(ProductRequest $request)
    {
        $inputs = $request->all();
        $inputs['slug'] = persianSlug($request->name);
        if($request->hasFile('image')) {
            $imageName = ShareService::uploadFilePublic($request->file('image') ,'image/shop/product');
            $inputs['image'] = $imageName;
        }
        Product::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.product.index');
    }


    public function edit(Product $product)
    {
        $categories = ProductCategory::query()->where('status' , 1)->get();
        $brands = Brand::query()->where('status' , 1)->get();
        return view('admin::shop.product.edit' , compact('categories' , 'brands' , 'product'));
    }

    public function update(ProductRequest $request , Product $product)
    {
        $inputs = $request->all();
        $inputs['slug'] = persianSlug($request->name);
        if($request->hasFile('image')) {
            ShareService::deleteFilePublic($product->image);
            $imageName = ShareService::uploadFilePublic($request->file('image') ,'image/shop/product');
            $inputs['image'] = $imageName;
        }
        $product->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.product.index');
    }

    public function destroy(Product $product)
    {
        ShareService::deleteFilePublic($product->image);
        $product->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.product.index');
    }

    public function status(Product $product)
    {
        $product->status = $product->status == 0 ? 1 : 0;
        $product->save();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.product.index');
    }

}
