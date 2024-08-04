@extends('admin::layouts.master')

@section('head-tag')
<title>روش های ارسال</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header">  روش های ارسال</h2>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.shop.delivery.create') }}" class="btn btn-info btn-sm">ایجاد روش ارسال </a>
            </section>
        </div>
    </div>


    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">روش های ارسال</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام روش ارسال</th>
                                    <th>هزینه ارسال</th>
                                    <th>زمان ارسال</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ ساخت</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($deliveries as $key => $delivery)
                                    <tr>
                                        <th>{{ convertEnglishToPersian($key += 1) }}</th>
                                        <td>{{ $delivery->name }}</td>
                                        <td>{{  priceFormat($delivery->amount) }}تومان </td>
                                        <td>{{ $delivery->delivery_time . ' - ' . $delivery->delivery_time_unit }}</td>
                                        <td>
                                            <a href="{{ route('admin.shop.delivery.status', $delivery->id) }}" class="btn btn-{{ $delivery->status == 1 ? 'success' : 'danger' }} btn-sm"><i class="fa fa-{{ $delivery->status == 1 ? 'check' : 'window-close' }}"></i> </a>
                                        </td>
                                        <td>
                                            {{ convertEnglishToPersian(jdate($delivery->created_at)->format('Y-m-d')) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.shop.delivery.edit', $delivery->id) }}" class="success p-0" data-original-title="" title="">
                                                <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                            </a>
                                            <form class="d-inline " action="{{ route('admin.shop.delivery.destroy', $delivery->id) }}" method="post">
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
                {{ $deliveries->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>

@endsection
