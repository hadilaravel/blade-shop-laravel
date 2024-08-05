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
                                    <th>کد سفارش</th>
                                    <th>مجموع مبلغ سفارش (بدون تخفیف)</th>
                                    <th>مجموع تمامی مبلغ تخفیفات </th>
                                    <th>مبلغ تخفیف همه محصولات</th>
                                    <th>مبلغ نهایی</th>
                                    <th>وضعیت پرداخت</th>
                                    <th>شیوه پرداخت</th>
                                    <th>بانک</th>
                                    <th>وضعیت ارسال</th>
                                    <th>شیوه ارسال</th>
                                    <th>وضعیت سفارش</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $key => $order)
                                    <tr>
                                        <th>{{ convertEnglishToPersian($key += 1) }}</th>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ priceFormat($order->order_final_amount) }} تومان</td>
                                        <td>{{ priceFormat($order->order_discount_amount) }} تومان</td>
                                        <td>{{ priceFormat($order->order_total_products_discount_amount) }} تومان</td>
                                        <td>{{ priceFormat($order->order_final_amount -  $order->order_discount_amount) }} تومان</td>
                                        <td>{{ $order->payment_status_value }}</td>
                                        <td>{{ $order->payment_type_value }} </td>
                                        <td>{{ $order->payment->paymentable->gateway ?? '-' }}</td>
                                        <td>{{ $order->delivery_status_value }}</td>
                                        <td>{{ $order->delivery->name }}</td>
                                        <td>{{ $order->order_status_value }}</td>
                                        <td class="width-8-rem text-left">
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-info btn-sm btn-block dorpdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-tools"></i> عملیات
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a href="{{ route('admin.shop.order.show' , $order->id)  }}" class="dropdown-item text-right text-white bg-info"><i class="fa fa-eye "></i>مشاهده فاکتور</a>
                                                    <a href="{{ route('admin.shop.order.changeSendStatus' , $order->id)  }}" class="dropdown-item text-right text-white bg-info"><i class="icon-layers "></i>  تغیر وضعیت ارسال </a>
                                                    <a href="{{  route('admin.shop.order.changeOrderStatus' , $order->id) }}" class="dropdown-item text-right text-white bg-info"><i class="icon-layers"></i>  تغیر وضعیت سفارش </a>
                                                    <a href="{{ route('admin.shop.order.cancelOrder' , $order->id) }}" class="dropdown-item text-right text-white bg-info"><i class="icon-layers"></i> باطل کردن سفارش </a>
                                                </div>
                                            </div>
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
