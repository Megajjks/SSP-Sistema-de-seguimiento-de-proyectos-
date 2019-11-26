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
use App\Proyecto;

Route::get('/', function () {
    //return view('template/contenido');
    return view('login/login');
});

Route::get('/', function () {
    //return view('template/contenido');
    return view('auth/login');
}); 

Route::get('/login-view', function () {
    //return view('template/contenido');
    return view('auth/login');
})->name('log'); 

Route::get('/registro-exitoso', function () {
    //return view('template/contenido');
    return view('auth/sucess-register');
})->name('resucess'); 

Route::get('/home', function () {
    //return view('template/contenido');
    return view('template/contenido');
});

Route::get('/proyecto-view/{id}', function ($id) {
    //return view('template/contenido');
    $proyecto = Proyecto::find($id);
    return view('template/vproyecto',$proyecto);
});

Route::get('/colaborador', function () {
    //return view('template/contenido');
    return view('colaborador/menu-colaborador');
})->middleware('auth');
//->middleware('auth', 'role:colaborador')

Route::get('/lider-p', function () {
    //return view('template/contenido');
    return view('liderproyecto/menu-liderproyecto');
})->middleware('auth');
//->middleware('auth', 'role:lider-proyecto')

Route::resource('/proyecto','ProyectoController');
Route::post('/proyecto/actualizar','ProyectoController@update');
Route::post('/proyecto/update/{id}','ProyectoController@updateproyecto');
Route::delete('/deleteproyecto/{id}','ProyectoController@delete');

Route::resource('/sharedproject','SharedProjectController');
Route::post('/sharedproject/actualizar','SharedProjectController@update');
Route::post('/sharedproject/update/{id}','SharedProjectController@updateproyecto');
Route::delete('/deletesharedproject/{id}','SharedProjectController@delete');

Route::resource('/lista-actividades','ActividadController');
Route::delete('/deleteactividad/{id}','ActividadController@delete');

Route::resource('/lista-actividades-asignadas','SharedActivityController');
Route::delete('/deleteactividad-asignadas/{id}','SharedActivityController@delete');

//emails routes
Route::post('/email1','Email1Controller@email')->name('email1.email');
//Route::post('/contactar', 'Email1Controller@contact')->name('contact');
Route::post('/contactar', 'Email1Controller@contact');


Route::get('/proyectop/{id}','ProyectoController@proyectov')->name('proyectopriv.view');
Route::get('/proyectoasig/{id}','SharedProjectController@proyectov')->name('proyectoasig.view');
//retornar un proyecto
Route::get('/unproyecto/{id}','ProyectoController@unproyecto');
Route::get('/unproyectoasig/{id}','SharedProjectController@unproyecto');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
