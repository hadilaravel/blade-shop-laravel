@extends('admin::layouts.master')

@section('head-tag')
<title>انبار</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header">  انبار</h2>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
{{--                <a href="{{ route('admin.shop.category.create') }}" class="btn btn-info btn-sm">ایجاد دسته بندی محصول </a>--}}
            </section>
        </div>
    </div>


    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">انبار</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام کالا</th>
                                    <th>تصویر کالا</th>
                                    <th>تعداد قابل فروش</th>
                                    <th> تعداد رزرو شده</th>
                                    <th> تعداد فروخته شده</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <th>{{ convertEnglishToPersian($key += 1) }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            <img src="{{ asset($product->image) }}" width="80px" height="80px">
                                        </td>
                                        <td>{{ $product->marketable_number }}</td>
                                        <td>{{ $product->frozen_number }}</td>
                                        <td>{{ $product->sold_number }}</td>
                                        <td>
                                            <a href="{{ route('admin.shop.storeroom.add-to-store', $product->id) }}" class="success p-0" data-original-title="" title="">
                                                <i class="fa fa-plus-square font-medium-3 mr-2"></i>
                                            </a>
                                            <a href="{{ route('admin.shop.storeroom.edit', $product->id) }}" class="success p-0" data-original-title="" title="">
                                                <i class="fa fa-pencil font-medium-3 mr-2"></i>
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
