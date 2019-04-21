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
  //return view('auth.login');
  return view('inicio');
});

//******************* INICIO ********************


Auth::routes();

//usuario todos
Route::Resource('/roles','ListarRolesController');    

Route::group(['middleware' => ['web', 'admin']], function() {
  //administrador
  //admin rol
  Route::Resource('/admin/rol','RolesController');
  Route::get('/admin/rol/{id}/restaurar','RolesController@restaurar');
  //admin usuario
  Route::Resource('/admin/usuario','UsuarioController');
  Route::get('/admin/usuario/{id}/restaurar','UsuarioController@restaurar');
  //Route::post();
  //admin / opciones
  Route::Resource('/admin/opcion','OpcionController');
  Route::get('/admin/opcion/{id}/restaurar','OpcionController@restaurar');

  Route::Resource('admin/tipoSangre','tipoSangreController');
  Route::get('/admin/tipoSangre/{id}/restaurar','tipoSangreController@restaurar');

  Route::Resource('admin/discapacidad','discapacidadcontroller');
  Route::get('/admin/discapacidad/{id}/restaurar','discapacidadcontroller@restaurar');

  Route::Resource('/admin/datostipodoc','admin\datosidentificacion\tipodocumentoController');
  Route::get('/admin/datostipodoc/{id}/restaurar','admin\datosidentificacion\tipodocumentoController@restaurar');

  Route::get('/admin/datosetnia/{id}/restaurar','admin\datosidentificacion\etniaController@restaurar');
  Route::Resource('/admin/datosetnia','admin\datosidentificacion\etniaController');

  Route::Resource('admin/tipoDiscapacidad','tipoDiscapacidadController');
  Route::get('/admin/tipoDiscapacidad/{id}/restaurar','tipoDiscapacidadController@restaurar');

  Route::Resource('admin/tipoColegio','tipoColegioController');
  Route::get('/admin/tipoColegio/{id}/restaurar','tipoColegioController@restaurar');

  // ADMIN JORNADA CARRERA

  //Sexo
  Route::Resource('admin/sexo','admin\datosidentificacion\sexoController');
  Route::get('/admin/sexo/{id}/restaurar','admin\datosidentificacion\sexoController@restaurar');

  //genero
  Route::Resource('admin/genero','admin\datosidentificacion\generoController');
  Route::get('/admin/genero/{id}/restaurar','admin\datosidentificacion\generoController@restaurar');
  //estadocivil
  Route::Resource('admin/estadocivil','admin\datosidentificacion\estadocivilController');
  Route::get('/admin/estadocivil/{id}/restaurar','admin\datosidentificacion\estadocivilController@restaurar');


});


