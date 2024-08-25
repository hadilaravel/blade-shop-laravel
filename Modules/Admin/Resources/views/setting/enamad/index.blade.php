@extends('admin::layouts.master')

@section('head-tag')
<title>اینماد</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header">اینماد</h2>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            </section>
        </div>
    </div>


    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title"> اینماد</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th> تصویر اینماد</th>
                                    <th> لینک اینماد</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                         <img src="{{ asset($enamad->image) }}" width="100px" height="100px">
                                        </td>
                                        <td>{{ $enamad->link }}</td>
                                        <td>
                                            <a href="{{ route('admin.setting.enamad.edit', $enamad->id) }}" class="success p-0" data-original-title="" title="">
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
