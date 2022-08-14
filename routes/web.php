<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clearapp', function () {
  Artisan::call('config:clear');
  Artisan::call('cache:clear');
  Artisan::call('view:clear');
  Session::flush();
  return redirect('/');
});

Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\ClienteController::class, 'index']);


//GRUPO DE RUTAS NO PROTEGIDAS
Route::group(['middleware' => ['guest', 'web']], function () {


  //rutas react js sin seguridad
  Route::get('/acerca', [App\Http\Controllers\ClienteController::class, 'index']);
  
  Route::get('/login', [App\Http\Controllers\AuthController::class, 'index']);
  Route::get('/registration', [App\Http\Controllers\AuthController::class, 'index']);

  Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
  Route::post('/registration', [App\Http\Controllers\AuthController::class, 'signup']);

});

//GRUPO DE RUTAS PROTEGIDAS
Route::group(['middleware' => ['auth']], function () {
//rutas react js con seguridad

    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'index']);  
    Route::post("/logout",[App\Http\Controllers\AdminController::class,"logout"])->name("logout");

    Route::get('/lead/list', [App\Http\Controllers\AdminController::class, 'index']);
    Route::get('/lead/new', [App\Http\Controllers\AdminController::class, 'index']);
    Route::get('/lead/edit/{id}', [App\Http\Controllers\AdminController::class, 'index']);

    Route::get('/usuario/listar', [App\Http\Controllers\AdminController::class, 'index']);
    Route::get('/usuario/crear', [App\Http\Controllers\AdminController::class, 'index']);
    Route::get('/usuario/actualizar/{id}', [App\Http\Controllers\AdminController::class, 'index']);
    

});

