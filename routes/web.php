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

//******************* INICIO ********************
Route::get('/', function () {
  return view('inicio');
});
Route::get('nosotros', function () {
  return view('nosotros.nosotros');
});

//**************** FIN DE INICIO *************

Auth::routes();

//usuario todos
Route::Resource('/roles','ListarRolesController');

Route::group(['middleware' => ['web', 'admin']], function() {
  ////////////////////////////ADMINISTRADOR
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
  ////////////////////////////GENERALES
  //TIPO DE SANGRE
  Route::Resource('admin/tipoSangre','Generales\TipoSangreController');
  Route::get('/admin/tipoSangre/{id}/restaurar','Generales\tipoSangreController@restaurar');
  //TIPO DE DOCUMENTO
  Route::Resource('/admin/datostipodoc','Generales\TipoDocumentoController');
  Route::get('/admin/datostipodoc/{id}/restaurar','Generales\TipoDocumentoController@restaurar');
  //ETNIA
  Route::get('/admin/datosetnia/{id}/restaurar','Generales\EtniaController@restaurar');
  Route::Resource('/admin/datosetnia','Generales\EtniaController');
  //SEXO
  Route::Resource('admin/sexo','GeneralController\SexoController');
  Route::get('/admin/sexo/{id}/restaurar','GeneralController\SexoController@restaurar');
  //GENERO
  Route::Resource('admin/genero','Generales\GeneroController');
  Route::get('/admin/genero/{id}/restaurar','Generales\GeneroController@restaurar');
  //ESTADO CIVIL
  Route::Resource('admin/estadocivil','Generales\EstadoCivilController');
  Route::get('/admin/estadocivil/{id}/restaurar','Generales\EstadoCivilController@restaurar');
  //////////////////////////DISCAPACIDAD
  //DISCAPACIDAD
  Route::Resource('admin/discapacidad','Discapacidad\DiscapacidadController');
  Route::get('/admin/discapacidad/{id}/restaurar','Discapacidad\DiscapacidadController@restaurar');

});
