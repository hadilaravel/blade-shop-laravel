@extends('admin::layouts.master')

@section('head-tag')
    <title> نمایش پرداخت</title>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.shop.payment.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>
            <div class="card">
                <div class="card-header">
                    <div class="card-title-wrap bar-success">
                        <h4 class="card-title" id="horz-layout-basic"> نام پرداخت کننده :  {{ $payment->user->name }}</h4>
                    </div>
                    <div class="d-flex">
                        <p class="card-text"> مبلغ :</p>
                        <p class="card-text">
                            {{ priceFormat($payment->paymentable->amount) }} تومان
                        </p>
                    </div>
                    <p class="card-text"> بانک : {{ $payment->paymentable->gateway ?? '-'}}</p>
                    <p class="card-text">شماره پرداخت :  {{ $payment->paymentable->transaction_id ?? '-' }}</p>
                    <p class="card-text">شماره پرداخت :  {{ $payment->paymentable->transaction_id ?? '-' }}</p>
                    <div class="d-flex">
                        <p class="card-text"> تاریخ پرداخت :</p>
                    <p class="card-text">
                        {{ convertEnglishToPersian(jdate($payment->paymentable->pay_date)->format('Y-m-d')) ?? '-' }}
                    </p>
                    </div>
                    <p class="card-text">  دریافت کننده پرداخت  :{{ $payment->paymentable->cash_receiver ?? '-' }}</p>
                </div>
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
