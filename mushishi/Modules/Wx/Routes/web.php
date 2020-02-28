<?php

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

Route::prefix('wx')->group(function() {
    Route::get('/', 'WxController@index');
});

Route::prefix('wx')->group(function() {
    Route::resource('wx_config','WxConfigController');
});


