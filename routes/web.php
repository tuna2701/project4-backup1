<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
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

//=========local route=============
Route::get('/', function () {
    return view('local.index');
});

Route::get('/san-pham', function () {
    return view('local.detail');
});

Route::get('/tu-sach', function () {
    return view('local.product');
});

Route::get('/login', function () {
    return view('local.login');
});

Route::get('/register', function () {
    return view('local.register');
});

Route::get('/forgot-password', function () {
    return view('local.forgot-password');
});

Route::get('/thanh-toan', function () {
    return view('local.checkout');
});

Route::get('/blank', function () {
    return view('local.blank');
});

Route::get('/ban-chay', function () {
    return view('local.best-seller');
});

Route::get('/tim-kiem', function () {
    return view('local.search');
});

Route::get('/gio-hang', [CartController::class, 'showCart'])->name('showCart');
Route::get('/getCart', [CartController::class, 'getCart']);

Route::get('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('/saveOrder', [CartController::class, 'saveOrder']);
Route::get('/add-to-cart2/{id}&{qty}', [CartController::class, 'addToCart2']);
Route::get('/delete-from-cart/{id}', [CartController::class, 'deleteFromCart'])->name('deleteFromCart');

// Route::post('/cart', 'CartController@cart');

//=========admin route=============
Route::get('/admin', function () {
    return view('admin.product');
});

Route::get('/admin/product', function () {
    return view('admin.product');
});

Route::get('/admin/category', function () {
    return view('admin.category');
});

Route::get('/admin/publisher', function () {
    return view('admin.publisher');
});

Route::get('/admin/customer', function () {
    return view('admin.customer');
});

Route::get('/admin/orders', function () {
    return view('admin.orders');
});

Route::get('/chi-tiet', function () {
    return view('admin.order-detail');
});

