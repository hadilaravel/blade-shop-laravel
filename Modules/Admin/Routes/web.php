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

Route::prefix('admin')->group(function (){

    Route::get('/' , [\Modules\Admin\Http\Controllers\AdminController::class , 'index' ])->name('admin.index');


    Route::prefix('shop')->group(function (){

        //        category product
        Route::prefix('category')->group(function () {
            Route::get('/', [ProductCategoryController::class, 'index'])->name('admin.shop.category.index');
            Route::get('create', [ProductCategoryController::class, 'create'])->name('admin.shop.category.create');
            Route::post('store', [ProductCategoryController::class, 'store'])->name('admin.shop.category.store');
            Route::get('edit/{productCategory}', [ProductCategoryController::class, 'edit'])->name('admin.shop.category.edit');
            Route::put('update/{productCategory}', [ProductCategoryController::class, 'update'])->name('admin.shop.category.update');
            Route::delete('destroy/{productCategory}', [ProductCategoryController::class, 'destroy'])->name('admin.shop.category.destroy');
            Route::get('status/{productCategory}', [ProductCategoryController::class, 'status'])->name('admin.shop.category.status');
        });

        //        brand product
        Route::prefix('brand')->group(function () {
            Route::get('/', [BrandController::class, 'index'])->name('admin.shop.brand.index');
            Route::get('create', [BrandController::class, 'create'])->name('admin.shop.brand.create');
            Route::post('store', [BrandController::class, 'store'])->name('admin.shop.brand.store');
            Route::get('edit/{brand}', [BrandController::class, 'edit'])->name('admin.shop.brand.edit');
            Route::put('update/{brand}', [BrandController::class, 'update'])->name('admin.shop.brand.update');
            Route::delete('destroy/{brand}', [BrandController::class, 'destroy'])->name('admin.shop.brand.destroy');
            Route::get('status/{brand}', [BrandController::class, 'status'])->name('admin.shop.brand.status');
        });

        //        product
        Route::prefix('product')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('admin.shop.product.index');
            Route::get('create', [ProductController::class, 'create'])->name('admin.shop.product.create');
            Route::post('store', [ProductController::class, 'store'])->name('admin.shop.product.store');
            Route::get('edit/{product}', [ProductController::class, 'edit'])->name('admin.shop.product.edit');
            Route::put('update/{product}', [ProductController::class, 'update'])->name('admin.shop.product.update');
            Route::delete('destroy/{product}', [ProductController::class, 'destroy'])->name('admin.shop.product.destroy');
            Route::get('status/{product}', [ProductController::class, 'status'])->name('admin.shop.product.status');




        });


    });


    Route::prefix('blog')->group(function (){

//        category post
        Route::prefix('category')->group(function () {
            Route::get('/', [PostCategoryController::class, 'index'])->name('admin.blog.category.index');
            Route::get('create', [PostCategoryController::class, 'create'])->name('admin.blog.category.create');
            Route::post('store', [PostCategoryController::class, 'store'])->name('admin.blog.category.store');
            Route::get('edit/{postCategory}', [PostCategoryController::class, 'edit'])->name('admin.blog.category.edit');
            Route::put('update/{postCategory}', [PostCategoryController::class, 'update'])->name('admin.blog.category.update');
            Route::delete('destroy/{postCategory}', [PostCategoryController::class, 'destroy'])->name('admin.blog.category.destroy');
            Route::get('status/{postCategory}', [PostCategoryController::class, 'status'])->name('admin.blog.category.status');
        });

        //         post
        Route::prefix('post')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('admin.blog.post.index');
            Route::get('create', [PostController::class, 'create'])->name('admin.blog.post.create');
            Route::post('store', [PostController::class, 'store'])->name('admin.blog.post.store');
            Route::get('edit/{post}', [PostController::class, 'edit'])->name('admin.blog.post.edit');
            Route::put('update/{post}', [PostController::class, 'update'])->name('admin.blog.post.update');
            Route::delete('destroy/{post}', [PostController::class, 'destroy'])->name('admin.blog.post.destroy');
            Route::get('status/{post}', [PostController::class, 'status'])->name('admin.blog.post.status');
        });

        //         label
        Route::prefix('label')->group(function () {
            Route::get('/', [LabelController::class, 'index'])->name('admin.blog.label.index');
            Route::get('create', [LabelController::class, 'create'])->name('admin.blog.label.create');
            Route::post('store', [LabelController::class, 'store'])->name('admin.blog.label.store');
            Route::get('edit/{label}', [LabelController::class, 'edit'])->name('admin.blog.label.edit');
            Route::put('update/{label}', [LabelController::class, 'update'])->name('admin.blog.label.update');
            Route::delete('destroy/{label}', [LabelController::class, 'destroy'])->name('admin.blog.label.destroy');
            Route::get('status/{label}', [LabelController::class, 'status'])->name('admin.blog.label.status');
        });

        //comment
        Route::prefix('comment')->group(function () {
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

    Route::prefix('ticket')->group(function (){

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


});
