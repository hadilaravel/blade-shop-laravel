<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop\Product;
use Modules\Admin\Entities\Shop\ProductMeta;
use Modules\Admin\Http\Requests\Shop\ProductMetaRequest;

class ProductMetaController extends Controller
{

    public function index(Product $product)
    {
        return view('admin::shop.product.meta.index' , compact( 'product'));
    }

    public function create(Product $product)
    {
        return view('admin::shop.product.meta.create' , compact('product'));
    }

    public function store(ProductMetaRequest $request , Product $product)
    {
        $inputs = $request->all();
        $inputs['product_id'] = $product->id;
        ProductMeta::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.product.meta.index' , $product->id);
    }


    public function destroy( ProductMeta $productMeta ,Product $product)
    {
        $productMeta->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.product.meta.index' , $product->id);
    }

}
