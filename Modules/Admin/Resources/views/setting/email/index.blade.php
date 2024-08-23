@extends('admin::layouts.master')

@section('head-tag')
<title> تنظیمات ارسال ایمیل</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header">تنظیمات ارسال ایمیل</h2>
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
                            <h4 class="card-title">تنظیمات ارسال ایمیل</h4>
                          <p>
                              1- باید از قسمت گوگل اکانت، بخش security، بخش Signing in to Google، تایید دو مرحله‌ای یا two step vertification را فعال بکنید.
                          </p>
                            <p>
                                2-پس از ست کردن تایید دو مرحله‌ای، در همین بخش Signing in to Google، به قسمت App passwords رفته و یک پسوورد برای سرویس یا دستگاه یا برنامه‌ای که می‌خواید(PHPMailer یا هرچیز دیگه‌ای) ست کنید.(در صفحه App passwords بر روی قسمت Select app کلیک کنید و گزینه Other را انتخاب کنید، یک فیلد براتون میاره و شما باید PHPMailer یا هر اسمی که عشقتون می‌کشه را وارد کنید و سپس دکمه Generate را بفشارید، یک پسوورد 16 رقمی بهتون می‌ده.)
                            </p>
                            <p>
                                پسورد مورد نظر را کپی کنید و دیتا های پایین رو پر کنید
                            </p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>نام ایمیل</th>
                                    <th>رمز عبور</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $settingEmail->name }}</td>
                                        <td>{{ $settingEmail->password }}</td>
                                        <td>
                                            <a href="{{ route('admin.setting.email-setting.edit', $settingEmail->id) }}" class="success p-0" data-original-title="" title="">
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
