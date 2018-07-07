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

#==========  /  ===========================
Route::get('/', 'HomeController@index');



#==========  POSTS / ENLACES O DETALLES ===========================
Route::get('/post/{slug}', 'HomeController@show')->name('post.show');

#==========  POSTS / TAGS  ===========================
Route::get('/tag/{slug}', 'HomeController@tag')->name('tag.show');

#==========  POSTS / CATEGORY  ===========================
Route::get('/category/{slug}', 'HomeController@category')->name('category.show');

#==========  REGISTER  ===========================
Route::get('/register', 'AuthController@registerForm');
Route::post('/register', 'AuthController@register');

Route::get('/login','AuthController@loginForm')->name('login');
Route::post('/login', 'AuthController@login');

Route::get('/logout', 'AuthController@logout');


Route::group(['prefix'=>'admin','namespace'=>'Admin', ], function(){

    Route::get('/', 'DashboardController@index');

    #==========  C A T E G O R I A S  =====================
    Route::resource('/categories', 'CategoriesController');

    #==========  E T I Q U E T A S  =======================
    Route::resource('/tags', 'TagsController');

    #==========  U S U A R I O S  =========================
    Route::resource('/users', 'UsersController');

    #==========  P  O  S  T  S  ===========================
    Route::resource('/posts', 'PostsController');

});
