<?php

namespace Modules\Admin\Http\Controllers\Notify;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Notify\Email;
use Modules\Admin\Http\Requests\Notify\EmailRequest;
use Modules\Admin\Jobs\Notify\SendEmailToUser;

class EmailController extends Controller
{


    public function index()
    {
        $emails = Email::query()->orderBy('created_at', 'desc')->paginate(15);
        return view('admin::notify.email.index', compact('emails'));

    }


    public function create()
    {
        return view('admin::notify.email.create');

    }


    public function store(EmailRequest $request)
    {
        $inputs = $request->all();
        //date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $email = Email::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.notify.email.index');
    }


    public function edit(Email $email)
    {
        return view('admin::notify.email.edit', compact('email'));

    }


    public function update(EmailRequest $request, Email $email)
    {
        $inputs = $request->all();
        //date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $email->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.notify.email.index');
    }


    public function destroy(Email $email)
    {
        $result = $email->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.notify.email.index');
    }


    public function status(Email $email){

        $email->status = $email->status == 0 ? 1 : 0;
        $email->save();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.notify.email.index');
    }

    public function sendMail(Email $email )
    {
        SendEmailToUser::dispatch($email);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.notify.email.index');
    }

}
