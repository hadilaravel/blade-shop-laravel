<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin::layouts.head-tag')
    @yield('head-tag')

</head>

<body dir="rtl" data-col="2-columns" class=" 2-columns ">


    <div class="wrapper">
        @include('admin::layouts.header')

        @include('admin::layouts.sidebar')

        <div class="main-panel">
            <div class="main-content">
                <div class="content-wrapper">
                    <div class="container-fluid">
                      @yield('content')
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('sweetalert::alert')


    @include('admin::layouts.script')
    @yield('script')


</body>
</html>
