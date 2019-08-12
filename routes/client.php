<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Client Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['namespace' => 'ClientApi'], function () {

    Route::get('/test/router', 'GoodsCategoryController@show');
});
