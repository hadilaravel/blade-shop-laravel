<?php

use \Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Blog\PostCategoryController;
use Modules\Admin\Http\Controllers\Blog\PostController;
use Modules\Admin\Http\Controllers\Blog\LabelController;
use Modules\Admin\Http\Controllers\Blog\CommentPostController;
use Modules\Admin\Http\Controllers\Ticket\TicketCategoryController;
use Modules\Admin\Http\Controllers\Ticket\TicketController;
use Modules\Admin\Http\Controllers\Shop\ProductCategoryController;
use Modules\Admin\Http\Controllers\Shop\BrandController;
use Modules\Admin\Http\Controllers\Shop\ProductController;
use Modules\Admin\Http\Controllers\Shop\ProductColorController;
use Modules\Admin\Http\Controllers\Shop\ProductGalleryController;
use Modules\Admin\Http\Controllers\Shop\GuaranteeController;
use Modules\Admin\Http\Controllers\Shop\ProductMetaController;
use Modules\Admin\Http\Controllers\Shop\FaqController;
use Modules\Admin\Http\Controllers\Shop\StoreRoomController;
use Modules\Admin\Http\Controllers\Shop\CommentProductController;
use Modules\Admin\Http\Controllers\Shop\CopanController;
use Modules\Admin\Http\Controllers\Shop\CommonDiscountController;
use Modules\Admin\Http\Controllers\Shop\AmazingSaleController;
use Modules\Admin\Http\Controllers\Shop\DeliveryController;
use Modules\Admin\Http\Controllers\Shop\PaymentController;
use Modules\Admin\Http\Controllers\Shop\OrderController;
use Modules\Admin\Http\Controllers\User\CustomerController;
use Modules\Admin\Http\Controllers\User\AdminLoginController;
use Modules\Admin\Http\Controllers\Notify\EmailController;
use Modules\Admin\Http\Controllers\Notify\SmsController;
use Modules\Admin\Http\Controllers\Setting\SmsSettingController;
use Modules\Admin\Http\Controllers\Access\RoleController;
use Modules\Admin\Http\Controllers\User\UserAdminController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('auth.check')->prefix('admin')->group(function (){

    Route::get('/' , [\Modules\Admin\Http\Controllers\AdminController::class , 'index' ])->name('admin.index');


    Route::prefix('user')->group(function (){

        //customer
         Route::middleware('permission:PermissionCustomer')->prefix('customer')->group(function () {
              Route::get('/', [CustomerController::class, 'index'])->name('admin.user.customer.index');
              Route::get('/activation/{user}', [CustomerController::class, 'activation'])->name('admin.user.customer.activation');
         });

        Route::middleware('permission:PermissionUserAdmin')->prefix('user-admin')->group(function (){
            Route::get('/' , [UserAdminController::class , 'index'])->name('admin.user-admin.index');
            Route::get('create' , [UserAdminController::class , 'create'])->name('admin.user-admin.create');
            Route::post('create/store' , [UserAdminController::class , 'store'])->name('admin.user-admin.store');
            Route::get('edit/{user}' , [UserAdminController::class , 'edit'])->name('admin.user-admin.edit');
            Route::put('update/{user}' , [UserAdminController::class , 'update'])->name('admin.user-admin.update');
            Route::delete('destroy/{user}' , [UserAdminController::class , 'destroy'])->name('admin.user-admin.destroy');
            Route::get('status/{user}' , [UserAdminController::class , 'status'])->name('admin.user-admin.status');
            Route::get('role/{user}' , [UserAdminController::class , 'roleShow'])->name('admin.user-admin.role.show');
            Route::post('role/{user}' , [UserAdminController::class , 'roleStore'])->name('admin.user-admin.role.store');
            Route::get('role/{user}/{role}' , [UserAdminController::class , 'roleDelete'])->name('admin.user-admin.role.delete');
        });

        Route::get('logout' , [AdminLoginController::class , 'logout'])->name('logout');


    });

    Route::middleware('permission:PermissionNotify')->prefix('notify')->group(function (){

          //   email
            Route::prefix('email')->group(function () {
                Route::get('/', [EmailController::class, 'index'])->name('admin.notify.email.index');
                Route::get('/create', [EmailController::class, 'create'])->name('admin.notify.email.create');
                Route::post('/store', [EmailController::class, 'store'])->name('admin.notify.email.store');
                Route::get('/edit/{email}', [EmailController::class, 'edit'])->name('admin.notify.email.edit');
                Route::put('/update/{email}', [EmailController::class, 'update'])->name('admin.notify.email.update');
                Route::delete('/destroy/{email}', [EmailController::class, 'destroy'])->name('admin.notify.email.destroy');
                Route::get('/status/{email}', [EmailController::class, 'status'])->name('admin.notify.email.status');
                Route::get('/send-mail/{email}', [EmailController::class, 'sendMail'])->name('admin.notify.email.send-mail');
            });

        //  sms
        Route::prefix('sms')->group(function () {
            Route::get('/', [SmsController::class, 'index'])->name('admin.notify.sms.index');
            Route::get('/create', [SmsController::class, 'create'])->name('admin.notify.sms.create');
            Route::post('/store', [SmsController::class, 'store'])->name('admin.notify.sms.store');
            Route::get('/edit/{sms}', [SmsController::class, 'edit'])->name('admin.notify.sms.edit');
            Route::put('/update/{sms}', [SmsController::class, 'update'])->name('admin.notify.sms.update');
            Route::delete('/destroy/{sms}', [SmsController::class, 'destroy'])->name('admin.notify.sms.destroy');
            Route::get('/status/{sms}', [SmsController::class, 'status'])->name('admin.notify.sms.status');
            Route::get('/send-sms/{sms}', [SmsController::class, 'sendSms'])->name('admin.notify.sms.send-sms');
        });

    });


    Route::prefix('shop')->group(function (){

        //order
        Route::middleware('permission:PermissionOrder')->prefix('order')->group(function () {
            Route::get('/', [OrderController::class, 'all'])->name('admin.shop.order.all');
            Route::get('/new-order', [OrderController::class, 'newOrders'])->name('admin.shop.order.newOrders');
            Route::get('/sending', [OrderController::class, 'sending'])->name('admin.shop.order.sending');
            Route::get('/unpaid', [OrderController::class, 'unpaid'])->name('admin.shop.order.unpaid');
            Route::get('/canceled', [OrderController::class, 'canceled'])->name('admin.shop.order.canceled');
            Route::get('/returned', [OrderController::class, 'returned'])->name('admin.shop.order.returned');
            Route::get('/show/{order}', [OrderController::class, 'show'])->name('admin.shop.order.show');
            Route::get('/show/{order}/detail', [OrderController::class, 'detail'])->name('admin.shop.order.show.detail');
            Route::get('/change-send-status/{order}', [OrderController::class, 'changeSendStatus'])->name('admin.shop.order.changeSendStatus');
            Route::get('/change-order-status/{order}', [OrderController::class, 'changeOrderStatus'])->name('admin.shop.order.changeOrderStatus');
            Route::get('/cancel-order/{order}', [OrderController::class, 'cancelOrder'])->name('admin.shop.order.cancelOrder');
        });

        //        category product
        Route::middleware('permission:PermissionCategoryProduct')->prefix('category')->group(function () {
            Route::get('/', [ProductCategoryController::class, 'index'])->name('admin.shop.category.index');
            Route::get('create', [ProductCategoryController::class, 'create'])->name('admin.shop.category.create');
            Route::post('store', [ProductCategoryController::class, 'store'])->name('admin.shop.category.store');
            Route::get('edit/{productCategory}', [ProductCategoryController::class, 'edit'])->name('admin.shop.category.edit');
            Route::put('update/{productCategory}', [ProductCategoryController::class, 'update'])->name('admin.shop.category.update');
            Route::delete('destroy/{productCategory}', [ProductCategoryController::class, 'destroy'])->name('admin.shop.category.destroy');
            Route::get('status/{productCategory}', [ProductCategoryController::class, 'status'])->name('admin.shop.category.status');
        });

        //payment
        Route::middleware('permission:PermissionPayment')->prefix('payment')->group(function () {
            Route::get('/', [PaymentController::class, 'index'])->name('admin.shop.payment.index');
            Route::get('online', [PaymentController::class, 'online'])->name('admin.shop.payment.online');
            Route::get('show/{payment}', [PaymentController::class, 'show'])->name('admin.shop.payment.show');
            Route::get('offline', [PaymentController::class, 'offline'])->name('admin.shop.payment.offline');
            Route::get('cash', [PaymentController::class, 'cash'])->name('admin.shop.payment.cash');
            Route::get('canceled/{payment}', [PaymentController::class, 'canceled'])->name('admin.shop.payment.canceled');
            Route::get('returned/{payment}', [PaymentController::class, 'returned'])->name('admin.shop.payment.returned');
        });

        //        delivery
        Route::middleware('permission:PermissionDelivery')->prefix('delivery')->group(function () {
            Route::get('/', [DeliveryController::class, 'index'])->name('admin.shop.delivery.index');
            Route::get('create', [DeliveryController::class, 'create'])->name('admin.shop.delivery.create');
            Route::post('store', [DeliveryController::class, 'store'])->name('admin.shop.delivery.store');
            Route::get('edit/{delivery}', [DeliveryController::class, 'edit'])->name('admin.shop.delivery.edit');
            Route::put('update/{delivery}', [DeliveryController::class, 'update'])->name('admin.shop.delivery.update');
            Route::delete('destroy/{delivery}', [DeliveryController::class, 'destroy'])->name('admin.shop.delivery.destroy');
            Route::get('status/{delivery}', [DeliveryController::class, 'status'])->name('admin.shop.delivery.status');
        });

        //        brand product
        Route::middleware('permission:PermissionBrand')->prefix('brand')->group(function () {
            Route::get('/', [BrandController::class, 'index'])->name('admin.shop.brand.index');
            Route::get('create', [BrandController::class, 'create'])->name('admin.shop.brand.create');
            Route::post('store', [BrandController::class, 'store'])->name('admin.shop.brand.store');
            Route::get('edit/{brand}', [BrandController::class, 'edit'])->name('admin.shop.brand.edit');
            Route::put('update/{brand}', [BrandController::class, 'update'])->name('admin.shop.brand.update');
            Route::delete('destroy/{brand}', [BrandController::class, 'destroy'])->name('admin.shop.brand.destroy');
            Route::get('status/{brand}', [BrandController::class, 'status'])->name('admin.shop.brand.status');
        });

        //        storeroom product
        Route::middleware('permission:PermissionStoreRoom')->prefix('storeroom')->group(function () {
            Route::get('/', [StoreRoomController::class, 'index'])->name('admin.shop.storeroom.index');
            Route::get('add-to-store/{product}', [StoreRoomController::class, 'add'])->name('admin.shop.storeroom.add-to-store');
            Route::post('store/{product}', [StoreRoomController::class, 'store'])->name('admin.shop.storeroom.store');
            Route::get('edit/{product}', [StoreRoomController::class, 'edit'])->name('admin.shop.storeroom.edit');
            Route::put('update/{product}', [StoreRoomController::class, 'update'])->name('admin.shop.storeroom.update');
        });

        //comment
        Route::middleware('permission:PermissionCommentProduct')->prefix('comment')->group(function () {
            Route::get('/', [CommentProductController::class, 'index'])->name('admin.shop.comment.index');
            Route::get('answered', [CommentProductController::class, 'answered'])->name('admin.shop.comment.answered');
            Route::get('not-answer', [CommentProductController::class, 'notAnswer'])->name('admin.shop.comment.not-answer');
            Route::get('answers/{comment}', [CommentProductController::class, 'answers'])->name('admin.shop.comment.answers');
            Route::get('/show/{comment}', [CommentProductController::class, 'show'])->name('admin.shop.comment.show');
            Route::delete('/destroy/{comment}', [CommentProductController::class, 'destroy'])->name('admin.shop.comment.destroy');
            Route::get('/status/{comment}', [CommentProductController::class, 'status'])->name('admin.shop.comment.status');
            Route::post('/answer/{comment}', [CommentProductController::class, 'answer'])->name('admin.shop.comment.answer');
        });

        //        product
        Route::middleware('permission:PermissionProduct')->prefix('product')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('admin.shop.product.index');
            Route::get('create', [ProductController::class, 'create'])->name('admin.shop.product.create');
            Route::post('store', [ProductController::class, 'store'])->name('admin.shop.product.store');
            Route::get('edit/{product}', [ProductController::class, 'edit'])->name('admin.shop.product.edit');
            Route::put('update/{product}', [ProductController::class, 'update'])->name('admin.shop.product.update');
            Route::delete('destroy/{product}', [ProductController::class, 'destroy'])->name('admin.shop.product.destroy');
            Route::get('status/{product}', [ProductController::class, 'status'])->name('admin.shop.product.status');


          //        color product
            Route::prefix('color')->group(function () {
              Route::get('/{product}', [ProductColorController::class, 'index'])->name('admin.shop.product.color.index');
              Route::get('create/{product}', [ProductColorController::class, 'create'])->name('admin.shop.product.color.create');
              Route::post('store/{product}', [ProductColorController::class, 'store'])->name('admin.shop.product.color.store');
              Route::delete('destroy/{productColor}/{product}', [ProductColorController::class, 'destroy'])->name('admin.shop.product.color.destroy');
            });

            //       gallery  product
            Route::prefix('gallery')->group(function () {
                Route::get('/{product}', [ProductGalleryController::class, 'index'])->name('admin.shop.product.gallery.index');
                Route::get('create/{product}', [ProductGalleryController::class, 'create'])->name('admin.shop.product.gallery.create');
                Route::post('store/{product}', [ProductGalleryController::class, 'store'])->name('admin.shop.product.gallery.store');
                Route::delete('destroy/{productImage}/{product}', [ProductGalleryController::class, 'destroy'])->name('admin.shop.product.gallery.destroy');
            });

            //       guarantee  product
            Route::prefix('guarantee')->group(function () {
                Route::get('/{product}', [GuaranteeController::class, 'index'])->name('admin.shop.product.guarantee.index');
                Route::get('create/{product}', [GuaranteeController::class, 'create'])->name('admin.shop.product.guarantee.create');
                Route::post('store/{product}', [GuaranteeController::class, 'store'])->name('admin.shop.product.guarantee.store');
                Route::delete('destroy/{guarantee}/{product}', [GuaranteeController::class, 'destroy'])->name('admin.shop.product.guarantee.destroy');
            });

            //       metas  product
            Route::prefix('meta')->group(function () {
                Route::get('/{product}', [ProductMetaController::class, 'index'])->name('admin.shop.product.meta.index');
                Route::get('create/{product}', [ProductMetaController::class, 'create'])->name('admin.shop.product.meta.create');
                Route::post('store/{product}', [ProductMetaController::class, 'store'])->name('admin.shop.product.meta.store');
                Route::delete('destroy/{productMeta}/{product}', [ProductMetaController::class, 'destroy'])->name('admin.shop.product.meta.destroy');
            });

        });


    });

