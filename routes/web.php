<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// ゲストユーザーログイン
Route::get('guest', 'Auth\LoginController@guestLogin')->name('login.guest');

Route::get('/home', function() {
    return view('home');
});

// 消費期限のカレンダー登録
Route::get('/expire', 'ExpirationController@index')->name('expire_date');
Route::post('/store', 'ExpirationController@store')->name('ExpirationStore');

// 所持しているコスメの一覧
Route::prefix('stock_cosmetics')->group(function () {
    Route::get('/list_of_stock', 'PostStockController@index')->name('list_of_stock');
    Route::get('/post_stock', 'PostStockController@create')->name('post_stock');
    Route::post('/post_stock', 'PostStockController@store')->name('post_stock');
    Route::get('/show_stock/{id}', 'PostStockController@show')->name('show_stock');
    Route::get('/edit_stock/{id}', 'PostStockController@edit')->name('edit_stock');
    Route::post('/update_stock/{id}', 'PostStockController@update')->name('update_stock');
    Route::post('/destroy_stock/{id}', 'PostStockController@destroy')->name('destroy_stock');
});
