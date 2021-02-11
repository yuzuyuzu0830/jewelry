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
    return view('top');
});

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

// ゲストユーザーログイン
Route::get('guest', 'Auth\LoginController@guestLogin')->name('login.guest');

// カレンダー登録
Route::get('/home', 'DoneTaskController@index');
Route::post('/store', 'DoneTaskController@store')->name('done_task');
Route::post('/editEventDate', 'DoneTaskController@editEventDate')->name('editEvent');
Route::post('/deleteEventDate/{id}', ('DoneTaskController@deleteEventDate'))->name('deleteEvent');

// 所持しているコスメの一覧
Route::group(['prefix'=>'stock_cosmetics', 'middleware' => 'auth'], function () {
    Route::get('/list_of_stock/{user_id}/stock_cosmetics/', 'StockCosmeticController@index')->name('list_of_stock');
    Route::get('/post_stock', 'StockCosmeticController@create')->name('post_stock');
    Route::post('/post_stock', 'StockCosmeticController@store')->name('post_stock');
    Route::get('/show_stock/{id}', 'StockCosmeticController@show')->name('show_stock');
    Route::get('/edit_stock/{id}', 'StockCosmeticController@edit')->name('edit_stock');
    Route::post('/update_stock/{id}', 'StockCosmeticController@update')->name('update_stock');
    Route::post('/destroy_stock/{id}', 'StockCosmeticController@destroy')->name('destroy_stock');
});

// 購入予定のコスメ一覧
Route::group(['prefix'=>'new_items', 'middleware' => 'auth'], function() {
    Route::get('/list_of_item/{user_id}/new_items/', 'NewItemController@index')->name('list_of_item');
    Route::get('/post_item', 'NewItemController@create')->name('post_item');
    Route::post('/post_item', 'NewItemController@store')->name('post_item');
    Route::get('/show_item/{id}', 'NewItemController@show')->name('show_item');
    Route::get('/edit_item/{id}', 'NewItemController@edit')->name('edit_item');
    Route::post('/update_item/{id}', 'NewItemController@update')->name('update_item');
    Route::post('/destroy_item/{id}', 'NewItemController@destroy')->name('destroy_item');
});
