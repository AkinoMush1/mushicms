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

Route::middleware('Mail.check')->get('/', function (\Modules\Admin\Entities\Module $module) {
    return app()->build('\Modules\\'.$module->getDefault().'\Http\Controllers\HomeController')->index();
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::any('/upload', 'UploadController@make');

Route::any('/upload-simditor', 'UploadController@simditor');

// 邮箱验证相关
Route::view('/check_mail_show', 'auth.check_mail_show')->name('check_mail_show');
Route::get('/send_mail_token', 'MailController@send_mail_token')->name('send_mail_token');
Route::get('/check_mail_token/{token}', 'MailController@check_mail_token')->name('check_mail_token');

Route::any('/wechat', 'WechatController@handler');