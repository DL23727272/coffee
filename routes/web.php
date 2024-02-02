<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\GetCartContentController;
use App\Http\Controllers\RemoveFromCartController ;
use App\Http\Controllers\PlaceOrderController;
use App\Http\Controllers\OrderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/home', function () {
    return view('index');
});
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/order', function () {
    return view('order');
});
Route::get('/admin', function () {
    return view('admin');
});


Route::post('/addToCart', [AddToCartController::class, 'addToCart'])->name('addToCart');

Route::get('/getCartContent', [GetCartContentController::class, 'index'])->name('getCartContent');

Route::post('/removeFromCart', [RemoveFromCartController::class, 'removeFromCart'])->name('removeFromCart');

Route::post('/placeOrder', [PlaceOrderController::class, 'placeOrder'])->name('placeOrder');


Route::post('/clearCart', 'CartController@clearCart')->name('clearCart');

Route::get('/admin', [OrderController::class, 'showOrders']);


Route::post('/mark-order-as-done', [OrderController::class, 'markOrderAsDone'])->name('markOrderAsDone');
