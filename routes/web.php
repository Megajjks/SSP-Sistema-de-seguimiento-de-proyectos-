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
Route::post('/proyecto/actualizar','ProyectoController@update');
Route::delete('/deleteproyecto/{id}','ProyectoController@delete');

Route::resource('/lista-actividades','ActividadController');
Route::delete('/deleteactividad/{id}','ActividadController@delete');

//emails routes
Route::post('/email1','Email1Controller@email')->name('email1.email');
//Route::post('/contactar', 'Email1Controller@contact')->name('contact');
Route::post('/contactar', 'Email1Controller@contact');