<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\api\apibookcontroller;
use App\Http\Controllers\api\apicategorycontroller;
use App\Http\Controllers\api\apipublishercontroller;
use App\Http\Controllers\api\apicustomercontroller;
use App\Http\Controllers\api\apiordercontroller;
use App\Http\Controllers\api\apiaccountcontroller;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('books', apibookcontroller::class);
Route::get('books/detail/{id}', [apibookcontroller::class, 'get_detail']);
Route::get('books/related/{id}', [apibookcontroller::class, 'get_related_book']);
Route::get('books/new/get-new', [apibookcontroller::class, 'get_new_book']);
Route::get('books/get/get-book-cat/{id}', [apibookcontroller::class, 'get_book_cat']);
Route::get('books/get/get-book-topsell/{id}', [apibookcontroller::class, 'get_book_topsell']);
Route::get('books/get/get-book-topseller', [apibookcontroller::class, 'get_book_topseller']);
Route::get('books/get/get-book-search/{searchText}', [apibookcontroller::class, 'get_book_search']);
Route::get('books/new/get-new-book-filter/{id}&{id2}', [apibookcontroller::class, 'get_new_book_filter']);
Route::get('books/new/get-new-book-filter1/{id}', [apibookcontroller::class, 'get_new_book_filter1']);
Route::get('books/new/get-new-book-filter2/{id}', [apibookcontroller::class, 'get_new_book_filter2']);
Route::resource('categories', apicategorycontroller::class);
Route::get('categories/cat/get-4', [apicategorycontroller::class, 'get_4']);
Route::get('categories/cat/get-6-count', [apicategorycontroller::class, 'get_6_count']);
Route::resource('publishers', apipublishercontroller::class);
Route::resource('customers', apicustomercontroller::class);
Route::resource('orders', apiordercontroller::class);
Route::get('orders/get/order-detail/{id}&{id2}', [apiordercontroller::class, 'show']);
// Route::get('orders/save/saveOrder', [apiordercontroller::class, 'saveOrder']);
Route::resource('accounts', apiaccountcontroller::class);
Route::get('accounts/login/{email}&{pass}', [apiaccountcontroller::class, 'login']);