@extends('admin::layouts.master')

@section('head-tag')
    <title>ویرایش کاربر ادمین</title>
@endsection

@section('content')

    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.user-admin.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <div class="card">
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form form-horizontal"  action="{{ route('admin.user-admin.update' , $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('put') }}
                                <div class="form-body">

                                    <h4 class="form-section">
                                        ویرایش کاربر  ادمین</h4>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5">نام کاربری : </label>
                                        <div class="col-md-9">
                                            <input type="text"  id="projectinput5" class="form-control form-control-sm" name="name" value="{{ old('name' , $user->name) }}">
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
                                        <label class="col-md-3 label-control" for="projectinput5"> رمز عبور : </label>
                                        <div class="col-md-9">
                                            <input type="password"  id="projectinput5" class="form-control form-control-sm" name="password" value="{{ old('password') }}">
                                            @error('password')
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                           <strong>
                                             {{ $message }}
                                          </strong>
                                        </span>
                                            @enderror
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5">تاییدیه رمز عبور : </label>
                                        <div class="col-md-9">
                                            <input type="password"  id="projectinput5" class="form-control form-control-sm" name="password_confirmation" value="{{ old('password_confirmation') }}">
                                            @error('password_confirmation')
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
                                            <select id="projectinput6" name="activation" class="form-control">
                                                <option value="0" @if(old('activation' , $user->activation) == 0) selected @endif>غیرفعال</option>
                                                <option value="1" @if(old('activation' , $user->activation) == 1) selected @endif>فعال</option>
                                            </select>
                                            @error('activation')
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                           <strong>
                                             {{ $message }}
                                          </strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control"> پروفایل : </label>
                                        <div class="col-md-9">
                                            <label id="projectinput8" class="file center-block">
                                                <input type="file" id="file" name="profile">
                                                <span class="file-custom"></span>
                                                : </label>
                                            <img src="{{ asset($user->profile) }}" width="140px" height="100px">
                                            @error('profile')
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
