<?php

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
    //return view('template/contenido');
    return view('login/login');
});

Route::get('/home', function () {
    //return view('template/contenido');
    return view('template/contenido');
});

Route::get('/actividad1', function () {
    //return view('template/contenido');
    return view('template/vproyecto');
});


Route::resource('/proyecto','ProyectoController');
//Route::get('/proyecto','ProyectoController@index');
//Route::post('/proyecto/registrar','ProyectoController@store');
//Route::put('/proyecto/actualizar','ProyectoController@update');

Route::resource('/lista-actividades','ActividadController');
