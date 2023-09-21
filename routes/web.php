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
    return view('index');
});

Route::get('/calendar', function () {
    return view('calendar');
});


Route::resource('/mensajes', 'MensajesController');

Route::post('/reagendar', 'MensajesController@agendar')->name('reagendar.guardar');

Route::group(['middleware' => 'auth'], function() {

Route::get('/home', 'HomeController@index');

Route::get('/detalles/table/{id}/{estado}/{epicrisis}', 'MensajesController@getTableDetalles');

Route::get('/finalizar/{id}', 'MensajesController@finalizar');
Route::get('/epicrisis/{id}', 'MensajesController@epicrisis');

Route::get('/consultas/table', 'ConsultasController@getTableMensajes');
Route::resource('/consultas', 'ConsultasController');

Route::resource('/seguimiento', 'SeguimientoController');
Route::get('/seguimiento/table/{id}', 'SeguimientoController@getTableDetalles');
Route::get('/seguimiento/descaga/{id}','SeguimientoController@descarga')->name('detalle.descarga');

Route::resource('/agenda', 'AgendaController');

Route::resource('/calendario', 'CalendarioController');

Route::get('/listar', 'CalendarioController@listar');

Route::group(['middleware' => 'admin'], function() {
Route::get('/usuarios/table', 'UsuariosController@getTableUsuarios');
Route::resource('/usuarios', 'UsuariosController');
});
});



Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/login', 'Auth\LoginController@showLoginForm')->middleware('guest');
Route::post('login','Auth\LoginController@login')->name('login');

