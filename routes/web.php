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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix'=>'admin','namespace'=>'Admin', ], function(){

    Route::get('/', 'DashboardController@index');

    #==========  C A T E G O R I A S  =====================
    Route::resource('/categories', 'CategoriesController');

    #==========  E T I Q U E T A S  =======================
    Route::resource('/tags', 'TagsController');

    #==========  U S U A R I O S  =========================
    Route::resource('/users', 'UsersController');

});
