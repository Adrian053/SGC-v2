<?php

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

Route::get('/', function () {
    return view('principal');
});

Auth::routes();

//Route::resource('/Planificacion','PlanificacionController')->middleware('auth');

Route::group(['middleware' => ['auth', 'isUsuario']], function() {
    Route::resource('/Planificacion','PlanificacionController');
});

//Route::get('/home', 'HomeController@index')->name('home');
