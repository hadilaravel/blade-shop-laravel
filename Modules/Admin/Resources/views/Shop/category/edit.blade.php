@extends('admin::layouts.master')

@section('head-tag')
    <title>ویرایش دسته بندی محصول</title>
@endsection

@section('content')

    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.shop.category.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <div class="card">
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form form-horizontal"  action="{{ route('admin.shop.category.update' , $productCategory->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('put') }}
                                <div class="form-body">
                                    <input name="id" value="{{ $productCategory->id }}" type="hidden">
                                    <h4 class="form-section">
                                        ویرایش دسته بندی محصول</h4>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5">نام : </label>
                                        <div class="col-md-9">
                                            <input type="text"  id="projectinput5" class="form-control form-control-sm" name="name" value="{{ old('name' , $productCategory->name) }}">
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
                                        <label class="col-md-3 label-control" for="projectinput6">  والد: </label>
                                        <div class="col-md-9">
                                            <select id="projectinput6" name="parent_id" class="form-control">
                                                <option value="none" selected="" disabled="">  بدون والد</option>
                                                @foreach($categories as $cat)
                                                    <option value="{{ $cat->id }}" @if(old('parent_id' , $productCategory->parent_id) == $cat->id) selected @endif>{{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('parent_id')
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
                                                <option value="0" @if(old('status' , $productCategory->status) == 0) selected @endif>غیرفعال</option>
                                                <option value="1" @if(old('status' , $productCategory->status) == 1) selected @endif>فعال</option>
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
