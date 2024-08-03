@extends('admin::layouts.master')

@section('head-tag')
    <title>  ویرایش تخفیف شگفت انگیز</title>
    <link rel="stylesheet" href="{{ asset('panel-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')

    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.discount.amazing.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <div class="card">
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form form-horizontal"  action="{{ route('admin.discount.amazing.update' , $amazingSale->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('put') }}
                                <div class="form-body">

                                    <h4 class="form-section">
                                        ویرایش تخفیف شگفت انگیز</h4>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5"> درصد تخفیف : </label>
                                        <div class="col-md-9">
                                            <input type="text"  id="projectinput5" class="form-control form-control-sm" name="percentage" value="{{ old('percentage' , $amazingSale->percentage) }}">
                                            @error('percentage')
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                           <strong>
                                             {{ $message }}
                                          </strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput6">  انتخاب کالا: </label>
                                        <div class="col-md-9">
                                            <select id="projectinput6" name="product_id" class="form-control">
                                                <option value="none" selected="" disabled="">  بدون کالا</option>
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id }}" @if(old('product_id' , $amazingSale->product_id) == $product->id) selected @endif>{{ $product->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('product_id')
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
                                                <option value="0" @if(old('status' , $amazingSale->status) == 0) selected @endif>غیرفعال</option>
                                                <option value="1" @if(old('status' , $amazingSale->status) == 1) selected @endif>فعال</option>
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
                                        <label class="col-md-3 label-control" for="projectinput5"> تاریخ شروع : </label>
                                        <div class="col-md-3">
                                            <input type="text" name="start_date" id="start_date" class="form-control form-control-sm d-none">
                                            <input type="text" id="start_date_view" class="form-control form-control-sm">
                                            @error('start_date')
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                           <strong>
                                             {{ $message }}
                                          </strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5"> تاریخ پایان : </label>
                                        <div class="col-md-3">
                                            <input type="text" name="end_date" id="end_date" class="form-control form-control-sm d-none">
                                            <input type="text" id="end_date_view" class="form-control form-control-sm">
                                            @error('end_date')
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
@section('script')

    <script src="{{ asset('panel-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('panel-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>

    <script>
        $('#type').change(function(){
            if($('#type').find(':selected').val() == 1){
                $('#users').removeAttr('disabled');
            }else{
                $('#users').attr('disabled' , 'disabled');
            }
        })
    </script>

    <script>
        $(document).ready(function () {
            $('#start_date_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#start_date'
            }),
                $('#end_date_view').persianDatepicker({
                    format: 'YYYY/MM/DD',
                    altField: '#end_date'
                })
        });
    </script>

@endsection
