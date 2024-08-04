<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop\Delivery;
use Modules\Admin\Http\Requests\Shop\DeliveryRequest;

class DeliveryController extends Controller
{

    public function index()
    {
        $deliveries = Delivery::query()->latest()->paginate(10);
        return view('admin::shop.delivery.index' , compact('deliveries'));
    }


    public function create()
    {
        return view('admin::shop.delivery.create');
    }


    public function store(DeliveryRequest $request)
    {
        $inputs = $request->all();
        Delivery::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.delivery.index');
    }


    public function edit(Delivery $delivery)
    {
        return view('admin::shop.delivery.edit' , compact('delivery'));
    }


    public function update(DeliveryRequest $request, Delivery $delivery)
    {
        $inputs = $request->all();
        $delivery->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.delivery.index');
    }

    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.delivery.index');
    }

    public function status(Delivery $delivery)
    {
        $delivery->status = $delivery->status == 0 ? 1 : 0;
        $delivery->save();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.delivery.index');
    }

}
