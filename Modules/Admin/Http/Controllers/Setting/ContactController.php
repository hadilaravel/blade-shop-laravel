<?php

namespace Modules\Admin\Http\Controllers\Setting;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Setting\Contact;

class ContactController extends Controller
{

    public function index()
    {
        $contacts = Contact::query()->get();
        return view('admin::setting.contact.index', compact('contacts'));
    }


    public function create()
    {
        return view('admin::setting.contact.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required',
            'value' => 'required',
        ]);
        $inputs = $request->all();
        Contact::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.setting.contact.index');
    }


    public function edit(Contact $contact)
    {
        return view('admin::setting.contact.edit', compact('contact'));
    }


    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'key' => 'required',
            'value' => 'required',
        ]);
        $inputs = $request->all();
        $contact->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.setting.contact.index');
    }


    public function destroy(Contact $contact)
    {
        $result = $contact->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.setting.contact.index');
    }

}
