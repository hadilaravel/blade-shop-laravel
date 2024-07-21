@extends('admin::layouts.master')

@section('head-tag')
<title> پاسخ ها</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header"> پاسخ ها </h2>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.blog.comment.index') }}" class="btn btn-info btn-sm">بازگشت </a>
            </section>
        </div>
    </div>


    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">  پاسخ های نظر :  {{ \Illuminate\Support\Str::limit($comment->body , 30) }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>توضیحات</th>
                                    <th>نام نویسنده</th>
                                    <th>نام پست</th>
                                    <th> وضعیت</th>
                                    <th>تاریخ ساخت</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($answers as $key => $answer)
                                    <tr>
                                        <th>{{ convertEnglishToPersian($key += 1) }}</th>
                                        <td>{!!  \Illuminate\Support\Str::limit($answer->body , 10 ) !!}</td>
                                        <td>{{ $answer->user->name }}</td>
                                        <td>{{ $answer->commentable->title }}</td>
                                        <td>
                                            <a href="{{ route('admin.blog.comment.status', $answer->id) }}" class="btn btn-{{ $answer->status == 1 ? 'success' : 'danger' }} btn-sm"><i class="fa fa-{{ $answer->status == 1 ? 'check' : 'window-close' }}"></i> </a>
                                        </td>
                                        <td>
                                            {{ convertEnglishToPersian(jdate($answer->created_at)->format('Y-m-d')) }}
                                        </td>

                                        <td class="width-8-rem text-left">
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-success btn-sm btn-block dorpdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-tools"></i> عملیات
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a href="{{ route('admin.blog.comment.show', $answer->id) }}" class="dropdown-item text-right text-white bg-secondary"><i class="fa fa-eye "></i>  نمایش  </a>
                                                    <form class="d-inline" action="{{ route('admin.blog.comment.destroy', $answer->id) }}" method="post">
                                                        @csrf
                                                        {{ method_field('delete') }}
                                                        <button  class="dropdown-item text-right  bg-danger text-white" type="submit">
                                                            <i class="fa fa-trash-o font-medium-3"></i>
                                                            حذف
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                        <p>نظری وجود ندارد</p>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
