@extends('admin::layouts.master')

@section('head-tag')
    <title>   اضافه کردن به انبار</title>
@endsection

@section('content')

    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.shop.storeroom.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <div class="card">
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form form-horizontal"  action="{{ route('admin.shop.storeroom.store' , $product->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <h4 class="form-section">
                                        اضافه کردن به انبار</h4>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5">تعداد : </label>
                                        <div class="col-md-9">
                                            <input type="text"  id="projectinput5" class="form-control form-control-sm" name="marketable_number" value="{{ old('marketable_number') }}">
                                            @error('marketable_number')
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
