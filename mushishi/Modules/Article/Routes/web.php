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

Route::middleware('web', 'auth:admin')->prefix('article')->group(function() {
    Route::resource('category', 'CategoryController');
});

 
//content-route
Route::middleware('web')->prefix('article')->group(function() {
    Route::resource('content', 'ContentController');
    Route::get('template', 'TemplateController@index');
    Route::get('template/setDefault/{name}', 'TemplateController@setDefault');
});

//content-route
Route::middleware('web')->prefix('article')->group(function() {
    Route::resource('slide', 'SlideController');
});
Route::middleware('web')->prefix('article')->group(function() {
    Route::get('lists/{category}.html','HomeController@lists');
    Route::get('contents/{content}.html','HomeController@content');
});

//comment-route
Route::middleware('web')->prefix('article')->group(function() {
        Route::resource('comment', 'CommentController');
    });