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
//Route::view('/prueba', 'prueba');
Route::resource('/Galeria','FolderGalleryController');
Route:: resource('/Galeria/{folder}/imagenes', 'ImageGalleryController');
Route::resource('/Circulares', 'CircularesController');

Route::group(['middleware' => ['auth', 'isUsuario']], function() {
    Route::resource('/Planificacion','PlanificacionController');
    Route::resource('/Generalidades', 'generalidadesController');
    Route::resource('/Identificacion', 'identificacionController');
    Route::resource('/Acciones', 'accionesController');
    Route::resource('/Editar', 'editarController');
    Route::post('/editsearch', 'generalidadesController@buscar');
    Route::get('/Generalidades/{id}', 'generalidadesController@show');
    Route::post('/Identificacion/{$id}', 'identificacionController@show');
    Route::post('/Acciones/{$id}', 'accionesController@show');
    Route::view('/Eliminar', 'elimFicha', ['id' => 0]);
    Route::post('/EliminarF', 'generalidadesController@eliminar');
    Route::view('/Buscar', 'buscar', ['id' => 0]);
    Route::post('/BuscarF', 'buscarController@buscar');
    Route::view('/Reportes', 'reportes', ['id' => 0]);
    Route::post('/Reporte', 'html2pdfController@index');
    /*Route::post('/editsearch', 'editarController@buscar');
    Route::get('/editsearch/{id}', 'editarController@editar');*/
});

//Route::get('/home', 'HomeController@index')->name('home');
