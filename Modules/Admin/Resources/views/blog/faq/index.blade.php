@extends('admin::layouts.master')

@section('head-tag')
<title>سوالات متداول</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header">سوالات متداول</h2>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.blog.faq.create') }}" class="btn btn-info btn-sm">ایجاد سوال متداول  </a>
            </section>
        </div>
    </div>


    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title"> سوالات متداول</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>سوال</th>
                                    <th>جواب</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ ساخت</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($faqs as $key => $faq)
                                    <tr>
                                        <th>{{ convertEnglishToPersian($key += 1) }}</th>
                                        <td>{{ $faq->question }}</td>
                                        <td>{{ $faq->answer }}</td>
                                        <td>
                                            <a href="{{ route('admin.blog.faq.status', $faq->id) }}" class="btn btn-{{ $faq->status == 1 ? 'success' : 'danger' }} btn-sm"><i class="fa fa-{{ $faq->status == 1 ? 'check' : 'window-close' }}"></i> </a>
                                        </td>
                                        <td>
                                            {{ convertEnglishToPersian(jdate($faq->created_at)->format('Y-m-d')) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.blog.faq.edit', $faq->id) }}" class="success p-0" data-original-title="" title="">
                                                <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                            </a>
                                            <form class="d-inline " action="{{ route('admin.blog.faq.destroy', $faq->id) }}" method="post">
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
                {{ $faqs->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>

@endsection
