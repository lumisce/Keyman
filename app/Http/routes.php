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
Route::get('/', ['middleware' => 'guest', 'uses' => 'PagesController@index']);

Route::auth();

Route::group(['middleware' => ['auth']], function () {

    Route::resource('users', 'Auth\AuthController', ['only' => ['index', 'edit', 'update', 'show']]);
    Route::post('users/{users}/admin', 'Auth\AuthController@setAdmin');

    Route::get('account', 'PagesController@account');
    Route::get('about', 'PagesController@about');
    Route::get('browse', 'PagesController@browse');

    Route::resource('customers.requests', 'RequestsController', ['except' => ['index', 'show', 'edit']]);
    Route::match(['put', 'patch'], 'customers/{customers}/requests/{requests}/complete', 'RequestsController@complete');
    Route::resource('customers.insurances', 'CustomerInsurancesController', ['only' => ['create', 'store', 'destroy']]);
    Route::resource('customers', 'CustomersController');
    Route::resource('requests', 'RequestsController', ['only' => ['index']]);
    Route::resource('providers.plans', 'InsurancesController', ['except' => ['index', 'show']]);
    Route::resource('providers', 'ProvidersController');
    Route::resource('types', 'TypesController', ['except' => ['show']]);
    Route::resource('request_types', 'RequestTypesController', ['except' => ['show']]);
});


// pagesController = home, about, browse
// usersController = account, create if admin, store if admin, edit, update, destroy if admin
// requestController = index filter=date-asc search=hello page=1, show, create, store, edit, update, destroy if admin
// customersController = index filter=name-asc search=hello page=1, show, create, store, edit, update, destroy if admin
// providersController = index filter=name-asc search=hello page=1, show, create if admin, store if admin, edit if admin, update if admin, destroy if admin
// authController = login, logout, password reset

// PAANO INSURANCEEE MAS OK PAG AJAX SA EDIT PROVIDER