//     discount
      Route::middleware('permission:PermissionDiscount')->prefix('discount')->group(function (){

//        copan
          Route::prefix('copan')->group(function () {
              Route::get('/', [CopanController::class, 'index'])->name('admin.discount.copan.index');
              Route::get('create', [CopanController::class, 'create'])->name('admin.discount.copan.create');
              Route::post('store', [CopanController::class, 'store'])->name('admin.discount.copan.store');
              Route::get('edit/{copan}', [CopanController::class, 'edit'])->name('admin.discount.copan.edit');
              Route::put('update/{copan}', [CopanController::class, 'update'])->name('admin.discount.copan.update');
              Route::delete('destroy/{copan}', [CopanController::class, 'destroy'])->name('admin.discount.copan.destroy');
              Route::get('status/{copan}', [CopanController::class, 'status'])->name('admin.discount.copan.status');
          });

          //        commonDiscount
          Route::prefix('common')->group(function () {
              Route::get('/', [CommonDiscountController::class, 'index'])->name('admin.discount.common.index');
              Route::get('create', [CommonDiscountController::class, 'create'])->name('admin.discount.common.create');
              Route::post('store', [CommonDiscountController::class, 'store'])->name('admin.discount.common.store');
              Route::get('edit/{commonDiscount}', [CommonDiscountController::class, 'edit'])->name('admin.discount.common.edit');
              Route::put('update/{commonDiscount}', [CommonDiscountController::class, 'update'])->name('admin.discount.common.update');
              Route::delete('destroy/{commonDiscount}', [CommonDiscountController::class, 'destroy'])->name('admin.discount.common.destroy');
              Route::get('status/{commonDiscount}', [CommonDiscountController::class, 'status'])->name('admin.discount.common.status');
          });

          //        amazing sale
          Route::prefix('amazing-sale')->group(function () {
              Route::get('/', [AmazingSaleController::class, 'index'])->name('admin.discount.amazing.index');
              Route::get('create', [AmazingSaleController::class, 'create'])->name('admin.discount.amazing.create');
              Route::post('store', [AmazingSaleController::class, 'store'])->name('admin.discount.amazing.store');
              Route::get('edit/{amazingSale}', [AmazingSaleController::class, 'edit'])->name('admin.discount.amazing.edit');
              Route::put('update/{amazingSale}', [AmazingSaleController::class, 'update'])->name('admin.discount.amazing.update');
              Route::delete('destroy/{amazingSale}', [AmazingSaleController::class, 'destroy'])->name('admin.discount.amazing.destroy');
              Route::get('status/{amazingSale}', [AmazingSaleController::class, 'status'])->name('admin.discount.amazing.status');
          });

      });


        Route::prefix('blog')->group(function (){

//        category post
        Route::middleware('permission:PermissionCategoryPost')->prefix('category')->group(function () {
            Route::get('/', [PostCategoryController::class, 'index'])->name('admin.blog.category.index');
            Route::get('create', [PostCategoryController::class, 'create'])->name('admin.blog.category.create');
            Route::post('store', [PostCategoryController::class, 'store'])->name('admin.blog.category.store');
            Route::get('edit/{postCategory}', [PostCategoryController::class, 'edit'])->name('admin.blog.category.edit');
            Route::put('update/{postCategory}', [PostCategoryController::class, 'update'])->name('admin.blog.category.update');
            Route::delete('destroy/{postCategory}', [PostCategoryController::class, 'destroy'])->name('admin.blog.category.destroy');
            Route::get('status/{postCategory}', [PostCategoryController::class, 'status'])->name('admin.blog.category.status');
        });

        //         post
        Route::middleware('permission:PermissionPost')->prefix('post')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('admin.blog.post.index');
            Route::get('create', [PostController::class, 'create'])->name('admin.blog.post.create');
            Route::post('store', [PostController::class, 'store'])->name('admin.blog.post.store');
            Route::get('edit/{post}', [PostController::class, 'edit'])->name('admin.blog.post.edit');
            Route::put('update/{post}', [PostController::class, 'update'])->name('admin.blog.post.update');
            Route::delete('destroy/{post}', [PostController::class, 'destroy'])->name('admin.blog.post.destroy');
            Route::get('status/{post}', [PostController::class, 'status'])->name('admin.blog.post.status');
        });

        //         label
        Route::middleware('permission:PermissionLabel')->prefix('label')->group(function () {
            Route::get('/', [LabelController::class, 'index'])->name('admin.blog.label.index');
            Route::get('create', [LabelController::class, 'create'])->name('admin.blog.label.create');
            Route::post('store', [LabelController::class, 'store'])->name('admin.blog.label.store');
            Route::get('edit/{label}', [LabelController::class, 'edit'])->name('admin.blog.label.edit');
            Route::put('update/{label}', [LabelController::class, 'update'])->name('admin.blog.label.update');
            Route::delete('destroy/{label}', [LabelController::class, 'destroy'])->name('admin.blog.label.destroy');
            Route::get('status/{label}', [LabelController::class, 'status'])->name('admin.blog.label.status');
        });

        //         faq
        Route::middleware('permission:PermissionFaq')->prefix('faq')->group(function () {
            Route::get('/', [FaqController::class, 'index'])->name('admin.blog.faq.index');
            Route::get('create', [FaqController::class, 'create'])->name('admin.blog.faq.create');
            Route::post('store', [FaqController::class, 'store'])->name('admin.blog.faq.store');
            Route::get('edit/{faq}', [FaqController::class, 'edit'])->name('admin.blog.faq.edit');
            Route::put('update/{faq}', [FaqController::class, 'update'])->name('admin.blog.faq.update');
            Route::delete('destroy/{faq}', [FaqController::class, 'destroy'])->name('admin.blog.faq.destroy');
            Route::get('status/{faq}', [FaqController::class, 'status'])->name('admin.blog.faq.status');
        });

        //comment
        Route::middleware('permission:PermissionCommentPost')->prefix('comment')->group(function () {
            Route::get('/', [CommentPostController::class, 'index'])->name('admin.blog.comment.index');
            Route::get('answered', [CommentPostController::class, 'answered'])->name('admin.blog.comment.answered');
            Route::get('not-answer', [CommentPostController::class, 'notAnswer'])->name('admin.blog.comment.not-answer');
            Route::get('answers/{comment}', [CommentPostController::class, 'answers'])->name('admin.blog.comment.answers');
            Route::get('/show/{comment}', [CommentPostController::class, 'show'])->name('admin.blog.comment.show');
            Route::delete('/destroy/{comment}', [CommentPostController::class, 'destroy'])->name('admin.blog.comment.destroy');
            Route::get('/status/{comment}', [CommentPostController::class, 'status'])->name('admin.blog.comment.status');
            Route::post('/answer/{comment}', [CommentPostController::class, 'answer'])->name('admin.blog.comment.answer');
        });


    });

    Route::middleware('permission:PermissionTicket')->prefix('ticket')->group(function (){

        //        ticket
        Route::get('/', [TicketController::class, 'index'])->name('admin.ticket.index');
        Route::get('answered', [TicketController::class, 'answered'])->name('admin.ticket.answered');
        Route::get('not-answer', [TicketController::class, 'notAnswer'])->name('admin.ticket.not-answer');
        Route::get('answers/{ticket}', [TicketController::class, 'answers'])->name('admin.ticket.answers');
        Route::get('/show/{ticket}', [TicketController::class, 'show'])->name('admin.ticket.show');
        Route::post('/answer/{ticket}', [TicketController::class, 'answer'])->name('admin.ticket.answer');
        Route::delete('/destroy/{ticket}', [TicketController::class, 'destroy'])->name('admin.ticket.destroy');
        Route::get('/status/{ticket}', [TicketController::class, 'status'])->name('admin.ticket.status');


//        ticket category
        Route::prefix('category')->group(function () {
            Route::get('/', [TicketCategoryController::class, 'index'])->name('admin.ticket.category.index');
            Route::get('/create', [TicketCategoryController::class, 'create'])->name('admin.ticket.category.create');
            Route::post('/store', [TicketCategoryController::class, 'store'])->name('admin.ticket.category.store');
            Route::get('/edit/{ticketCategory}', [TicketCategoryController::class, 'edit'])->name('admin.ticket.category.edit');
            Route::put('/update/{ticketCategory}', [TicketCategoryController::class, 'update'])->name('admin.ticket.category.update');
            Route::delete('/destroy/{ticketCategory}', [TicketCategoryController::class, 'destroy'])->name('admin.ticket.category.destroy');
            Route::get('/status/{ticketCategory}', [TicketCategoryController::class, 'status'])->name('admin.ticket.category.status');
        });


    });



        Route::middleware('permission:PermissionRole')->prefix('role')->group(function (){
            Route::get('/' , [RoleController::class , 'index'])->name('admin.role.index');
            Route::get('create' , [RoleController::class , 'create'])->name('admin.role.create');
            Route::post('create/store' , [RoleController::class , 'store'])->name('admin.role.store');
            Route::get('edit/{role}' , [RoleController::class , 'edit'])->name('admin.role.edit');
            Route::put('update/{role}' , [RoleController::class , 'update'])->name('admin.role.update');
            Route::delete('destroy/{role}' , [RoleController::class , 'destroy'])->name('admin.role.destroy');
            Route::get('permission/{role}' , [RoleController::class , 'permissionShow'])->name('admin.role.permission.show');
            Route::post('permission/{role}' , [RoleController::class , 'permissionStore'])->name('admin.role.permission.store');
            Route::get('delete/permission/{role}/{permission}' , [RoleController::class , 'permissionDelete'])->name('admin.role.permission.delete');
        });



//    setting
    Route::middleware('permission:PermissionSetting')->prefix('setting')->group(function (){

        //      sms setting
        Route::prefix('sms-setting')->group(function () {
            Route::get('/', [SmsSettingController::class, 'index'])->name('admin.setting.sms-setting.index');
            Route::get('edit/{smsSetting}', [SmsSettingController::class, 'edit'])->name('admin.setting.sms-setting.edit');
            Route::put('update/{smsSetting}', [SmsSettingController::class, 'update'])->name('admin.setting.sms-setting.update');
        });


    });


});


Route::prefix('admin-login')->group(function (){
    Route::get('/' , [AdminLoginController::class , 'show'])->name('admin.admin-login.show');
    Route::post('store' , [AdminLoginController::class , 'store'])->name('admin.admin-login.store');
});
