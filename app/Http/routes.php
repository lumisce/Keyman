<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::group(['middleware' => ['web']], function () {

Route::auth();

Route::get('about', ['middleware' => 'auth', 'uses' => 'PagesController@about']);

// Route::resource('articles', 'ArticlesController');

// Route::get('tags/{tags}', 'TagsController@show');

Route::get('/', ['middleware' => 'guest', 'uses' => 'PagesController@index']);


// pagesController = home, about, browse
// userController = account, create if admin, store if admin, edit, update, destroy if admin
// requestController = index filter=date-asc search=hello page=1, show, create, store, edit, update, destroy if admin
// customerController = index filter=name-asc search=hello page=1, show, create, store, edit, update, destroy if admin
// providerController = index filter=name-asc search=hello page=1, show, create if admin, store if admin, edit if admin, update if admin, destroy if admin
// authController = login, logout, password reset

