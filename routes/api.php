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

Route::group(['namespace' => 'System', 'prefix' => 'system'], function () {
    Route::post('node/storage', 'NodeController@storage');
    Route::post('node/destroy', 'NOdeController@destroy');
    Route::get('node/show',     'NodeController@show');

});
