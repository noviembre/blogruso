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

#==========  POSTS / SUBSCRIBE  ===========================
Route::post('/subscribe', 'SubsController@subscribe');

#==========  POSTS / VERIFY EMAIL / TOKEN  ================
Route::get('/verify/{token}', 'SubsController@verify');


#===============================================================
#-----------     for USUARIOS REGISTRADOS     -----------------#
#===============================================================


Route::group(['middleware'	=>	'auth'], function(){


    Route::get('/profile', 'ProfileController@index');
    Route::post('/profile', 'ProfileController@store');

    #==========     COMENTARIOS    =============================
    Route::post('/comment', 'CommentsController@store');
    Route::get('/logout', 'AuthController@logout');




});


#===============================================================
#-------------     for I N V I T A D O S     ------------------#
#===============================================================
Route::group(['middleware'	=>	'guest'], function(){

    #==========     REGISTER    ===========================
    Route::get('/register', 'AuthController@registerForm');
    Route::post('/register', 'AuthController@register');

    #==========     LOGIN       ===========================
    Route::get('/login','AuthController@loginForm')->name('login');
    Route::post('/login', 'AuthController@login');

});


#===============================================================
#------------------     for A D M I N     ---------------------#
#===============================================================

Route::group(['prefix'=>'admin','namespace'=>'Admin', 'middleware' => 'admin' ], function(){

    Route::get('/', 'DashboardController@index');

    #==========  C A T E G O R I A S  =====================
    Route::resource('/categories', 'CategoriesController');

    #==========  E T I Q U E T A S  =======================
    Route::resource('/tags', 'TagsController');

    #==========  U S U A R I O S  =========================
    Route::resource('/users', 'UsersController');

    #==========  P  O  S  T  S  ===========================
    Route::resource('/posts', 'PostsController');



    #==========  C O M E N T A R I O S  ===================
    Route::get('/comments', 'CommentsController@index');

    #==========  APROBAR/DESAPROBAR COMENTARIOS  ==========
    Route::get('/comments/toggle/{id}', 'CommentsController@toggle');


    #==========  ELIMINAR COMENTARIOS  ==========

    Route::delete('/comments/{id}/destroy', 'CommentsController@destroy')
        ->name('comments.destroy');

});
