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

Route::get('/', ['middleware' => 'guest', 'uses' => 'PagesController@index']);

Route::auth();

Route::group(['middleware' => ['auth']], function () {

    Route::resource('users', 'Auth\AuthController', ['only' => ['index', 'edit', 'update', 'show']]);
    Route::post('users/{users}/admin', 'Auth\AuthController@setAdmin');

    Route::get('account', 'PagesController@account');

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
