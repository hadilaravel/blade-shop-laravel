<?php

namespace Modules\Admin\Http\Controllers\Notify;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Notify\Email;
use Modules\Admin\Entities\Notify\Sms;
use Modules\Admin\Http\Requests\Notify\EmailRequest;
use Modules\Admin\Http\Requests\Notify\SmsRequest;
use Modules\Admin\Jobs\Notify\SendSmsToUser;

class SmsController extends Controller
{

    public function index()
    {
        $sms = Sms::query()->orderBy('created_at', 'desc')->paginate(15);
        return view('admin::notify.sms.index', compact('sms'));

    }

    public function create()
    {
        return view('admin::notify.sms.create');

    }


    public function store(SmsRequest $request)
    {
        $inputs = $request->all();
        //date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $email = Sms::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.notify.sms.index');
    }


    public function edit(Sms $sms)
    {
        return view('admin::notify.sms.edit', compact('sms'));

    }


    public function update(SmsRequest $request, Sms $sms)
    {
        $inputs = $request->all();
        //date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $sms->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.notify.sms.index');
    }


    public function destroy(Sms $sms)
    {
        $result = $sms->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.notify.sms.index');
    }


    public function status(Sms $sms){

        $sms->status = $sms->status == 0 ? 1 : 0;
        $sms->save();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.notify.sms.index');
    }

    public function sendSms(Sms $sms )
    {
        SendSmsToUser::dispatch($sms);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.notify.sms.index');
    }

}
