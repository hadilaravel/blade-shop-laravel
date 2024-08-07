@extends('admin::layouts.master')

@section('head-tag')
<title> اطلاعیه پیامکی</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header">اطلاعیه پیامکی</h2>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.notify.sms.create') }}" class="btn btn-info btn-sm">ایجاد اطلاعیه پیامکی </a>
            </section>
        </div>
    </div>


    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">اطلاعیه پیامکی</h4>
                            <p>برای  ارسال پیامک ابتدا باید در سایت
                                <a href="https://login.melipayamak.com" target="-_blank" rel="nofollow">ملی پیامک</a>
                                ثبت نام کرده و بعد در بخش تنظیمات ,
                                <a href="{{ route('admin.setting.sms-setting.index') }}">تنظیمات ارسال پیامک</a>
                                را انجام دهید و بعد اقدام کنید</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان اطلاعیه</th>
                                    <th>متن پیامک</th>
                                    <th>تاریخ ارسال </th>
                                    <th>وضعیت</th>
                                    <th>تاریخ ساخت</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($sms as $key => $single)
                                    <tr>
                                        <th>{{ convertEnglishToPersian($key += 1) }}</th>
                                        <td>{{ $single->title }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($single->body , 60) }}</td>
                                        <td>
                                            {{ convertEnglishToPersian(jdate($single->published_at)->format('Y-m-d')) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.notify.sms.status', $single->id) }}" class="btn btn-{{ $single->status == 1 ? 'success' : 'danger' }} btn-sm"><i class="fa fa-{{ $single->status == 1 ? 'check' : 'window-close' }}"></i> </a>
                                        </td>
                                        <td>
                                            {{ convertEnglishToPersian(jdate($single->created_at)->format('Y-m-d')) }}
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.notify.sms.send-sms', $single->id) }}" class="success p-0" data-original-title="" title="">
                                                <i class="fa fa-send font-medium-3 mr-2"></i>
                                            </a>
                                            <a href="{{ route('admin.notify.sms.edit', $single->id) }}" class="success p-0" data-original-title="" title="">
                                                <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                            </a>
                                            <form class="d-inline " action="{{ route('admin.notify.sms.destroy', $single->id) }}" method="post">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <button class="danger p-0 border-0 bg-white outloneLi" data-original-title="" title="">
                                                    <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{ $sms->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>

@endsection
