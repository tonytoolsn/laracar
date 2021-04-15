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
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});




