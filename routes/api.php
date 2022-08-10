<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api'], 'prefix' => 'v1'], function () {
    Route::get('/lead/list', 'Api\LeadController@listData');
    Route::post('/lead/create', 'Api\LeadController@create');
    Route::post('/lead/update', 'Api\LeadController@update');
    Route::post('/lead/destroy', 'Api\LeadController@destroy');

    Route::get('/dashboard-data', 'Api\HomeController@getData');
});
