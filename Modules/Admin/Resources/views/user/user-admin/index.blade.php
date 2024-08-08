@extends('admin::layouts.master')

@section('head-tag')
<title> کاربران ادمین</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header"> کاربران ادمین</h2>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.user-admin.create') }}" class="btn btn-info btn-sm">ایجاد کاربر  ادمین </a>
            </section>
        </div>
    </div>


    <section id="extended">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title-wrap bar-success">
                            <h4 class="card-title">کاربران ادمین</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام کاربری</th>
                                    <th>وضعیت</th>
                                    <th>نقش</th>
                                    <th>پروفایل</th>
                                    <th>تاریخ ساخت</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($userAdmins as $key => $userAdmin)
                                    <tr>
                                        <th>{{ convertEnglishToPersian($key += 1) }}</th>
                                        <td>{{ $userAdmin->name }}</td>
                                        <td>
                                            @if(!$userAdmin->hasRole('super admin'))
                                            <a href="{{ route('admin.user-admin.status', $userAdmin->id) }}" class="btn btn-{{ $userAdmin->activation == 1 ? 'success' : 'danger' }} btn-sm"><i class="fa fa-{{ $userAdmin->activation == 1 ? 'check' : 'window-close' }}"></i> </a>
                                            @else
                                                فعال
                                            @endif
                                        </td>
                                        <td>
                                            @if(!$userAdmin->hasRole('super admin'))
                                            @forelse($userAdmin->roles as $role)
                                                    <a  href="{{ route('admin.user-admin.role.delete' , [$userAdmin->id , $role->id]) }}">
                                                        {{ $role->name }}
                                                        <i class="fa fa-trash-o font-medium-3 mr-2" style="color: red"></i>
                                                    </a><br>
                                            @empty
                                                <p style="color: red">
                                               نقشی وجود ندارد
                                                </p>
                                            @endforelse
                                            @else
                                                ادمین کل
                                            @endif
                                        </td>
                                        <td>
                                            <img src="{{ asset($userAdmin->profile) }}" width="100px" height="100px">
                                        </td>
                                        <td>
                                            {{ convertEnglishToPersian(jdate($userAdmin->created_at)->format('Y-m-d')) }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.user-admin.edit', $userAdmin->id) }}" class="success p-0" data-original-title="" title="">
                                                <i class="fa fa-pencil font-medium-3 mr-2"></i>
                                            </a>
                                            <a href="{{ route('admin.user-admin.role.show', $userAdmin->id) }}" class="success p-0" data-original-title="" title="">
                                                <i class="fa fa-user font-medium-3 mr-2"></i>
                                            </a>
                                            @if(!$userAdmin->hasRole('super admin'))
                                                <form class="d-inline " action="{{ route('admin.user-admin.destroy', $userAdmin->id) }}" method="post">
                                                    @csrf
                                                    {{ method_field('delete') }}
                                                    <button class="danger p-0 border-0 bg-white outloneLi" data-original-title="" title="">
                                                        <i class="fa fa-trash-o font-medium-3 mr-2"></i>
                                                    </button>
                                                </form>
                                            @endif
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
