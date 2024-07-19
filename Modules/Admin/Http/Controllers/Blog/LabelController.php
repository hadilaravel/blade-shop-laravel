<?php

namespace Modules\Admin\Http\Controllers\Blog;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Blog\Label;
use Modules\Admin\Entities\Blog\Post;
use Modules\Admin\Http\Requests\Blog\LabelRequest;

class LabelController extends Controller
{

    public function index()
    {
        $labels = Label::query()->paginate(8);
        return view('admin::blog.label.index' , compact('labels'));
    }

    public function create()
    {
        $posts = Post::query()->where('status' , 1)->get();
        return view('admin::blog.label.create' , compact('posts') );
    }


    public function store(LabelRequest $request)
    {
        $inputs = [
            'name' => $request->name,
            'post_id' => $request->post_id,
            'status' => $request->status,
        ];
        Label::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.blog.label.index');
    }


    public function edit(Label $label)
    {
        $posts = Post::query()->where('status' , 1)->get();
        return view('admin::blog.label.edit' , compact('label' , 'posts'));
    }


    public function update(LabelRequest $request, Label $label)
    {
        $inputs = [
            'name' => $request->name,
            'post_id' => $request->post_id,
            'status' => $request->status,
        ];
        $label->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.blog.label.index');
    }

    public function destroy(Label $label)
    {
        $label->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.blog.label.index');
    }

    public function status(Label $label)
    {
        $label->status = $label->status == 0 ? 1 : 0;
        $label->save();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.blog.label.index');
    }

}
