@extends('admin::layouts.master')

@section('head-tag')
<title>ایجاد  برچسب</title>
@endsection

@section('content')

    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.blog.label.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <div class="card">
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form form-horizontal"  action="{{ route('admin.blog.label.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">

                                    <h4 class="form-section">
                                        ایجاد برچسب</h4>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5">نام : </label>
                                        <div class="col-md-9">
                                            <input type="text"  id="projectinput5" class="form-control form-control-sm" name="name" value="{{ old('name') }}">
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
                                        <label class="col-md-3 label-control" for="projectinput6">  مقاله: </label>
                                        <div class="col-md-9">
                                            <select id="projectinput6" name="post_id" class="form-control">
                                                <option value="none" selected="" disabled="">   انتخاب مقاله</option>
                                                @foreach($posts as $post)
                                                    <option value="{{ $post->id }}" @if(old('post_id') == $post->id) selected @endif>{{ $post->title }}</option>
                                                @endforeach
                                            </select>
                                            @error('post_id')
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
