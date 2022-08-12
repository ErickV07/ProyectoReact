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


Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\ClienteController::class, 'index']);


//GRUPO DE RUTAS NO PROTEGIDAS
Route::group(['middleware' => ['guest', 'web']], function () {

  Route::get('*', 'ClienteController@index')->name('404');
  //rutas react js sin seguridad
  Route::get('/', 'ClienteController@index')->name('Inicio');
  Route::get('/acerca', 'ClienteController@index')->name('Acerca');
  Route::get('/prueba', 'ClienteController@index')->name('Prueba');

  Route::get('/login', 'AuthController@index')->name('Login');
  Route::get('/registration', 'AuthController@index')->name('Registration');

  Route::post('/login', 'AuthController@login');
  Route::post('/registration', 'AuthController@signup');
});

//GRUPO DE RUTAS PROTEGIDAS
Route::group(['middleware' => ['auth']], function () {
//rutas react js con seguridad
    Route::get('/logout', 'AdminController@logout')->name('Logout');
    Route::get('/dashboard', 'AdminController@index')->name('Dashboard');
    Route::get('/usuarios', 'AdminController@index')->name('Usuario');
    
    
    Route::get('/lead/list', 'AdminController@index')->name('Leads');
    Route::get('/lead/new', 'AdminController@index')->name('NewLead');
    Route::get('/lead/edit/{id}', 'AdminController@index')->name('EditLead');

    Route::get('/usuario/listar', 'AdminController@index')->name('ListarUsuario');
    Route::get('/usuario/crear', 'AdminController@index')->name('NuevoUsuario');
    Route::get('/usuario/actualizar/{id}', 'AdminController@index')->name('EditarUsuario');

});

