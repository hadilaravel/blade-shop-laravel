<div data-active-color="white" data-background-color="black" data-image="../app-assets/img/sidebar-bg/01.jpg"
     class="app-sidebar">
    <div class="sidebar-header">
        <div class="logo clearfix"><a href="{{ route('admin.index') }}" class="logo-text float-right">
                <div class="logo-img"></div><span
                    class="text align-middle">پنل ادمین</span>
            </a><a id="sidebarToggle" href="javascript:;" class="nav-toggle d-none d-sm-none d-md-none d-lg-block"><i
                    data-toggle="expanded" class="ft-disc toggle-icon"></i></a><a id="sidebarClose" href="javascript:;"
                                                                                  class="nav-close d-block d-md-block d-lg-none d-xl-none"><i class="ft-circle"></i></a></div>
    </div>
    <div class="sidebar-content">
        <div class="nav-container">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">

                <li class=" nav-item"><a href="{{ route('admin.index') }}"><i class="icon-home"></i><span data-i18n=""
                                                                                            class="menu-title">داشبورد</span></a>
                </li>

                <li class=" nav-item" style="border-bottom: 1px white solid" ><a href="#"><span data-i18n="" class="menu-title">
                            بخش وبلاگ
                        </span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.blog.category.index') }}"><i class="icon-layers"></i><span data-i18n=""
                                                                                                                    class="menu-title"> دسته بندی </span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.blog.post.index') }}"><i class="icon-layers"></i><span data-i18n=""
                                                                                                                          class="menu-title"> پست ها </span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.blog.label.index') }}"><i class="icon-layers"></i><span data-i18n=""
                                                                                                                      class="menu-title"> برچسب ها </span></a>
                </li>

            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
