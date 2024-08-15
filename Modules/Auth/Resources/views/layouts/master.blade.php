<!DOCTYPE html>
<html lang="fa" dir="rtl">
    <head>
        @include('auth::layouts.head-tag')
        @yield('head-tag')
    </head>
    <body class="bg-gray-50">

    <div class="flex justify-center items-center text-right h-screen w-96 mx-auto">
        <div class="shadow-xl rounded-2xl p-8 bg-white">
            @yield('content')
        </div>
    </div>

    @include('sweetalert::alert')

    @yield('script')
    </body>
</html>
