<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop\Guarantee;
use Modules\Admin\Entities\Shop\Product;
use Modules\Admin\Http\Requests\Shop\GuaranteeRequest;

class GuaranteeController extends Controller
{

    public function index(Product $product)
    {
        return view('admin::shop.product.guarantee.index' , compact( 'product'));
    }

    public function create(Product $product)
    {
        return view('admin::shop.product.guarantee.create' , compact('product'));
    }

    public function store(GuaranteeRequest $request , Product $product)
    {
        $inputs = $request->all();
        $inputs['product_id'] = $product->id;
        Guarantee::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.product.guarantee.index' , $product->id);
    }


    public function destroy( Guarantee $guarantee ,Product $product)
    {
        $guarantee->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.product.guarantee.index' , $product->id);
    }

}
