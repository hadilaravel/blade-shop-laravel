<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop\AmazingSale;
use Modules\Admin\Entities\Shop\Product;
use Modules\Admin\Http\Requests\Shop\AmazingSaleRequest;

class AmazingSaleController extends Controller
{

    public function index()
    {
        $amazingSales = AmazingSale::query()->latest()->paginate(10);
        return view('admin::shop.amazing.index' , compact('amazingSales'));
    }


    public function create()
    {
        $products = Product::query()->where('status' , 1)->get();
        return view('admin::shop.amazing.create' , compact('products') );
    }


    public function store(AmazingSaleRequest $request)
    {
        $inputs = $request->all();
        //date fixed
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $realTimestampEnd = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)$realTimestampEnd);
        AmazingSale::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.discount.amazing.index');
    }


    public function edit(AmazingSale $amazingSale)
    {
        $products = Product::query()->where('status' , 1)->get();
        return view('admin::shop.amazing.edit' , compact('amazingSale' , 'products'));
    }


    public function update(AmazingSaleRequest $request, AmazingSale $amazingSale)
    {
        $inputs = $request->all();
        //date fixed
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $realTimestampEnd = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)$realTimestampEnd);
        $amazingSale->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.discount.amazing.index');
    }

    public function destroy(AmazingSale $amazingSale)
    {
        $amazingSale->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.discount.amazing.index');
    }

    public function status(AmazingSale $amazingSale)
    {
        $amazingSale->status = $amazingSale->status == 0 ? 1 : 0;
        $amazingSale->save();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.discount.amazing.index');
    }

}
