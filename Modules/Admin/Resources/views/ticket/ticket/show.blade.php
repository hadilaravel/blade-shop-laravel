@extends('admin::layouts.master')

@section('head-tag')
    <title> نمایش تیکت</title>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.ticket.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>
            <div class="card">
                <div class="card-header">
                    <div class="card-title-wrap bar-success">
                        <h4 class="card-title" id="horz-layout-basic"> نام نویسنده :  {{ $ticket->user->name }}</h4>
                    </div>
                    <h4>توضیحات : </h4>
                    <p class="mb-0">{!! $ticket->body !!}</p>
                </div>
                @if($ticket->ticket_id == null)
                <div class="card-body">
                    <div class="px-3">
                        <form class="form form-horizontal" method="post" action="{{ route('admin.ticket.answer' , $ticket->id) }}">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section">
                                    <i class="fa fa-question-circle"></i>  ثبت پاسخ</h4>


                                <div class="form-group row">
                                    <label class="col-md-3 label-control" for="body"> توضیحات :</label>
                                    <div class="col-md-9">
                                        <textarea id="body" rows="7"  class="form-control" name="body">{{ old('body') }}</textarea>
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
                                <button type="submit" class="btn btn-success">
                                    <i class="icon-note"></i> ذخیره
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script src="{{ asset('panel-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('body');
    </script>
@endsection
