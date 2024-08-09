@extends('admin::layouts.master')

@section('head-tag')
    <title>ویرایش  تنظیمات</title>
@endsection

@section('content')

    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.setting.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <div class="card">
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form form-horizontal"  action="{{ route('admin.setting.update' , $setting->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('put') }}
                                <div class="form-body">

                                    <h4 class="form-section">
                                        ویرایش  تنظیمات</h4>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5">عنوان : </label>
                                        <div class="col-md-9">
                                            <input type="text"  id="projectinput5" class="form-control form-control-sm" name="title" value="{{ old('title' , $setting->title) }}">
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
                                        <label class="col-md-3 label-control" for="projectinput5">کلمات کلیدی : </label>
                                        <div class="col-md-9">
                                            <input type="text"  id="projectinput5" class="form-control form-control-sm" name="keywords" value="{{ old('keywords' , $setting->keywords) }}">
                                            @error('keywords')
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                           <strong>
                                             {{ $message }}
                                          </strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5">آیکون : </label>
                                        <div class="col-md-9">
                                            <input type="file"  id="projectinput5" class="form-control mb-2 form-control-sm" name="icon" >
                                            @if(!empty($setting->icon))
                                            <img src="{{ asset($setting->icon) }}" width="100px" height="100px">
                                            @endif
                                            @error('icon')
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                           <strong>
                                             {{ $message }}
                                          </strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5">لوگو هدر : </label>
                                        <div class="col-md-9">
                                            <input type="file"  id="projectinput5" class="form-control mb-2 form-control-sm" name="logo_header" >
                                            @if(!empty($setting->logo_header))
                                                <img src="{{ asset($setting->logo_header) }}" width="100px" height="100px">
                                            @endif
                                            @error('logo_header')
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                           <strong>
                                             {{ $message }}
                                          </strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5">لوگو فوتر : </label>
                                        <div class="col-md-9">
                                            <input type="file"  id="projectinput5" class="form-control mb-2 form-control-sm" name="logo_footer" >
                                            @if(!empty($setting->logo_footer))
                                                <img src="{{ asset($setting->logo_footer) }}" style="background-color: black" width="100px" height="100px">
                                            @endif
                                            @error('logo_footer')
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                           <strong>
                                             {{ $message }}
                                          </strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="body"> متا توضیحات :</label>
                                        <div class="col-md-9">
                                            <textarea  rows="7"  class="form-control" name="description">{{ old('description' , $setting->description) }}</textarea>
                                            @error('description')
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                           <strong>
                                             {{ $message }}
                                          </strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="body">  توضیحات  فوتر:</label>
                                        <div class="col-md-9">
                                            <textarea  rows="7"  class="form-control" name="body">{{ old('body' , $setting->body) }}</textarea>
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
