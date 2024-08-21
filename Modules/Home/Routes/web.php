<?php

use \Illuminate\Support\Facades\Route;
use Modules\Home\Http\Controllers\HomeController;
use Modules\Home\Http\Controllers\CustomerController;
use Modules\Home\Http\Controllers\CartController;
use Modules\Home\Http\Controllers\PaymentController;
use Modules\Home\Http\Controllers\TicketController;

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
Route::get('faq' , [HomeController::class  , 'faq'])->name('home.faq');
Route::get('about' , [HomeController::class  , 'about'])->name('home.about');

Route::get('products/{category?}' , [HomeController::class , 'products'])->name('home.products');


// product comment
Route::middleware('throttle:2,2')->post('comment/product/{product}' , [\Modules\Admin\Http\Controllers\Blog\CommentPostController::class , 'storeCommentProduct'])->name('home.comments.product.store');


// post comment
Route::middleware('throttle:2,2')->post('comment/post/{post}' , [\Modules\Admin\Http\Controllers\Blog\CommentPostController::class , 'storeCommentPost'])->name('home.comments.post.store');

// customer profile
Route::middleware('auth')->prefix('user/profile')->group(function() {
    Route::get('/' , [CustomerController::class , 'profile'])->name('user.profile');
    Route::get('my-favorites' , [CustomerController::class , 'myFavorites'])->name('user.profile.my-favorites');
    Route::get('my-comments' , [CustomerController::class , 'myComments'])->name('user.profile.my-comments');

    Route::get('my-address' , [CustomerController::class , 'myAddress'])->name('user.profile.my-address');
    Route::get('get-cities/{province}' , [CustomerController::class , 'getCities'])->name('user.profile.get-cities');
    Route::get('my-address/create' , [CustomerController::class , 'myAddressCreate'])->name('user.profile.my-address.create');
    Route::get('my-address/delete/{address}' , [CustomerController::class , 'myAddressDelete'])->name('user.profile.my-address.delete');
    Route::get('my-address/edit/{address}' , [CustomerController::class , 'myAddressEdit'])->name('user.profile.my-address.edit');
    Route::put('my-address/update/{address}' , [CustomerController::class , 'myAddressUpdate'])->name('user.profile.my-address.update');
    Route::post('my-address/store' , [CustomerController::class , 'myAddressStore'])->name('user.profile.my-address.store');


    Route::get('delete/my-comment/{comment}' , [CustomerController::class , 'DeleteMyComments'])->name('user.profile.delete-my-comments');
    Route::get('personal-info' , [CustomerController::class , 'profilePersonalInfo'])->name('user.profile.personal-info');
    Route::post('personal-info/store' , [CustomerController::class , 'profilePersonalInfoStore'])->name('user.profile.personal-info.store');

    Route::get('my-favorites/delete/{product}' , [CustomerController::class , 'deleteFavorite'])->name('user.profile.my-favorites.delete');
    Route::get('add-to-favorite/product/{product}' , [CustomerController::class , 'addToFavorite'] )->name('user.profile.add-to-favorite');

//    cart item
    Route::post('add-to-cart/{product:slug}' , [CartController::class , 'addToCart'])->name('user.profile.add-to-cart');
    Route::get('cart-items' , [CartController::class , 'cartItems'])->name('user.profile.cart-item');
    Route::get('remove-from-cart/{cartItem}' , [CartController::class , 'removeFromCart'])->name('user.profile.remove-cart');

//    ticket
    Route::get('my-tickets' , [TicketController::class , 'tickets'])->name('user.profile.tickets');
    Route::get('my-ticket/create' , [TicketController::class , 'create'])->name('user.profile.tickets.create');
    Route::post('my-ticket/store' , [TicketController::class , 'store'])->name('user.profile.tickets.store');
    Route::get('my-ticket/edit/{ticket}' , [TicketController::class , 'edit'])->name('user.profile.tickets.edit');
    Route::put('my-ticket/update/{ticket}' , [TicketController::class , 'update'])->name('user.profile.tickets.update');
    Route::get('my-ticket/delete/{ticket}' , [TicketController::class , 'delete'])->name('user.profile.tickets.delete');
    Route::get('my-ticket/show/{ticket}' , [TicketController::class , 'show'])->name('user.profile.tickets.show');

    Route::get('choose-address-and-delivery' , [CustomerController::class , 'chooseAddressAndDelivery'])->name('user.profile.choose-address-and-delivery');
    Route::post('choose-address-and-delivery/store' , [CustomerController::class , 'chooseAddressAndDeliveryStore'])->name('user.profile.choose-address-and-delivery.store');

//    payment
    Route::get('payment' , [PaymentController::class , 'payment'])->name('user.profile.payment');
    Route::post('copan-discount' , [PaymentController::class , 'copanDiscount'])->name('user.profile.copan-discount');
    Route::post('payment-submit' , [PaymentController::class , 'paymentSubmit'])->name('user.profile.payment-submit');
    Route::any('payment-callback/{order}/{onlinePayment}' , [PaymentController::class , 'paymentCallback'])->name('user.profile.payment-call-back');


});
