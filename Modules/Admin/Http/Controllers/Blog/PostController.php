<?php

namespace Modules\Admin\Http\Controllers\Blog;

use App\Http\Service\ShareService;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Blog\Post;
use Modules\Admin\Entities\Blog\PostCategory;
use Modules\Admin\Http\Requests\Blog\PostRequest;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::query()->latest()->paginate();
        return view('admin::blog.post.index' , compact('posts'));
    }

    public function create()
    {
        $categories = PostCategory::query()->where('status' , 1)->get();
        return view('admin::blog.post.create' , compact('categories'));
    }


    public function store(PostRequest $request)
    {
        $inputs = [
            'title' => $request->title,
            'body' => $request->body,
            'category_id'=> $request->category_id,
            'status' => $request->status,
            'commentable' => $request->commentable,
        ];
        $inputs['slug'] = persianSlug($request->title);
        if($request->hasFile('image')) {
            $imageName = ShareService::uploadFilePublic($request->file('image') ,'image/post');
            $inputs['image'] = $imageName;
        }
        Post::query()->create($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.blog.post.index');
    }

    public function edit(Post $post)
    {
        $categories = PostCategory::query()->where('status' , 1)->get();
        return view('admin::blog.post.edit' , compact('categories' , 'post'));
    }

    public function update(PostRequest $request , Post $post)
    {
        $inputs = [
            'title' => $request->title,
            'body' => $request->body,
            'category_id'=> $request->category_id,
            'status' => $request->status,
            'commentable' => $request->commentable,
        ];
        $inputs['slug'] = persianSlug($request->title);
        if($request->hasFile('image')) {
            ShareService::deleteFilePublic($post->image);
            $imageName = ShareService::uploadFilePublic($request->file('image') ,'image/post');
            $inputs['image'] = $imageName;
        }
        $post->update($inputs);
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.blog.post.index');
    }

    public function destroy(Post $post)
    {
        ShareService::deleteFilePublic($post->image);
        $post->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.blog.post.index');
    }

    public function status(Post $post)
    {
        $post->status = $post->status == 0 ? 1 : 0;
        $post->save();
        alert()->success('وضعیت با موفقیت تغیر کرد');
        return to_route('admin.blog.post.index');
    }

}
