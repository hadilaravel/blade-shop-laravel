<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Shop\Faq;
use Modules\Admin\Http\Requests\Shop\FaqRequest;

class FaqController extends Controller
{


    public function index()
    {
        $faqs = Faq::query()->paginate(8);
        return view('admin::blog.faq.index' , compact('faqs'));
    }

    public function create()
    {
        return view('admin::blog.faq.create' );
    }


    public function store(FaqRequest $request)
    {
        $inputs = [
            'question' => $request->question,
            'answer' => $request->answer,
            'status' => $request->status,
        ];
        Faq::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.blog.faq.index');
    }


    public function edit(Faq $faq)
    {
        return view('admin::blog.faq.edit' , compact('faq'));
    }


    public function update(FaqRequest $request, Faq $faq)
    {
        $inputs = [
            'question' => $request->question,
            'answer' => $request->answer,
            'status' => $request->status,
        ];
        $faq->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.blog.faq.index');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.blog.faq.index');
    }

    public function status(Faq $faq)
    {
        $faq->status = $faq->status == 0 ? 1 : 0;
        $faq->save();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.blog.faq.index');
    }

}
