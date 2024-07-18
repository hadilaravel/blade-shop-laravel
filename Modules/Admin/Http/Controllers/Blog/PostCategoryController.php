<?php

namespace Modules\Admin\Http\Controllers\Blog;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Blog\PostCategory;
use Modules\Admin\Http\Requests\Blog\PostCategoryRequest;

class PostCategoryController extends Controller
{

    public function index()
    {
        $categories = PostCategory::query()->latest()->paginate(10);
        return view('admin::blog.category.index' , compact('categories'));
    }


    public function create()
    {
        $categories = PostCategory::query()->where('status' , 1)->get();
        return view('admin::blog.category.create' , compact('categories') );
    }


    public function store(PostCategoryRequest $request)
    {
        $inputs = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'status' => $request->status,
        ];
        $inputs['slug'] = persianSlug($request->name);
        PostCategory::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.blog.category.index');
    }


    public function edit(PostCategory $postCategory)
    {
        $categories = PostCategory::query()->where('status' , 1)->get()->except($postCategory->id);
        return view('admin::blog.category.edit' , compact('postCategory' , 'categories'));
    }


    public function update(PostCategoryRequest $request, PostCategory $postCategory)
    {
        $inputs = [
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'status' => $request->status,
        ];
        $inputs['slug'] = persianSlug($request->name);
        $postCategory->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.blog.category.index');
    }

    public function destroy(PostCategory $postCategory)
    {
        $postCategory->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.blog.category.index');
    }

    public function status(PostCategory $postCategory)
    {
        $postCategory->status = $postCategory->status == 0 ? 1 : 0;
        $postCategory->save();
        alert()->success('وضعیت با موفقیت تغیر کرد');
        return to_route('admin.blog.category.index');
    }


}
