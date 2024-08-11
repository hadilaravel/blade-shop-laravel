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

                <li class=" nav-item"><a href="{{ route('home.index') }}"><i class="fa fa-shopping-bag"></i><span data-i18n=""
                                                                                                          class="menu-title">فروشگاه</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.index') }}"><i class="icon-home"></i><span data-i18n=""
                                                                                            class="menu-title">داشبورد</span></a>
                </li>

                <li class=" nav-item liClass" ><a ><span  data-i18n="" class="menu-title spanish">
                            بخش فروشگاه
                        </span></a>
                </li>
                @permission('PermissionCategoryProduct')
                <li class=" nav-item"><a href="{{ route('admin.shop.category.index') }}"><i class="fa fa-shopping-cart"></i><span data-i18n=""
                                                                                                                          class="menu-title"> دسته بندی محصول</span></a>
                </li>
                @endpermission

                @permission('PermissionBrand')
                <li class=" nav-item"><a href="{{ route('admin.shop.brand.index') }}"><i class="fa fa-shopping-cart"></i><span data-i18n=""
                                                                                                                                  class="menu-title"> برند های محصول</span></a>
                </li>
                @endpermission

                @permission('PermissionBanner')
                <li class=" nav-item"><a href="{{ route('admin.shop.banner.index') }}"><i class="fa fa-shopping-cart"></i><span data-i18n=""
                                                                                                                               class="menu-title">بنر ها</span></a>
                </li>
                @endpermission

                @permission('PermissionProduct')
                <li class=" nav-item"><a href="{{ route('admin.shop.product.index') }}"><i class="fa fa-shopping-cart"></i><span data-i18n=""
                                                                                                                               class="menu-title">محصولات</span></a>
                </li>
                @endpermission

                @permission('PermissionStoreRoom')
                <li class=" nav-item"><a href="{{ route('admin.shop.storeroom.index') }}"><i class="fa fa-shopping-cart"></i><span data-i18n=""
                                                                                                                                 class="menu-title">انبار</span></a>
                </li>
                @endpermission

                @permission('PermissionDelivery')
                <li class=" nav-item"><a href="{{ route('admin.shop.delivery.index') }}"><i class="fa fa-shopping-cart"></i><span data-i18n=""
                                                                                                                                   class="menu-title">روش های ارسال</span></a>
                </li>
                @endpermission

                @permission('PermissionPayment')
                <li  class="has-sub nav-item"><a ><i class="fa fa-shopping-cart"></i><span data-i18n=""
                                                                                           class="menu-title"> پرداخت ها</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('admin.shop.payment.index') }}" class="menu-item">تمام پرداخت ها</a></li>
                        <li><a href="{{ route('admin.shop.payment.online') }}" class="menu-item"> پرداخت های آنلاین</a></li>
                        <li><a href="{{ route('admin.shop.payment.offline') }}" class="menu-item">پرداخت های آفلاین</a></li>
                        <li><a href="{{ route('admin.shop.payment.cash') }}" class="menu-item">پرداخت در محل</a></li>
                    </ul>
                </li>
                @endpermission

                @permission('PermissionOrder')
                <li  class="has-sub nav-item"><a ><i class="fa fa-shopping-cart"></i><span data-i18n=""
                                                                                           class="menu-title"> سفارشات</span></a>
                    <ul class="menu-content">
                        <li><a href="{{ route('admin.shop.order.newOrders') }}" class="menu-item">جدید</a></li>
                        <li><a href="{{ route('admin.shop.order.sending') }}" class="menu-item">در حال ارسال</a></li>
                        <li><a href="{{ route('admin.shop.order.unpaid') }}" class="menu-item">پرداخت نشده</a></li>
                        <li><a href="{{ route('admin.shop.order.canceled') }}" class="menu-item">باطل شده</a></li>
                        <li><a href="{{ route('admin.shop.order.returned') }}" class="menu-item">مرجوعی</a></li>
                        <li><a href="{{ route('admin.shop.order.all') }}" class="menu-item">تمام سفارشات</a></li>
                    </ul>
                </li>
                @endpermission

                @permission('PermissionCommentProduct')
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
                @endpermission

                <li class="nav-item liClass" ><a ><span  data-i18n="" class="menu-title spanish">
                            بخش کاربران
                        </span></a>
                </li>
                @permission('PermissionUserAdmin')
                <li class=" nav-item"><a href="{{ route('admin.user-admin.index') }}"><i class="fa fa-user"></i><span data-i18n=""
                                                                                                                             class="menu-title">کاربران ادمین</span></a>
                </li>
                @endpermission

                @permission('PermissionCustomer')
                <li class=" nav-item"><a href="{{ route('admin.user.customer.index') }}"><i class="fa fa-user"></i><span data-i18n=""
                                                                                                                              class="menu-title">مشتریان</span></a>
                </li>
                @endpermission

                @permission('PermissionRole')
                <li class="nav-item liClass" ><a ><span  data-i18n="" class="menu-title spanish">
                            بخش سطوح دسترسی
                        </span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.role.index') }}"><i class="fa fa-lock"></i><span data-i18n=""
                                                                                                                          class="menu-title">مدیریت نقش ها</span></a>
                </li>
                @endpermission

                @permission('PermissionDiscount')
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
                @endpermission


                <li class=" nav-item liClass" ><a ><span  data-i18n="" class="menu-title spanish">
                            بخش وبلاگ
                        </span></a>
                </li>
                @permission('PermissionCategoryPost')
                <li class=" nav-item"><a href="{{ route('admin.blog.category.index') }}"><i class="icon-layers"></i><span data-i18n=""
                                                                                                                    class="menu-title"> دسته بندی پست</span></a>
                </li>
                @endpermission

                @permission('PermissionPost')
                <li class=" nav-item"><a href="{{ route('admin.blog.post.index') }}"><i class="icon-layers"></i><span data-i18n=""
                                                                                                                          class="menu-title"> پست ها </span></a>
                </li>
                @endpermission

                @permission('PermissionLabel')
                <li class=" nav-item"><a href="{{ route('admin.blog.label.index') }}"><i class="icon-layers"></i><span data-i18n=""
                                                                                                                      class="menu-title"> برچسب ها </span></a>
                </li>
                @endpermission

                @permission('PermissionFaq')
                <li class=" nav-item"><a href="{{ route('admin.blog.faq.index') }}"><i class="icon-layers"></i><span data-i18n=""
                                                                                                                      class="menu-title">سوالات متداول</span></a>
                </li>
                @endpermission

                @permission('PermissionCommentPost')
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
                @endpermission

                @permission('PermissionNotify')
                <li class=" nav-item liClass" ><a ><span  data-i18n="" class="menu-title spanish">
                           اطلاع رسانی
                        </span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.notify.email.index') }}"><i class="fa fa-bars"></i><span data-i18n=""
                                                                                                                             class="menu-title">اطلاعیه ایمیلی</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.notify.sms.index') }}"><i class="fa fa-bars"></i><span data-i18n=""
                                                                                                                              class="menu-title">اطلاعیه پیامکی</span></a>
                </li>
                @endpermission

                @permission('PermissionTicket')
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
                @endpermission

                @permission('PermissionSetting')
                <li class=" nav-item liClass" ><a ><span  data-i18n="" class="menu-title spanish">
                            بخش تنظیمات
                        </span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.setting.index') }}"><i class="fa fa-cogs"></i><span data-i18n=""
                                                                                                                             class="menu-title">تنظیمات سایت</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.setting.sms-setting.index') }}"><i class="fa fa-cogs"></i><span data-i18n=""
                                                                                                                              class="menu-title">تنظیمات ارسال پیامک</span></a>
                </li>
                <li class=" nav-item"><a href="{{ route('admin.discount.amazing.index') }}"><i class="fa fa-cogs"></i><span data-i18n=""
                                                                                                                               class="menu-title">تنظیمات ارسال ایمیل</span></a>
                </li>
                @endpermission

            </ul>
        </div>
    </div>
    <div class="sidebar-background"></div>
</div>
