@extends('admin::layouts.master')

@section('head-tag')
<title>دسته بندی تیکت ها</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header">دسته بندی تیکت ها</h2>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.ticket.category.create') }}" class="btn btn-info btn-sm">ایجاد دسته بندی تیکت  </a>
            </section>
        </div>
    </div>


    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">دسته بندی تیکت ها</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ ساخت</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($ticketCategories as $key => $ticketCategory)
                                    <tr>
                                        <th>{{ convertEnglishToPersian($key += 1) }}</th>
                                        <td>{{ $ticketCategory->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.ticket.category.status', $ticketCategory->id) }}" class="btn btn-{{ $ticketCategory->status == 1 ? 'success' : 'danger' }} btn-sm"><i class="fa fa-{{ $ticketCategory->status == 1 ? 'check' : 'window-close' }}"></i> </a>
                                        </td>
                                        <td>
                                            {{ convertEnglishToPersian(jdate($ticketCategory->created_at)->format('Y-m-d')) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.ticket.category.edit', $ticketCategory->id) }}" class="success p-0" data-original-title="" title="">
                                                <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                            </a>
                                            <form class="d-inline " action="{{ route('admin.ticket.category.destroy', $ticketCategory->id) }}" method="post">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <button class="danger p-0 border-0 bg-white outloneLi" data-original-title="" title="">
                                                    <i class="fa fa-trash-o font-medium-3 mr-2 "></i>
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
                {{ $ticketCategories->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>

@endsection
