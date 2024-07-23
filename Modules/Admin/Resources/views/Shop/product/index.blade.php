@extends('admin::layouts.master')

@section('head-tag')
<title>محصولات</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header">محصولات</h2>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.shop.product.create') }}" class="btn btn-info btn-sm">ایجاد محصول </a>
            </section>
        </div>
    </div>


    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">محصولات</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام</th>
                                    <th>قیمت</th>
                                    <th> وضعیت قابل فروش</th>
                                    <th> برند</th>
                                    <th> دسته بندی</th>
                                    <th>تصویر</th>
                                    <th> وضعیت</th>
                                    <th>تاریخ ساخت</th>
                                    <th> امکانات محصول</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <th>{{ convertEnglishToPersian($key += 1) }}</th>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ priceFormat($product->price) }} تومان</td>
                                        <td class=" text-{{ $product->marketable == 0 ? 'danger' : 'success' }}">{{ $product->marketable == 0 ? 'غیرفعال' : 'فعال' }}</td>
                                        <td>{{ $product->brand->persian_name }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>
                                            <img src="{{ asset($product->image) }}" width="80px" height="80px">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.shop.product.status', $product->id) }}" class="btn btn-{{ $product->status == 1 ? 'success' : 'danger' }} btn-sm"><i class="fa fa-{{ $product->status == 1 ? 'check' : 'window-close' }}"></i> </a>
                                        </td>
                                        <td>
                                            {{ convertEnglishToPersian(jdate($product->created_at)->format('Y-m-d')) }}
                                        </td>

                                        <td class="width-8-rem text-left">
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-info btn-sm btn-block dorpdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-tools"></i> امکانات محصول
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a href="{{ route('admin.shop.product.edit', $product->id) }}" class="dropdown-item text-right text-white bg-secondary"><i class="fa fa-eye "></i>رنگ ها</a>
                                                    <a href="{{ route('admin.shop.product.edit', $product->id) }}" class="dropdown-item text-right text-white bg-secondary"><i class="fa fa-eye "></i>گالری</a>
                                                    <a href="{{ route('admin.shop.product.edit', $product->id) }}" class="dropdown-item text-right text-white bg-secondary"><i class="fa fa-eye "></i>گارانتی ها</a>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="width-8-rem text-left">
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-success btn-sm btn-block dorpdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-tools"></i> عملیات
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a href="{{ route('admin.shop.product.edit', $product->id) }}" class="dropdown-item text-right text-white bg-secondary"><i class="fa fa-edit "></i>  ویرایش  </a>
                                                    <form class="d-inline" action="{{ route('admin.shop.product.destroy', $product->id) }}" method="post">
                                                        @csrf
                                                        {{ method_field('delete') }}
                                                        <button  class="dropdown-item bg-danger text-white text-right" type="submit">
                                                            <i class="fa fa-trash-o font-medium-3"></i>
                                                            حذف
                                                        </button>
                                                    </form>
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
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>

@endsection
