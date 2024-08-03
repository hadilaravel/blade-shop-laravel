@extends('admin::layouts.master')

@section('head-tag')
<title>کوپن تخفیف</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header">کوپن تخفیف</h2>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.discount.copan.create') }}" class="btn btn-info btn-sm">ایجاد کوپن تخفیف </a>
            </section>
        </div>
    </div>


    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">کوپن تخفیف</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>کد تخفیف</th>
                                    <th>میزان تخفیف</th>
                                    <th>نوع تخفیف</th>
                                    <th>سقف تخفیف</th>
                                    <th>نوع کوپن</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ شروع</th>
                                    <th>تاریخ پایان</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($copans as $key => $copan)
                                    <tr>
                                        <th>{{ convertEnglishToPersian($key += 1) }}</th>
                                        <th>{{ $copan->code }}</th>
                                        <th>{{ priceFormat($copan->amount) }} {{ $copan->amount_type == 0 ? 'درصد' : 'تومان' }}</th>
                                        <th>{{ $copan->amount_type == 0 ? 'درصدی' : 'عددی' }}</th>
                                        <th>{{ priceFormat($copan->discount_ceiling) ?? '-' }} تومان </th>
                                        <th>{{ $copan->type == 0 ? 'عمومی' : 'خصوصی' }}</th>
                                        <td>
                                            <a href="{{ route('admin.discount.copan.status', $copan->id) }}" class="btn btn-{{ $copan->status == 1 ? 'success' : 'danger' }} btn-sm"><i class="fa fa-{{ $copan->status == 1 ? 'check' : 'window-close' }}"></i> </a>
                                        </td>
                                        <td>
                                            {{ convertEnglishToPersian(jdate($copan->start_date)->format('Y-m-d')) }}
                                        </td>
                                        <td>
                                            {{ convertEnglishToPersian(jdate($copan->end_date)->format('Y-m-d')) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.discount.copan.edit', $copan->id) }}" class="success p-0" data-original-title="" title="">
                                                <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                            </a>
                                            <form class="d-inline " action="{{ route('admin.discount.copan.destroy', $copan->id) }}" method="post">
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
                {{ $copans->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>

@endsection
