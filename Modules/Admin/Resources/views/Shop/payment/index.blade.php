@extends('admin::layouts.master')

@section('head-tag')
<title>{{ $title }}</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header">{{ $title }}</h2>
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
                            <h4 class="card-title">{{ $title }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>کد تراکنش</th>
                                    <th>بانک </th>
                                    <th>پرداخت کننده</th>
                                    <th>وضعیت پرداخت</th>
                                    <th>نوع پرداخت</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($payments as $key => $payment)
                                    <tr>
                                        <th>{{ convertEnglishToPersian($key += 1) }}</th>
                                        <td>{{ $payment->paymentable->transaction_id ?? '-' }}</td>
                                        <td>{{ $payment->paymentable->gateway ?? '-' }}</td>
                                        <td>{{ $payment->user->name }}</td>
                                        <td> @if($payment->status == 0) پرداخت نشده @elseif($payment->status == 1) پرداخت شده @elseif($payment->status == 2) باطل شده @else برگشت داده شده @endif </td>
                                        <td> @if($payment-> type == 0)  آنلاین   @elseif($payment-> type == 1) آفلاین @else  در محل @endif</td>
                                        <td>
                                            <a href="{{ route('admin.shop.payment.show', $payment->id) }}" class="success p-0" data-original-title="" title="">
                                                <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                            </a>
                                            <a href="{{ route('admin.shop.payment.canceled', $payment->id) }}" class="success p-0" data-original-title="" title="">
                                                <i class="fa fa-close font-medium-3 mr-2"></i>
                                            </a>
                                            <a href="{{ route('admin.shop.payment.returned', $payment->id) }}" class="success p-0" data-original-title="" title="">
                                                <i class="fa fa-reply font-medium-3 mr-2"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
