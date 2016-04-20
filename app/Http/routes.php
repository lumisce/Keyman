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

Route::get('/', ['middleware' => 'guest', 'uses' => 'PagesController@index']);
Route::get('account', ['middleware' => 'auth', 'uses' => 'PagesController@about']);
Route::get('about', ['middleware' => 'auth', 'uses' => 'PagesController@about']);
Route::get('browse', ['middleware' => 'auth', 'uses' => 'PagesController@about']);

Route::resource('customers', 'CustomersController');
Route::resource('providers', 'ProvidersController');
Route::resource('providers/{providers}/plans', 'InsuranceController', ['except' => ['index', 'show']]);
Route::resource('requests', 'RequestsController', ['only' => ['index']]);
Route::resource('customers/{customers}/requests', 'RequestsController', ['except' => ['index', 'show']]);

// Route::get('tags/{tags}', 'TagsController@show');



// pagesController = home, about, browse
// usersController = account, create if admin, store if admin, edit, update, destroy if admin
// requestController = index filter=date-asc search=hello page=1, show, create, store, edit, update, destroy if admin
// customersController = index filter=name-asc search=hello page=1, show, create, store, edit, update, destroy if admin
// providersController = index filter=name-asc search=hello page=1, show, create if admin, store if admin, edit if admin, update if admin, destroy if admin
// authController = login, logout, password reset

// PAANO INSURANCEEE MAS OK PAG AJAX SA EDIT PROVIDER
