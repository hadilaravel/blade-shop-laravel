@extends('admin::layouts.master')

@section('head-tag')
<title> تنظیمات ارسال پیامک</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header">تنظیمات ارسال پیامک</h2>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            </section>
        </div>
    </div>


    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">تنظیمات ارسال پیامک</h4>
                            <p>برای انجام تنظیمات ارسال پیامک ابتدا باید در سایت
                                <a href="https://login.melipayamak.com" target="-_blank" rel="nofollow">ملی پیامک</a>
                                ثبت نام کرده و بعد دیتا هارا پر کنید</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>نام کاربری</th>
                                    <th>رمز عبور</th>
                                    <th>فرستنده</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $smsSetting->username }}</td>
                                        <td>{{ $smsSetting->password }}</td>
                                        <td>{{ convertEnglishToPersian($smsSetting->from)}}</td>
                                        <td>
                                            <a href="{{ route('admin.setting.sms-setting.edit', $smsSetting->id) }}" class="success p-0" data-original-title="" title="">
                                                <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                            </a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
