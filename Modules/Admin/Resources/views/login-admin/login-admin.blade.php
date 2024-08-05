@extends('admin::layouts-login.master')

@section('head-tag')
    <title> ورود</title>
@endsection

@section('content')


    <div class="wrapper"><!--Login Page Starts-->
        <section id="login">
            <div class="container-fluid">
                <div class="row full-height-vh">
                    <div class="col-12 d-flex align-items-center justify-content-center gradient-aqua-marine">
                        <div class="card px-4 py-2 box-shadow-2 width-400">
                            <div class="card-header text-center">
                                <h4 class="text-uppercase text-bold-400 grey darken-1">ورود</h4>
                            </div>
                            <div class="card-body">
                                <div class="card-block">
                                    <form method="post" action="{{ route('admin.admin-login.store') }}">
                                        @csrf
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="text" class="form-control form-control-lg" name="username" id="inputEmail" placeholder="نام کاربری"  >
                                                @error('username')
                                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                                  <strong>
                                                      {{ $message }}
                                                </strong>
                                                  </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <input type="password" class="form-control form-control-lg" name="password" id="inputPass" placeholder="رمز عبور" >
                                                @error('password')
                                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                                  <strong>
                                                      {{ $message }}
                                                </strong>
                                                  </span>
                                                @enderror
                                            </div>
                                        </div>

                                        @error('error')
                                        <span class="alert_required bg-danger text-white p-1  rounded" role="alert">
                                                  <strong>
                                                      {{ $message }}
                                                </strong>
                                        </span>
                                        @enderror

                                        <div class="form-group mt-4">
                                            <div class="text-center col-md-12">
                                                <button type="submit" class="btn btn-danger px-4 py-2 text-uppercase white font-small-4 box-shadow-2 border-0">ارسال</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Login Page Ends-->
    </div>




@endsection
