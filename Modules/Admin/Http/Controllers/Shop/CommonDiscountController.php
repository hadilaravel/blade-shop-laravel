<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop\CommonDiscount;
use Modules\Admin\Http\Requests\Shop\CommonDiscountRequest;

class CommonDiscountController extends Controller
{

    public function index()
    {
        $commons = CommonDiscount::query()->latest()->paginate(10);
        return view('admin::shop.common.index' , compact('commons'));
    }


    public function create()
    {
        return view('admin::shop.common.create' );
    }


    public function store(CommonDiscountRequest $request)
    {
        $inputs = $request->all();
        //date fixed
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $realTimestampEnd = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)$realTimestampEnd);
        CommonDiscount::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.discount.common.index');
    }


    public function edit(CommonDiscount $commonDiscount)
    {
        return view('admin::shop.common.edit' , compact('commonDiscount'));
    }


    public function update(CommonDiscountRequest $request, CommonDiscount $commonDiscount)
    {
        $inputs = $request->all();
        //date fixed
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $realTimestampEnd = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)$realTimestampEnd);
        $commonDiscount->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.discount.common.index');
    }

    public function destroy(CommonDiscount $commonDiscount)
    {
        $commonDiscount->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.discount.common.index');
    }

    public function status(CommonDiscount $commonDiscount)
    {
        $commonDiscount->status = $commonDiscount->status == 0 ? 1 : 0;
        $commonDiscount->save();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.discount.common.index');
    }

}
