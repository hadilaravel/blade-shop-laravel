<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin::layouts-login.head-tag')
    @yield('head-tag')

</head>

<body data-col="1-column" class=" 1-column  blank-page blank-page">


      @yield('content')

    @include('sweetalert::alert')


    @include('admin::layouts-login.script')
    @yield('script')


</body>
</html>
