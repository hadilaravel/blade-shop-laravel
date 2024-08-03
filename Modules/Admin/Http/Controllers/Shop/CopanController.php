<?php

namespace Modules\Admin\Http\Controllers\Shop;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop\Copan;
use Modules\Admin\Http\Requests\Shop\CopanRequest;

class CopanController extends Controller
{

    public function index()
    {
        $copans = Copan::query()->latest()->paginate(10);
        return view('admin::shop.copan.index' , compact('copans'));
    }


    public function create()
    {
        $users = User::all();
        return view('admin::shop.copan.create' , compact('users') );
    }


    public function store(CopanRequest $request)
    {
        $inputs = $request->all();
        //date fixed
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $realTimestampEnd = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)$realTimestampEnd);
        if($inputs['type'] == 0){
            $inputs['user_id'] = null;
        }
        Copan::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.discount.copan.index');
    }


    public function edit(Copan $copan)
    {
        $users = User::all();
        return view('admin::shop.copan.edit' , compact('users' , 'copan'));
    }


    public function update(CopanRequest $request, Copan $copan)
    {
        $inputs = $request->all();
        //date fixed
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $realTimestampEnd = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)$realTimestampEnd);
        if($inputs['type'] == 0){
            $inputs['user_id'] = null;
        }
        $copan->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.discount.copan.index');
    }

    public function destroy(Copan $copan)
    {
        $copan->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.discount.copan.index');
    }

    public function status(Copan $copan)
    {
        $copan->status = $copan->status == 0 ? 1 : 0;
        $copan->save();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.discount.copan.index');
    }

}
