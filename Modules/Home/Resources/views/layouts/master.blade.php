<!DOCTYPE html>
<html lang="fa" dir="rtl">
    <head>
        @include('home::layouts.head-tag' , compact('setting'))
        @yield('head-tag')
    </head>
    <body  class="bg-gray-50">

    @include('home::layouts.header' , compact('setting'))

    <div class="max-w-[1440px] mx-auto px-3">
       @yield('content')
    </div>

    @include('home::layouts.footer' , compact('setting'))

    @include('sweetalert::alert')

    @include('home::layouts.script')
    @yield('script')
    </body>
</html>
