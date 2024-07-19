@extends('admin::layouts.master')

@section('head-tag')
<title>ایجاد پست</title>
@endsection

@section('content')

    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.blog.post.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <div class="card">
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form form-horizontal"  action="{{ route('admin.blog.post.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">

                                    <h4 class="form-section">
                                        ایجاد  پست</h4>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5">عنوان : </label>
                                        <div class="col-md-9">
                                            <input type="text"  id="projectinput5" class="form-control form-control-sm" name="title" value="{{ old('title') }}">
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
                                        <label class="col-md-3 label-control" for="projectinput5">تصویر : </label>
                                        <div class="col-md-9">
                                            <input type="file"  id="projectinput5" class="form-control form-control-sm" name="image" >
                                            @error('image')
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                           <strong>
                                             {{ $message }}
                                          </strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput6">  دسته بندی: </label>
                                        <div class="col-md-9">
                                            <select id="projectinput6" name="category_id" class="form-control">
                                                <option value="" selected="" disabled="">  انتخاب دسته بندی</option>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
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
                                                <option value="0" @if(old('status') == 0) selected @endif>غیرفعال</option>
                                                <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
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
                                        <label class="col-md-3 label-control" for="projectinput6"> وضعیت نظر دادن : </label>
                                        <div class="col-md-9">
                                            <select id="projectinput6" name="commentable" class="form-control">
                                                <option value="0" @if(old('commentable') == 0) selected @endif>غیرفعال</option>
                                                <option value="1" @if(old('commentable') == 1) selected @endif>فعال</option>
                                            </select>
                                            @error('commentable')
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
                                            <textarea id="body" rows="7"  class="form-control" name="body">{{ old('body') }}</textarea>
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
@section('script')
    <script src="{{ asset('panel-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
@endsection
