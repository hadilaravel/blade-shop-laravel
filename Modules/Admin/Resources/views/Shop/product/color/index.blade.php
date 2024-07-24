@extends('admin::layouts.master')

@section('head-tag')
<title>رنگ های محصول</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header"> رنگ های محصول</h2>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.shop.product.color.create' , $product->id) }}" class="btn btn-info btn-sm">ایجاد رنگ محصول </a>
            </section>
        </div>
    </div>


    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">رنگ های محصول  {{ $product->name }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام محصول</th>
                                    <th>نام رنگ</th>
                                    <th> رنگ</th>
                                    <th>افزایش قیمت</th>
                                    <th>تعداد موجود در انبار</th>
                                    <th>تاریخ ساخت</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($product->colors as $key => $color)
                                    <tr>
                                        <th>{{ convertEnglishToPersian($key += 1) }}</th>
                                        <td>{{ $color->product->name }}</td>
                                        <td>{{ $color->name }}</td>
                                        <td class="tdColor">
                                            <p class="pColor" style="background-color: {{ $color->color }}"></p>
                                        </td>
                                        <td>{{ priceFormat($color->price_increase) }} تومان</td>
                                        <td>{{ $color->sold_number }}</td>
                                        <td>
                                            {{ convertEnglishToPersian(jdate($color->created_at)->format('Y-m-d')) }}
                                        </td>
                                        <td>
                                            <form class="d-inline " action="{{ route('admin.shop.product.color.destroy', [$color->id , $product->id]) }}" method="post">
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
            </div>
        </div>
    </section>

@endsection
