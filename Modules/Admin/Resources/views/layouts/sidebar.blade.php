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

                <li class=" nav-item liClass" ><a ><span  data-i18n="" class="menu-title spanish">
                            بخش فروشگاه
                        </span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.shop.category.index') }}"><i class="fa fa-shopping-cart"></i><span data-i18n=""
                                                                                                                          class="menu-title"> دسته بندی محصول</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.shop.brand.index') }}"><i class="fa fa-shopping-cart"></i><span data-i18n=""
                                                                                                                                  class="menu-title"> برند های محصول</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.shop.product.index') }}"><i class="fa fa-shopping-cart"></i><span data-i18n=""
                                                                                                                               class="menu-title">محصولات</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.shop.storeroom.index') }}"><i class="fa fa-shopping-cart"></i><span data-i18n=""
                                                                                                                                 class="menu-title">انبار</span></a>
                </li>
                <li  class="has-sub nav-item"><a ><i class="fa fa-shopping-cart"></i><span data-i18n=""
                                                                                   class="menu-title"> نظرات</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('admin.shop.comment.index') }}" class="menu-item"> تمام نظرات </a>
                        </li>
                        <li><a href="{{ route('admin.shop.comment.answered') }}" class="menu-item">  نظرات پاسخ داده شده</a>
                        </li>
                        <li><a href="{{ route('admin.shop.comment.not-answer') }}" class="menu-item">  نظرات پاسخ داده نشده</a>
                        </li>
                    </ul>
                </li>

                <li class=" nav-item liClass" ><a ><span  data-i18n="" class="menu-title spanish">
                            بخش تخفیف ها
                        </span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.discount.copan.index') }}"><i class="fa fa-percent"></i><span data-i18n=""
                                                                                                                                  class="menu-title">کوپن تخفیف</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.discount.common.index') }}"><i class="fa fa-percent"></i><span data-i18n=""
                                                                                                                               class="menu-title">تخفیف عمومی</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.discount.amazing.index') }}"><i class="fa fa-percent"></i><span data-i18n=""
                                                                                                                         class="menu-title">تخفیفات شگفت انگیز</span></a>
                </li>

                <li class=" nav-item liClass" ><a ><span  data-i18n="" class="menu-title spanish">
                            بخش وبلاگ
                        </span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.blog.category.index') }}"><i class="icon-layers"></i><span data-i18n=""
                                                                                                                    class="menu-title"> دسته بندی پست</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.blog.post.index') }}"><i class="icon-layers"></i><span data-i18n=""
                                                                                                                          class="menu-title"> پست ها </span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.blog.label.index') }}"><i class="icon-layers"></i><span data-i18n=""
                                                                                                                      class="menu-title"> برچسب ها </span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.blog.faq.index') }}"><i class="icon-layers"></i><span data-i18n=""
                                                                                                                      class="menu-title">سوالات متداول</span></a>
                </li>
                <li  class="has-sub nav-item"><a ><i class="icon-layers"></i><span data-i18n=""
                                                                                          class="menu-title"> نظرات</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('admin.blog.comment.index') }}" class="menu-item"> تمام نظرات </a>
                        </li>
                        <li><a href="{{ route('admin.blog.comment.answered') }}" class="menu-item">  نظرات پاسخ داده شده</a>
                        </li>
                        <li><a href="{{ route('admin.blog.comment.not-answer') }}" class="menu-item">  نظرات پاسخ داده نشده</a>
                        </li>
                    </ul>
                </li>

                <li class=" nav-item liClass" ><a ><span data-i18n="" class="menu-title spanish">
                            بخش تیکت ها
                        </span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.ticket.category.index') }}"><i class="fa fa-ticket"></i><span data-i18n=""
                                                                                                                       class="menu-title"> دسته بندی تیکت ها </span></a>
                </li>
                <li  class="has-sub nav-item"><a ><i class="fa fa-ticket"></i><span data-i18n=""
                                                                                           class="menu-title"> تیکت ها</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('admin.ticket.index') }}" class="menu-item"> تمام تیکت ها </a>
                        </li>
                        <li><a href="{{ route('admin.ticket.answered') }}" class="menu-item">  تیک های پاسخ داده شده</a>
                        </li>
                        <li><a href="{{ route('admin.ticket.not-answer') }}" class="menu-item">  تیکت های پاسخ داده نشده</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
