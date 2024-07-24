@extends('admin::layouts.master')

@section('head-tag')
<title>گالری محصول</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header"> گالری  محصول</h2>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.shop.product.gallery.create' , $product->id) }}" class="btn btn-info btn-sm">ایجاد گالری محصول </a>
            </section>
        </div>
    </div>


    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title"> گالری محصول  {{ $product->name }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام محصول</th>
                                    <th> تصویر</th>
                                    <th>تاریخ ساخت</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($product->images as $key => $image)
                                    <tr>
                                        <th>{{ convertEnglishToPersian($key += 1) }}</th>
                                        <td>{{ $image->product->name }}</td>
                                        <td>
                                            <img src="{{ asset($image->image) }}" width="120px" height="120px">
                                        </td>
                                        <td>
                                            {{ convertEnglishToPersian(jdate($image->created_at)->format('Y-m-d')) }}
                                        </td>
                                        <td>
                                            <form class="d-inline " action="{{ route('admin.shop.product.gallery.destroy', [$image->id , $product->id]) }}" method="post">
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
