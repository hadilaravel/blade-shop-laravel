<?php

use \Illuminate\Support\Facades\Route;
use Modules\Home\Http\Controllers\HomeController;

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

Route::get('/' , [HomeController::class , 'index'] )->name('home.index');
Route::get('product/{product:slug}' , [HomeController::class , 'product'])->name('home.product.detail');
Route::get('post/{post:slug}' , [HomeController::class , 'post'] )->name('home.post.detail');
Route::get('posts' , [HomeController::class , 'posts'])->name('home.post.all');


// product comment
Route::middleware('throttle:2,2')->post('comment/product/{product}' , [\Modules\Admin\Http\Controllers\Blog\CommentPostController::class , 'storeCommentProduct'])->name('home.comments.product.store');


// post comment
Route::middleware('throttle:2,2')->post('comment/post/{post}' , [\Modules\Admin\Http\Controllers\Blog\CommentPostController::class , 'storeCommentPost'])->name('home.comments.post.store');
