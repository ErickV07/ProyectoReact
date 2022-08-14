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

Route::get('version', function () {
    return response()->json(['version' => config('app.version')]);
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    Log::debug('User:' . serialize($request->user()));
    return $request->user();
});

/*
Route::group(['middleware' => ['auth:api'], 'prefix' => 'v1'], function () {
    Route::get('/lead/list', 'Api\LeadController@listData');
    Route::post('/lead/create', 'Api\LeadController@create');
    Route::post('/lead/update', 'Api\LeadController@update');
    Route::post('/lead/destroy', 'Api\LeadController@destroy');
    
    Route::get('/usuario/listar', 'Api\AdminApi\UsersController@listData');
    Route::post('/usuario/crear', 'Api\AdminApi\UsersController@create');
    Route::post('/usuario/actualizar', 'Api\AdminApi\UsersController@update');
    Route::post('/usuario/eliminar', 'Api\AdminApi\UsersController@destroy');

});*/

Route::group(['namespace' => 'App\\Http\Controllers', 'prefix' => 'v1', 'middleware' => 'auth:api'], function() {
    
    //all other api routes goes here
    Route::get('/lead/list', 'Api\LeadController@listData');
    Route::post('/lead/create', 'Api\LeadController@create');
    Route::post('/lead/update', 'Api\LeadController@update');
    Route::post('/lead/destroy', 'Api\LeadController@destroy');
    Route::apiResources([
        ////RUTAS ADMIN API
    ]);

});

Route::group(['namespace' => 'App\\Http\\Controllers\\API\AdminAPI', 'prefix' => 'v1', 'middleware' => 'auth:api'], function() {
    
    //all other api routes goes here 
    Route::get('/usuario/listar', 'UsersController@listData');
    Route::post('/usuario/crear', 'UsersController@create');
    Route::post('/usuario/actualizar', 'UsersController@update');
    Route::post('/usuario/eliminar', 'UsersController@destroy');

    Route::apiResources([
        ////RUTAS ADMIN API
        'usuario' => 'UsersController',
    ]);

});