@extends('admin::layouts.master')

@section('head-tag')
    <title>ویرایش  نظر</title>
@endsection

@section('content')

    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.comment.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <div class="card">
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form form-horizontal"  action="{{ route('admin.comment.update' , $comment->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('put') }}
                                <div class="form-body">

                                    <h4 class="form-section">
                                        ویرایش  نظر</h4>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5">عنوان : </label>
                                        <div class="col-md-9">
                                            <input type="text"  id="projectinput5" class="form-control form-control-sm" name="title" value="{{ old('title' , $comment->title) }}">
                                            @error('title')
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                           <strong>
                                             {{ $message }}
                                          </strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5">نام نویسنده : </label>
                                        <div class="col-md-9">
                                            <input type="text"  id="projectinput5" class="form-control form-control-sm" name="name" value="{{ old('name' , $comment->name) }}">
                                            @error('name')
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                           <strong>
                                             {{ $message }}
                                          </strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5">ایمیل نویسنده : </label>
                                        <div class="col-md-9">
                                            <input type="email"  id="projectinput5" class="form-control form-control-sm" name="email" value="{{ old('email' , $comment->email) }}">
                                            @error('email')
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                           <strong>
                                             {{ $message }}
                                          </strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput6">   مقاله: </label>
                                        <div class="col-md-9">
                                            <select id="projectinput6" name="article_id" class="form-control">
                                                <option value="" selected="" disabled="">  انتخاب  مقاله</option>
                                                @foreach($articles as $article)
                                                    <option value="{{ $article->id }}" @if(old('article_id' , $comment->article_id) == $article->id) selected @endif>{{ $article->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('article_id')
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                           <strong>
                                             {{ $message }}
                                          </strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput6">  وضعیت: </label>
                                        <div class="col-md-9">
                                            <select id="projectinput6" name="status" class="form-control">
                                                <option value="0" @if(old('status' , $comment->status) == 0) selected @endif>غیرفعال</option>
                                                <option value="1" @if(old('status' , $comment->status) == 1) selected @endif>فعال</option>
                                            </select>
                                            @error('status')
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                           <strong>
                                             {{ $message }}
                                          </strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="body"> توضیحات :</label>
                                        <div class="col-md-9">
                                            <textarea id="body" rows="7"  class="form-control" name="body">{{ old('body' , $comment->body) }}</textarea>
                                            @error('body')
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                           <strong>
                                             {{ $message }}
                                          </strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button  class="btn btn-success">
                                        <i class="icon-note"></i> ذخیره
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


@endsection
{{--@section('script')--}}
{{--    <script src="{{ asset('panel-assets/ckeditor/ckeditor.js') }}"></script>--}}
{{--    <script>--}}
{{--        CKEDITOR.replace('body');--}}
{{--    </script>--}}
{{--@endsection--}}
