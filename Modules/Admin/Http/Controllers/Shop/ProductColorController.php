<?php

namespace Modules\Admin\Http\Controllers\Shop;

use App\Http\Service\ShareService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop\Product;
use Modules\Admin\Entities\Shop\ProductColor;
use Modules\Admin\Http\Requests\Shop\ProductColorRequest;

class ProductColorController extends Controller
{

    public function index(Product $product)
    {
        return view('admin::shop.product.color.index' , compact( 'product'));
    }

    public function create(Product $product)
    {
        return view('admin::shop.product.color.create' , compact('product'));
    }

    public function store(ProductColorRequest $request , Product $product)
    {
        $inputs = $request->all();
        $inputs['product_id'] = $product->id;
        ProductColor::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.product.color.index' , $product->id);
    }


    public function destroy( ProductColor $productColor ,Product $product)
    {
        $productColor->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.product.color.index' , $product->id);
    }

}
