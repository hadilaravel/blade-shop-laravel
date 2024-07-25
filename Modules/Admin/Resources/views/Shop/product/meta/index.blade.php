@extends('admin::layouts.master')

@section('head-tag')
<title>ویژگی های محصول</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header"> ویژگی های محصول</h2>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.shop.product.meta.create' , $product->id) }}" class="btn btn-info btn-sm">ایجاد ویژگی محصول </a>
            </section>
        </div>
    </div>


    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">ویژگی های محصول  {{ $product->name }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام محصول</th>
                                    <th>ویژگی</th>
                                    <th>مقدار</th>
                                    <th>تاریخ ساخت</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($product->metas as $key => $meta)
                                    <tr>
                                        <th>{{ convertEnglishToPersian($key += 1) }}</th>
                                        <td>{{ $meta->product->name }}</td>
                                        <td>{{ $meta->meta_key }}</td>
                                        <td>{{ $meta->meta_value }}</td>
                                        <td>
                                            {{ convertEnglishToPersian(jdate($meta->created_at)->format('Y-m-d')) }}
                                        </td>
                                        <td>
                                            <form class="d-inline " action="{{ route('admin.shop.product.meta.destroy', [$meta->id , $product->id]) }}" method="post">
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
