@extends('admin::layouts.master')

@section('head-tag')
<title>{{ $title }}</title>
@endsection

@section('content')


    <div class="row">
        <div class="col-12">
            <h2 class="content-header">{{ $title }}</h2>
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
                            <h4 class="card-title">{{ $title }}</h4>
                        </div>
                        @php
                          $colors = ['info' , 'primary' , 'success' , 'warning'  , 'danger'];
                           $indexArray = count($colors);
                           $index = 0;
                        @endphp
                        @forelse($ticketCategories as $ticketCategory)
                            <a class="text-white" href="{{ route('admin.ticket.index' , ['category' => $ticketCategory->id]) }}">
                              <div class="btn btn-{{ $colors[$index] }} p-1 {{ $ticketCategory->id == request()->get('category') ? 'divCart' : '' }}">
                               {{ $ticketCategory->name }}
                              </div>
                            </a>
                            @php
                             $index += 1;
                            if($index == $indexArray)
                            {
                              $index = 0;
                            }
                            @endphp
                        @empty

                        @endforelse
                    </div>
                    <div class="card-body">
                        <div class="card-block">
                            <table class="table table-responsive-md text-center">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>نویسنده</th>
                                    <th>دسته بندی</th>
                                    <th>پاسخ به</th>
                                    <th>توضیحات</th>
                                    <th>عکس</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ ساخت</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($tickets as $key => $ticket)
                                    <tr>
                                        <th>{{ convertEnglishToPersian($key += 1) }}</th>
                                        <td>{{ $ticket->title }}</td>
                                        <td>{{ $ticket->user->name }}</td>
                                        <td>{{ $ticket->category->name }}</td>
                                        <td>{{ $ticket->ticket_id == null ? '-' : \Illuminate\Support\Str::limit($ticket->parent->body , 30)  }}</td>
                                        <td>{{ $ticket->body }}</td>
                                        <td>
                                            @if(!empty($ticket->image))
                                            <img src="{{ asset($ticket->image) }}" width="80px" height="80px">
                                            @else
                                                'ندارد
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.ticket.status', $ticket->id) }}" class="btn btn-{{ $ticket->status == 1 ? 'success' : 'danger' }} btn-sm"><i class="fa fa-{{ $ticket->status == 1 ? 'check' : 'window-close' }}"></i> </a>
                                        </td>
                                        <td>
                                            {{ convertEnglishToPersian(jdate($ticket->created_at)->format('Y-m-d')) }}
                                        </td>

                                        <td class="width-8-rem text-left">
                                            <div class="dropdown">
                                                <a href="#" class="btn btn-success btn-sm btn-block dorpdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-tools"></i> عملیات
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                @if($ticket->ticket_id == null && $ticket->answers->count() !== 0)
                                                        <a href="{{ route('admin.ticket.answers' , $ticket->id) }}" class="dropdown-item text-right bg-blue text-white"><i class="fa fa-reply"></i>  پاسخ ها  </a>
                                                    @endif
                                                    <a href="{{ route('admin.ticket.show', $ticket->id) }}" class="dropdown-item text-right text-white bg-secondary"><i class="fa fa-eye "></i>  نمایش  </a>
                                                    <form class="d-inline" action="{{ route('admin.ticket.destroy', $ticket->id) }}" method="post">
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
                                @empty
                                    <p>تیکت وجود ندارد</p>
                                @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{  $tickets == null ? '' : $tickets->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </section>

@endsection
