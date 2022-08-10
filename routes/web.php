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


  //react route
  Route::get('/home', 'ClienteController@index')->name('Home');
  Route::get('/acerca', 'ClienteController@index')->name('Acerca');

  Route::get('/login', 'AuthController@index')->name('Login');
  Route::get('/registration', 'AuthController@index')->name('Registration');

  Route::post('/login', 'AuthController@login');
  Route::post('/registration', 'AuthController@signup');
});

//GRUPO DE RUTAS PROTEGIDAS
Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', 'AdminController@logout')->name('Logout');
    Route::get('/dashboard', 'AdminController@index')->name('Dashboard');
    Route::get('/usuarios', 'AdminController@index')->name('Usuario');
    
    //react route
    Route::get('/lead/list', 'LeadController@index')->name('Leads');
    Route::get('/lead/new', 'LeadController@index')->name('NewLead');
    Route::get('/lead/edit/{id}', 'LeadController@index')->name('EditLead');

});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');