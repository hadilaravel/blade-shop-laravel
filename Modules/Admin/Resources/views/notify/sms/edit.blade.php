@extends('admin::layouts.master')

@section('head-tag')
    <title>ویرایش اطلاعیه پیامکی</title>
    <link rel="stylesheet" href="{{ asset('panel-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')

    <section id="horizontal-form-layouts">
        <div class="row">
            <div class="col-md-12">
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.notify.sms.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>
                <div class="card">
                    <div class="card-body">
                        <div class="px-3">
                            <form class="form form-horizontal"  action="{{ route('admin.notify.sms.update' , $sms->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{ method_field('put') }}
                                <div class="form-body">

                                    <h4 class="form-section">
                                        ویرایش اطلاعیه پیامکی</h4>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5">عنوان  : </label>
                                        <div class="col-md-9">
                                            <input type="text"  id="projectinput5" class="form-control form-control-sm" name="title" value="{{ old('title' , $sms->title) }}">
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
                                        <label class="col-md-3 label-control" for="projectinput6">  وضعیت: </label>
                                        <div class="col-md-9">
                                            <select id="projectinput6" name="status" class="form-control">
                                                <option value="0" @if(old('status' , $sms->status) == 0) selected @endif>غیرفعال</option>
                                                <option value="1" @if(old('status' , $sms->status) == 1) selected @endif>فعال</option>
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
                                        <label class="col-md-3 label-control" for="projectinput5"> تاریخ انتشار : </label>
                                        <div class="col-md-3">
                                            <input type="text" name="published_at" id="published_at" class="form-control form-control-sm d-none">
                                            <input type="text" id="published_at_view" class="form-control form-control-sm">
                                            @error('published_at')
                                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                           <strong>
                                             {{ $message }}
                                          </strong>
                                        </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3 label-control" for="projectinput5"> متن ایمیل: </label>
                                        <div class="col-md-9">
                                            <textarea  type="text"  id="body" class="form-control form-control-sm" name="body" >
                                                {{ old('body' , $sms->body) }}
                                            </textarea>
                                            @error('body')
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

    <script src="{{ asset('panel-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('body');
    </script>

    <script>
        $(document).ready(function() {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at',
                timePicker: {
                    enabled: true,
                    meridiem: {
                        enabled: true
                    }
                }
            })
        });
    </script>

@endsection
