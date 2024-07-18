<?php

use \Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\Blog\PostCategoryController;

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



    });

});
