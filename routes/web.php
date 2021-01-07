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
Route::get('/expire', 'ExpirationController@index')->name('Expiredate');
Route::post('/store', 'ExpirationController@store')->name('ExpirationStore');
