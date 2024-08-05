@extends('admin::layouts.master')

@section('head-tag')
<title>مشتریان</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header">مشتریان</h2>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
{{--                <a href="{{ route('admin.shop.brand.create') }}" class="btn btn-info btn-sm">ایجاد برند </a>--}}
            </section>
        </div>
    </div>


    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">مشتریان</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام</th>
                                    <th>ایمیل</th>
                                    <th>شماره تلفن</th>
                                    <th>کد ملی</th>
                                    <th>وضعیت</th>
                                    <th>پروفایل</th>
                                    <th>تاریخ ساخت</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($customers as $key => $customer)
                                    <tr>
                                        <th>{{ convertEnglishToPersian($key += 1) }}</th>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->email ?? '-' }}</td>
                                        <td>{{ $customer->mobile ?? '-' }}</td>
                                        <td>{{ $customer->national_code ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('admin.user.customer.activation', $customer->id) }}" class="btn btn-{{ $customer->activation == 1 ? 'success' : 'danger' }} btn-sm"><i class="fa fa-{{ $customer->activation == 1 ? 'check' : 'window-close' }}"></i> </a>
                                        </td>
                                        <td>
                                            @if(!empty($customer->profile))
                                            <img src="{{ asset($customer->profile) }}" width="100px" height="100px">
                                            @else
                                                ندارد
                                            @endif
                                        </td>
                                        <td>
                                            {{ convertEnglishToPersian(jdate($customer->created_at)->format('Y-m-d')) }}
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
