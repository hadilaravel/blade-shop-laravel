@extends('admin::layouts.master')

@section('head-tag')
<title> تنظیمات درگاه پرداخت</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header">تنظیمات درگاه پرداخت</h2>
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
                            <h4 class="card-title">تنظیمات درگاه پرداخت</h4>
                            <p> برای انجام تنظیمات درگاه پرداخت با زرین پال ابتدا باید در سایت
                                <a href="https://next.zarinpal.com/auth/login" target="-_blank" rel="nofollow">زرین پال</a>
                                ثبت نام کرده تا مرچنت کد از سایت زرین پال بگیرید بعد از دریافت مرچنت کد دیتا را پر کنید</p>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>مرچنت کد</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $settingPayment->merchant_code }}</td>
                                        <td>
                                            <a href="{{ route('admin.setting.payment-setting.edit', $settingPayment->id) }}" class="success p-0" data-original-title="" title="">
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
