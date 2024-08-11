@extends('admin::layouts.master')

@section('head-tag')
    <title>ایجاد {{ $title }}</title>
@endsection

@section('content')

    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.shop.banner.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <div class="card">
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form form-horizontal"  action="{{ route('admin.shop.banner.update' , $banner->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('put') }}
                                <div class="form-body">

                                    <h4 class="form-section">
                                        ایجاد {{ $title }}</h4>


                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput6">  جایگاه: </label>
                                        <div class="col-md-9">
                                            <select id="projectinput6" name="position" class="form-control">
                                                <option value="1" @if(old('position' , $banner->position) == 1) selected @endif>اسلایدر</option>
                                                <option value="2" @if(old('position' , $banner->position) == 2) selected @endif>تصویر زیر اسلایدر</option>
                                                <option value="3" @if(old('position' , $banner->position) == 3) selected @endif>تصویر ها</option>
                                                <option value="4" @if(old('position' , $banner->position) == 4) selected @endif>دو تصویر</option>
                                            </select>
                                            @error('position')
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                           <strong>
                                             {{ $message }}
                                          </strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5">عکس : </label>
                                        <div class="col-md-9">
                                            <input type="file"  id="projectinput5" class="form-control form-control-sm" name="image" >
                                            <img src="{{ asset($banner->image) }}" width="80px" height="80px">
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
                                        <label class="col-md-3 label-control" for="projectinput6">  وضعیت: </label>
                                        <div class="col-md-9">
                                            <select id="projectinput6" name="status" class="form-control">
                                                <option value="0" @if(old('status' , $banner->stauts) == 0) selected @endif>غیرفعال</option>
                                                <option value="1" @if(old('status' , $banner->status) == 1) selected @endif>فعال</option>
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
