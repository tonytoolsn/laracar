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


Auth::routes();
Route::group(['namespace' => '\App\Http\Controllers'], function () {
    Route::get('/', 'SiteController@index')->name('root');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/order/search', 'HomeController@orderSearch')->name('orderSearch');
    Route::get('/edit', 'HomeController@edit')->name('edit');
    Route::patch('/update', 'HomeController@update')->name('update');
    Route::post('/order/submit', 'SiteController@orderSubmit')->name('orderSubmit');
    //當使用者付款成功時，導到的畫面，是用post，Controller重導get的success方法
    Route::post('purchases/successRedirect' ,'SiteController@@successRedirect');
    Route::get('purchases/success','SiteController@@success');
    //當使用者付款成功，藍星將資料導到的位址，是用post
    Route::post('purchases/success','SiteController@@orderSuccess');
    //取消付款導到的頁面，是用get
    Route::get('purchases/back','SiteController@@back');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});




