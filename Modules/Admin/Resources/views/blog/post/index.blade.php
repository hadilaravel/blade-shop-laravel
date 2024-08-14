@extends('admin::layouts.master')

@section('head-tag')
<title> پست ها</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header">   پست ها</h2>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.blog.post.create') }}" class="btn btn-info btn-sm">ایجاد  پست </a>
            </section>
        </div>
    </div>


    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">  پست ها</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th> توضیحات</th>
                                    <th> وضعیت نظر دادن</th>
                                    <th> وضعیت</th>
                                    <th>عکس</th>
                                    <th>نام دسته بندی</th>
                                    <th>تاریخ ساخت</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($posts as $key => $post)
                                    <tr>
                                        <th>{{ convertEnglishToPersian($key += 1) }}</th>
                                        <td>{{ \Illuminate\Support\Str::limit($post->title , 40) }}</td>
                                        <td>{!!  \Illuminate\Support\Str::limit($post->body , 20) !!}</td>
                                        <td class=" text-{{ $post->commentable == 0 ? 'danger' : 'success' }}">{{ $post->commentable == 0 ? 'غیرفعال' : 'فعال' }}</td>
                                        <td>
                                            <a href="{{ route('admin.blog.post.status', $post->id) }}" class="btn btn-{{ $post->status == 1 ? 'success' : 'danger' }} btn-sm"><i class="fa fa-{{ $post->status == 1 ? 'check' : 'window-close' }}"></i> </a>
                                        </td>
                                        <td>
                                            <img src="{{ asset($post->image) }}" width="100px" height="100px">
                                        </td>
                                        <td>
                                            {{ $post->category->name }}
                                        </td>
                                        <td>
                                            {{ convertEnglishToPersian(jdate($post->created_at)->format('Y-m-d')) }}
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.blog.post.edit', $post->id) }}" class="success p-0" data-original-title="" title="">
                                                <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                            </a>
                                            <form class="d-inline " action="{{ route('admin.blog.post.destroy', $post->id) }}" method="post">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <button class="danger p-0 border-0 bg-white outloneLi" data-original-title="" title="">
                                                    <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{ $posts->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>

@endsection
