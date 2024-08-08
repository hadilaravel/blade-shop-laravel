@extends('admin::layouts.master')

@section('head-tag')
<title> نقش ها</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header">  نقش ها</h2>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.role.create') }}" class="btn btn-info btn-sm">ایجاد  نقش  جدید</a>
            </section>
        </div>
    </div>


    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">نقش ها</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام نقش</th>
                                    <th>توضیح نقش</th>
                                    <th>دسترسی ها</th>
                                    <th>تاریخ ساخت</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($roles as $key => $role)
                                    <tr>
                                        <th>{{ $key += 1 }}</th>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($role->description , 40) }}</td>
                                        <td>
                                            @if(empty($role->permissions()->get()->toArray()))
                                                <span class="text-danger">برای این نقش هیچ سطح دسترسی تعریف نشده است</span>
                                            @else
                                                @foreach($role->permissions as $permission)
                                                    <a href="{{ route('admin.role.permission.delete' , [$role->id , $permission->id]) }}">
                                                        {{ $permission->name_perssion }}
                                                        <i class="fa fa-trash-o font-medium-3 mr-2" style="color: red"></i>
                                                    </a><br>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            {{ convertEnglishToPersian(jdate($role->created_at)->format('Y-m-d')) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.role.edit', $role->id) }}" class="success p-0" data-original-title="" title="">
                                                <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                            </a>
                                            <a href="{{ route('admin.role.permission.show', $role->id) }}" class="success p-0" data-original-title="" title="">
                                                <i class="fa fa-user font-medium-3 mr-2"></i>
                                            </a>
                                            <form class="d-inline " action="{{ route('admin.role.destroy', $role->id) }}" method="post">
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
                    {{ $roles->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </section>

@endsection
