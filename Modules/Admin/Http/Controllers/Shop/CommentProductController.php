<?php

namespace Modules\Admin\Http\Controllers\Shop;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Blog\Comment;
use Modules\Admin\Http\Requests\Blog\CommentRequest;

class CommentProductController extends Controller
{

    public function index()
    {
        $title = 'نطرات';
        $unSeenComments = Comment::query()->where('commentable_type', 'Modules\Admin\Entities\Shop\Product')->where('seen', 0)->get();
        foreach ($unSeenComments as $unSeenComment) {
            $unSeenComment->seen = 1;
            $result = $unSeenComment->save();
        }
        $comments = Comment::query()->orderBy('created_at', 'desc')->where('commentable_type', 'Modules\Admin\Entities\Shop\Product')->paginate(15);
        return view('admin::shop.comment.index', compact('comments', 'title'));
    }

    public function answered()
    {
        $title = 'نطرات پاسخ داده شده';
        $unSeenComments = Comment::query()->where('commentable_type', 'Modules\Admin\Entities\Shop\Product')->where('seen', 0)->get();
        foreach ($unSeenComments as $unSeenComment) {
            if ($unSeenComment->answers->count() !== 0 && $unSeenComment->parent_id == null) {
                $unSeenComment->seen = 1;
                $result = $unSeenComment->save();
            }
        }
        $commentAs = Comment::query()->where('commentable_type', 'Modules\Admin\Entities\Shop\Product')->get();
        $comments = [];
        foreach ($commentAs as $comment) {
            if ($comment->answers->count() !== 0 && $comment->parent_id == null) {
                $comments = Comment::query()->orderBy('created_at', 'desc')->where('id', $comment->id)->paginate(8);
            }
        }
        return view('admin::shop.comment.index', compact('comments', 'title'));
    }

    public function notAnswer()
    {
        $title = 'نطرات پاسخ داده نشده';
        $unSeenComments = Comment::query()->where('commentable_type', 'Modules\Admin\Entities\Shop\Product')->where('seen', 0)->get();
        foreach ($unSeenComments as $unSeenComment) {
            if ($unSeenComment->answers->count() == 0 && $unSeenComment->parent_id == null) {
                $unSeenComment->seen = 1;
                $result = $unSeenComment->save();
            }
        }
        $commentAs = Comment::query()->orderBy('created_at', 'desc')->where('commentable_type', 'Modules\Admin\Entities\Shop\Product')->paginate(15);
        $comments = [];
        foreach ($commentAs as $comment) {
            if ($comment->answers->count() == 0 && $comment->parent_id == null) {
                $comments = Comment::query()->orderBy('created_at', 'desc')->where('id', $comment->id)->paginate(8);
            }
        }
        return view('admin::shop.comment.index', compact('comments', 'title'));
    }

    public function answers(Comment $comment)
    {
        $answers = Comment::query()->where('parent_id' , $comment->id)->get();
        return view('admin::shop.comment.answers', compact('comment' , 'answers'));
    }

    public function show(Comment $comment)
    {
        return view('admin::shop.comment.show', compact('comment'));
    }


    public function destroy(Comment $comment)
    {
        $comment->delete();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.comment.index');
    }

    public function status(Comment $comment)
    {
        $comment->status = $comment->status == 0 ? 1 : 0;
        $comment->save();
        alert()->success('عملیات با موفقیت انجام شد');
        return to_route('admin.shop.comment.index');
    }


    public function answer(CommentRequest $request, Comment $comment)
    {
        if ($comment->parent == null) {
            $comment->status = 1;
            $comment->save();
            Comment::query()->create([
                'author_id' => auth()->id(),
                'parent_id' => $comment->id,
                'commentable_id' => $comment->commentable_id,
                'commentable_type' => $comment->commentable_type,
                'seen' => 1 ,
                'status' => 1,
                'body' => $request->body,
            ]);
            alert()->success('عملیات با موفقیت انجام شد');
            return to_route('admin.shop.comment.index');
        }else{
            alert()->success('خطا');
            return to_route('admin.shop.comment.index');
        }
    }

}
