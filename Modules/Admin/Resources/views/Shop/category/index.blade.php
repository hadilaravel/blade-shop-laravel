@extends('admin::layouts.master')

@section('head-tag')
<title>دسته بندی محصول</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header">  دسته بندی محصول</h2>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.shop.category.create') }}" class="btn btn-info btn-sm">ایجاد دسته بندی محصول </a>
            </section>
        </div>
    </div>


    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title"> دسته بندی محصول</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام</th>
                                    <th>والد</th>
                                    <th>وضعیت</th>
                                    <th>تعداد زیر دسته ها</th>
                                    <th>تاریخ ساخت</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($categories as $key => $category)
                                    <tr>
                                        <th>{{ convertEnglishToPersian($key += 1) }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            {{ $category->parent->name ?? '-'}}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.shop.category.status', $category->id) }}" class="btn btn-{{ $category->status == 1 ? 'success' : 'danger' }} btn-sm"><i class="fa fa-{{ $category->status == 1 ? 'check' : 'window-close' }}"></i> </a>
                                        </td>
                                        <td>
                                           {{ $category->children->count() !== 0 ? convertEnglishToPersian($category->children->count()) : '-' }}
                                        </td>
                                        <td>
                                            {{ convertEnglishToPersian(jdate($category->created_at)->format('Y-m-d')) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.shop.category.edit', $category->id) }}" class="success p-0" data-original-title="" title="">
                                                <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                            </a>
                                            <form class="d-inline " action="{{ route('admin.shop.category.destroy', $category->id) }}" method="post">
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
                {{ $categories->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>

@endsection
