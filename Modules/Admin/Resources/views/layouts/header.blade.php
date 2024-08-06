<nav class="navbar navbar-expand-lg navbar-light bg-faded">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" data-toggle="collapse" class="navbar-toggle d-lg-none float-right"><span
                    class="sr-only">تغییر ناوبری </span><span class="icon-bar"></span><span class="icon-bar"></span><span
                    class="icon-bar"></span></button><span class="d-lg-none navbar-right navbar-collapse-toggle"><a
                    class="open-navbar-container"><i class="ft-more-vertical"></i></a></span><a id="navbar-fullscreen"
                                                                                                href="javascript:;" class="ml-2 display-inline-block apptogglefullscreen"><i
                    class="ft-maximize blue-grey darken-4 toggleClass"></i>
                <p class="d-none">تمام صفحه</p>
            </a>
        </div>
        <div class="navbar-container">
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav">
                    <li class="dropdown nav-item mr-0"><a id="dropdownBasic3" href="#" data-toggle="dropdown"
                                                          class="nav-link position-relative dropdown-user-link dropdown-toggle"><span
                                class="avatar avatar-online"><img id="navbar-avatar"
                                                                  src="{{ asset(auth()->user()->profile) }}" alt="avatar" /></span>
                            <p class="d-none">تنظیمات کاربر</p>
                        </a>
                        <div aria-labelledby="dropdownBasic3" class="dropdown-menu dropdown-menu-left">
                            <div class="arrow_box_right">
                                <a href="" class="dropdown-item  d-flex justify-content-between align-items-center">
                                    <i class="fa fa-user" style="font-size: 20px"></i>
                                    <span>پروفایل</span>
                                </a>
                                <a href="{{ route('logout') }}" class="dropdown-item  d-flex justify-content-between align-items-center">
                                    <i class="fa fa-sign-out" style="font-size: 20px"></i>
                                    <span>خروج</span>
                                </a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
