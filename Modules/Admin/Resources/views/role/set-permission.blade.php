@extends('admin::layouts.master')

@section('head-tag')
<title> اضافه کردن دسترسی</title>
@endsection

@section('content')

    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.role.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <div class="card">
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form form-horizontal"  action="{{ route('admin.role.permission.store' , $role->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">

                                    <h4 class="form-section">
                                        اضافه کردن دسترسی</h4>


                                    <section class="col-12 ">
                                        <div class="form-group">
                                            @foreach ($permissions as $permission)
                                                <div class="checkbox checkbox-primary">
                                                    <input id="permission[{{ $permission->name }}]" type="checkbox" @if($role->hasPermissionTo($permission)) checked @endif name="permissions[{{ $permission->name }}]" value="{{ $permission->id }}">
                                                    <label for="permission[{{ $permission->name }}]" style="font-size: 16px">
                                                        {{ $permission->name_perssion }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('permissions')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                           <strong>
                                             {{ $message }}
                                          </strong>
                                        </span>
                                        @enderror
                                    </section>


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
