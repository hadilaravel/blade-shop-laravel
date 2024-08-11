@extends('admin::layouts.master')

@section('head-tag')
<title> تنظیمات</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header">   تنظیمات</h2>
{{--            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">--}}
{{--                <a href="{{ route('admin.article.create') }}" class="btn btn-info btn-sm">ایجاد  مقاله </a>--}}
{{--            </section>--}}
        </div>
    </div>


    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">  تنظیمات</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th> عنوان</th>
                                    <th>کلمات کلیدی</th>
                                    <th>آیکون</th>
                                    <th>متا توضیحات</th>
                                    <th> توضیحات فوتر</th>
                                    <th> لوگو هدر</th>
                                    <th> لوگو فوتر</th>
                                    <th> تنظیمات فوتر</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $setting->title }}</td>
                                        <td>{{ $setting->keywords }}</td>
                                        <td>
                                            <img src="{{ asset($setting->icon) }}" width="100px" height="100px">
                                        </td>
                                        <td>{{  \Illuminate\Support\Str::limit($setting->description , 20) }}</td>
                                        <td>{{  \Illuminate\Support\Str::limit($setting->body , 5) }}</td>
                                        <td>
                                            <img src="{{ asset($setting->logo_header) }}" width="100px" height="100px">
                                        </td>
                                        <td>
                                            <img src="{{ asset($setting->logo_footer) }}" width="100px" height="100px">
                                        </td>

                                        <td class="width-8-rem text-left">
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-info btn-sm btn-block dorpdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-tools"></i> تنظیمات فوتر
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a href="{{ route('admin.setting.social.index') }}" class="dropdown-item text-right text-white bg-info">  شبکه های اجتماعی</a>
                                                    <a href="{{ route('admin.setting.contact.index') }}" class="dropdown-item text-right text-white bg-info">  ارتباط با ما </a>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.setting.edit', $setting->id) }}" class="success p-0" data-original-title="" title="">
                                                <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                            </a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
