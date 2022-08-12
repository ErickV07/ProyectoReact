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


Route::group(['middleware' => ['auth:api'], 'prefix' => 'v1'], function () {
    Route::get('/lead/list', 'Api\LeadController@listData');
    Route::post('/lead/create', 'Api\LeadController@create');
    Route::post('/lead/update', 'Api\LeadController@update');
    Route::post('/lead/destroy', 'Api\LeadController@destroy');
    
    Route::get('/usuario/listar', 'Api\AdminApi\UsersController@listData');
    Route::post('/usuario/crear', 'Api\AdminApi\UsersController@create');
    Route::post('/usuario/actualizar', 'Api\AdminApi\UsersController@update');
    Route::post('/usuario/eliminar', 'Api\AdminApi\UsersController@destroy');

});
