<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => "api", 'middleware' => 'api'], function () {
    //    Route::resource('task', 'TasksController');

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_api_routes

    Route::get('customers', 'CustomerApiController@index');
    Route::get('customers/{customer}', 'CustomerApiController@show');
    Route::post('customers', 'CustomerApiController@store');
    Route::put('customers/{customer}', 'CustomerApiController@update');
    Route::delete('customers/{customer}', 'CustomerApiController@destroy');
});