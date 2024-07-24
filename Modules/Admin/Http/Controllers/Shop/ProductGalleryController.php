<?php

namespace Modules\Admin\Http\Controllers\Shop;

use App\Http\Service\ShareService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop\Product;
use Modules\Admin\Entities\Shop\ProductImage;

class ProductGalleryController extends Controller
{

    public function index(Product $product)
    {
        return view('admin::shop.product.gallery.index' , compact( 'product'));
    }

    public function create(Product $product)
    {
        return view('admin::shop.product.gallery.create' , compact('product'));
    }

    public function store(Request $request , Product $product)
    {
        $request->validate([
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,webp',
        ]);
        if($request->hasFile('image')) {
            $imageName = ShareService::uploadFilePublic($request->file('image') ,'image/shop/product/gallery');
            $inputs['image'] = $imageName;
        }
        $inputs['product_id'] = $product->id;
        ProductImage::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.product.gallery.index' , $product->id);
    }


    public function destroy( ProductImage $productImage ,Product $product)
    {
        ShareService::deleteFilePublic($productImage->image);
        $productImage->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.product.gallery.index' , $product->id);
    }

}
