@extends('admin::layouts.master')

@section('head-tag')
<title>{{ $title }}</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header">   {{ $title }}</h2>
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
                            <h4 class="card-title">  {{ $title }}</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th> نام</th>
                                    <th> لینک</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($socials as $key => $social)
                                    <tr>
                                        <td>@if($social->name_id == 1) اینستاگرام @elseif($social->name_id == 2) تلگرام @else واتساپ @endif </td>
                                        <td>{{ $social->link }}</td>

                                        <td>
                                            <a href="{{ route('admin.setting.social.edit', $social->id) }}" class="success p-0" data-original-title="" title="">
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
