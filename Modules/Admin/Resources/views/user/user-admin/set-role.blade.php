@extends('admin::layouts.master')

@section('head-tag')
<title>اضافه کردن نقش به کاربر </title>
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
                            <form class="form form-horizontal"  action="{{ route('admin.user-admin.role.store' , $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">

                                    <h4 class="form-section">
                                        اضافه کردن نقش به کاربر</h4>



                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput6">  نقش ها: </label>
                                        <div class="col-md-9">
                                            <select id="projectinput6" name="role" class="form-control">
                                                <option value="" >انتخاب نقش</option>
                                                @foreach($roles as $role)
                                                <option value="{{ $role->id }}" @if(old('role' , $user->hasRole($role->name)) == $role->id) selected @endif>{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('role')
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
