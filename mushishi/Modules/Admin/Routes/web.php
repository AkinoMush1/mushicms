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
Route::prefix('admin')->group(function() {
    Route::name('admin.')->group(function () {
        Auth::routes();
    });

});

Route::middleware('auth:admin')->prefix('admin')->group(function() {
    Route::get('/', 'AdminController@index');
    Route::resource('role', 'RoleController')->middleware("permission:admin, resource");
    Route::get('role/permission/{role}', 'RoleController@permission')->middleware("permission:admin");

    Route::post('role/permission/{role}', 'RoleController@permissionStore')->middleware("permission:admin");
    Route::get('role/delete/{role}', 'RoleController@destroy')->name('roleDelete');
});

Route::middleware('auth:admin')->prefix('admin')->group(function() {
    Route::get('module_update_cache', 'ModuleController@updateCache');
    Route::get('module_set_default/{module}', 'ModuleController@setDefault');
    Route::resource('module', 'ModuleController')->middleware("permission:admin, resource");
});
