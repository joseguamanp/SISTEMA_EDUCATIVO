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
  return view('auth.login');
});

//hola que hace


//modifico jose guaman
Auth::routes();

//usuario todos
Route::Resource('/roles','ListarRolesController');
Route::get('/crud/vista', 'MantenimientoController@vista')->name('man');

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
  // admin vinculacion
  Route::Resource('/admin/vinculacionsociedad', 'VinculacionSociedadController');
  Route::get('/admin/vinculacionsociedad/{id}/restaurar','VinculacionSociedadController@restaurar');

  Route::Resource('admin/alcanceproyecto','AlcanceProyectoVinculacionController');
  Route::get('/admin/alcanceproyecto/{id}/restaurar','AlcanceProyectoVinculacionController@restaurar');

  Route::Resource('admin/formacionpadre','NivelFormacionPadreController');
  Route::get('/admin/formacionpadre/{id}/restaurar','NivelFormacionPadreController@restaurar');

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

  ////////////////////////////////restauracion e ingreso de nuevos mantenimientos////////77
  //tipo bachillerato
  Route::Resource('/admin/tipobachillerato','admin\infoacademico\TipoBachilleratoController');
  Route::get('/admin/tipobachillerato/{id}/restaurar','admin\infoacademico\TipoBachilleratoController@restaurar');
  // titulo carrera
  Route::Resource('/admin/titulocarrera','admin\infoacademico\TituloCarreraController');
  Route::get('/admin/titulocarrera/{id}/restaurar','admin\infoacademico\TituloCarreraController@restaurar');

  //Henry
  Route::Resource('/admin/valorAyudaEconomica', 'ValorMontoAyudaEconomicaController');
  Route::get('/admin/valorAyudaEconomica/{id}/restaurar','ValorMontoAyudaEconomicaController@restaurar');

  Route::Resource('/admin/valorMontoCredito', 'ValorMontoCreditoController');
  Route::get('/admin/valorMontoCredito/{id}/restaurar','ValorMontoCreditoController@restaurar');

  ///////////////////////MANTENIMIENTO ACADEMICO////////////////////////////////////
  //Admin Carreras

  Route::Resource('/admin/carreras','admin\mant_academico\CarrerasController');
  Route::get('/admin/carreras/{id}/restaurar','admin\mant_academico\CarrerasController@restaurar');

  //admin areas institucion
  Route::Resource('/admin/areasInstituto','admin\mant_academico\AreasInstitutoController');
  Route::get('/admin/areasInstituto/{id}/restaurar', 'admin\mant_academico\AreasInstitutoController@restaurar');

  // admin ciclos
  Route::Resource('/admin/ciclos','admin\mant_academico\CiclosController');
  Route::get('/admin/ciclos/{id}/restaurar', 'admin\mant_academico\CiclosController@restaurar');

  // admin categoria migratoria
  Route::Resource('/admin/categoriaMigratoria','CategoriaMigratoriaController');
  Route::get('/admin/categoriaMigratoria/{id}/restaurar', 'CategoriaMigratoriaController@restaurar');

  // admin nivel de formacion
  Route::Resource('/admin/nivelFormacion','admin\mant_academico\nivelFormacionController');
  Route::get('/admin/nivelFormacion/{id}/restaurar', 'admin\mant_academico\nivelFormacionController@restaurar');

  //ACADEMICO MALLA
  Route::Resource('/admin/malla','admin\mant_academico\AcademicoMallaController');
  Route::get('/admin/malla/{id}/restaurar','admin\mant_academico\AcademicoMallaController@restaurar');
  // academico Periodo
  Route::Resource('/admin/periodo','admin\mant_academico\Acad_PeriodoController');

  Route::get('/admin/periodo/{id}/restaurar', 'admin\mant_academico\Acad_PeriodoController@restaurar');
  //cruz
  //ADMIN	VALOR DEL MONTO DE LA BECA
  Route::Resource('/admin/valormontobeca','ValorMontoBecaController');
  Route::get('/admin/valormontobeca/{id}/restaurar', 'ValorMontoBecaController@restaurar');

  //ADMIN	PORCENTAJE DE LA BECA QUE CUBRE EL VALOR DEL ARANCEL
  Route::Resource('/admin/porcentajebecaarancel','PorcentajeBecaArancelController');
  Route::get('/admin/porcentajebecaarancel/{id}/restaurar', 'PorcentajeBecaArancelController@restaurar');

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
  //formacion madre
  Route::Resource('admin/formacionmadre','NivelFormacionMadreController');

  // Bayron Mendoza
  //admin_MdalidadCarrear
  Route::Resource('/admin/modCarrera','ModalidadCarController');
  //admin_JornadaCarrear
  Route::Resource('/admin/jornadaCarrera','JornadaCarController');
  Route::get('/admin/jornadaCarrera/{id}/restaurar','JornadaCarController@restaurar');
  //admin_TipoMatricula
  Route::Resource('/admin/tipoMatricula','TipMatriculaController');
  //admin_nivelAcademico
  Route::Resource('/admin/nivelAcademico','NivAcademicoController');
  //admin_Paralelo
  Route::Resource('/admin/paralelo','ParaleloController');
  //admin_EstudianteOcupación
  //Route::Resource('/admin/estuOcup','EstuOcupController');
  //Route::get('/admin/estuOcup/{id}/restaurar', 'estuOcup@restaurar');

  //Leyner
  Route::Resource('/admin/perdidaGra','PerdidaGraController');
  Route::get('/admin/perdidaGra/{id}/restaurar', 'PerdidaGraController@restaurar');

  Route::Resource('/admin/EstudianteIngreso','IngresoEstudianteController');
  Route::get('/admin/EstudianteIngreso/{id}/restaurar', 'IngresoEstudianteController@restaurar');

  Route::Resource('/admin/PoseePension','PensionController');
  Route::get('/admin/PoseePension/{id}/restaurar', 'PensionController@restaurar');

    Route::Resource('/admin/estuOcup','EstuOcupController');
    Route::get('/admin/estuOcup/{id}/restaurar', 'estuOcup@restaurar');
    
    Route::Resource('/admin/docenteMateria', 'DocentesMateriasController');
    Route::get('/admin/docenteMateria/{id}/restaurar','DocentesMateriasController@restaurar');

  // jorcy
  Route::Resource('/admin/financiamientobeca', 'financiamientoBecaController');
  Route::get('/admin/financiamientobeca/{id}/restaurar','financiamientoBecaController@restaurar');

  Route::Resource('/admin/tipobeca', 'TipoBecaController');
  Route::get('/admin/tipobeca/{id}/restaurar','TipoBecaController@restaurar');

  Route::Resource('/admin/razon6', 'RazonBecaController6');
  Route::get('/admin/razon6/{id}/restaurar','RazonBecaController6@restaurar');

  Route::Resource('/admin/razon5', 'RazonBecaController5');
  Route::get('/admin/razon5/{id}/restaurar','RazonBecaController5@restaurar');

  Route::Resource('/admin/razon4', 'RazonBecaController4');
  Route::get('/admin/razon4/{id}/restaurar','RazonBecaController4@restaurar');

  Route::Resource('/admin/razon3', 'RazonBecaController3');
  Route::get('/admin/razon3/{id}/restaurar','RazonBecaController3@restaurar');

  Route::Resource('/admin/razon2', 'RazonBecaController2');
  Route::get('/admin/razon2/{id}/restaurar','RazonBecaController2@restaurar');

  Route::Resource('/admin/razon1', 'RazonBecaController1');
  Route::get('/admin/razon1/{id}/restaurar','RazonBecaController1@restaurar');
  // joel campoverde
  //Admin Paises
  Route::Resource('/admin/paises','PaisesController');
  Route::get('/admin/paises/{id}/restaurar','PaisesController@restaurar');
  //Admin Provincia
  Route::Resource('/admin/provincias','ProvinciasController');
  Route::get('/admin/provincias/{id}/restaurar','ProvinciasController@restaurar');
  //Admin Cantones
  Route::Resource('/admin/cantones','CantonesController');
  Route::get('/admin/cantones/{id}/restaurar','CantonesController@restaurar');

  //Admin Sector Económico
  Route::Resource('/admin/sectorEcon','SecEcoController');
  Route::get('/admin/sectorEcon/{id}/restaurar','SecEcoController@restaurar');
  //--------------------------fin de mantenimiento snna-------------------------

  Route::Resource('admin/Areas_Materias','AreasMateriasController');
  Route::get('/admin/Areas_Materias/{id}/restaurar','AreasMateriasController@restaurar');

  //************************* MANTENIMIENTO ACAD SEDES **************************
  Route::Resource('admin/academicoSedes','admin\mant_academico\AcadSedesController');
  Route::get('/admin/academicoSedes/{id}/restaurar','admin\mant_academico\AcadSedesController@restaurar');
  //*****************************************************************************

  Route::Resource('/admin/materias', 'MateriasController');
  Route::get('/admin/materias/{id}/restaurar','MateriasController@restaurar');

  //Paralelo Sede Jornada Carrera

  Route::Resource('/admin/asignacion', 'ParaleloSeneJornadaCarreraController');
  Route::post('/admin/asignacion/guardar', 'ParaleloSeneJornadaCarreraController@store');
  Route::post('/admin/asignacion/validar','ParaleloSeneJornadaCarreraController@validarParaleloNoRepita');
  Route::post('/admin/asignacion/paralelos', 'ParaleloSeneJornadaCarreraController@getParalelos');
  Route::get('/admin/asignacion/{id}/edit','ParaleloSeneJornadaCarreraController@edit');
  Route::get('/admin/asignacion/{id}/restaurar','ParaleloSeneJornadaCarreraController@restaurar');
  // Route::get('/admin/datos', 'ParaleloSeneJornadaCarreraController@vistatabla');
  // Route::get('/admin/asignacion/{id}/restaurar','ParaleloSeneJornadaCarreraController@restaurar');
    
    //MANTENIMIENTO ACAD PARALELO POR PERIODO
Route::Resource('admin/academicoParaleloPeriodo','admin\mant_academico\acadParaleloPeriodoController');
Route::get('admin/academicoParaleloPeriodo/{id}/restaurar','admin\mant_academico\acadParaleloPeriodoController@restaurar');
Route::post('admin/academicoParaleloPeriodo/buscar','admin\mant_academico\acadParaleloPeriodoController@obtenerRegistros');
Route::post('admin/academicoParaleloPeriodo/nuevo','admin\mant_academico\acadParaleloPeriodoController@nuevoRegistro');

//MANTENIMIENTO NUEVO PERIODO
Route::Resource('admin/academicoNuevoPeriodo','admin\mant_academico\nuevoPeriodoController');
Route::post('admin/academicoNuevoPeriodo/buscar','admin\mant_academico\nuevoPeriodoController@consultarRegistrosPeriodos');
Route::post('admin/academicoNuevoPeriodo/mostrar','admin\mant_academico\nuevoPeriodoController@mostrarRegistroPeriodo');
Route::get('admin/academicoNuevoPeriodo/{id}/restaurar','admin\mant_academico\nuevoPeriodoController@restaurar');        


  //Paralelo Academico
  Route::Resource('/admin/paraleloAcad','ParaleloAcadController');
  Route::get('/admin/paraleloAcad/{id}/restaurar', 'ParaleloAcadController@restaurar');


  Route::Resource('admin/AcadPeriodos','AcadPeriodosController');
  Route::get('/admin/AcadPeriodos/{id}/restaurar','AcadPeriodosController@restaurar');


  //joel campoverde y guaman
  Route::Resource('admin/materiaparalelo','MateriaXPeriodoController');
  Route::post('admin/materiaparalelosede','MateriaXPeriodoController@sedes');
  Route::post('admin/materiaparalelocarrera','MateriaXPeriodoController@carrera');
  Route::post('admin/materiaparalelojornada','MateriaXPeriodoController@jornada');
  Route::post('admin/materiaparaleloparalelo','MateriaXPeriodoController@paralelo');
  Route::post('admin/materiaparalelomalla','MateriaXPeriodoController@mallas');
  Route::post('admin/materiaparalelonivel','MateriaXPeriodoController@nivel');

  //Route::get('admin/materiaparalelomostrar','MateriaXPeriodoController@mostrar');
  Route::post('admin/materiaparalelomostrarfiltrar','MateriaXPeriodoController@mostrarfiltro');
  //Admin Docentes Nivel
  Route::Resource('/admin/docentes/nivel','NivForDoceController');
  Route::get('/admin/docentes/nivel/{id}/restaurar','NivForDoceController@restaurar');

  //Admin Docentes Relacion Laboral
  Route::Resource('/admin/docentes/relacionLab','RelacionLabController');
  Route::get('/admin/docentes/relacionLab/{id}/restaurar','RelacionLabController@restaurar');

  //Admin Docentes Escalafón
  Route::Resource('/admin/docentes/escalafon','EscalafonDoceController');
  Route::get('/admin/docentes/escalafon/{id}/restaurar','EscalafonDoceController@restaurar');

  //Admin Docentes Cargo Directivo
  Route::Resource('/admin/docentes/cargoDir','CargoDireController');
  Route::get('/admin/docentes/cargoDir/{id}/restaurar','CargoDireController@restaurar');

  //Admin Docentes Tiempo Dedicación
  Route::Resource('/admin/docentes/tiempoDed','TiempoDoceController');
  Route::get('/admin/docentes/tiempoDed/{id}/restaurar','TiempoDoceController@restaurar');

  //MallasCarrera
  Route::Resource('/admin/mallasCarrera','MallasCarreraController');
  Route::get('/admin/mallasCarrera/{id}/restaurar', 'MallasCarreraController@restaurar');

  //MANTENIMIENTO NESTOR-ORTIZ ACAD CARRERA CARRERA_COORDINADOR
  Route::Resource('admin/academicoCarreraCoordinador','admin\mant_academico\AcadCarreraCoordinadorController');
  Route::get('admin/academicoCarreraCoordinador/{id}/restaurar','admin\mant_academico\AcadCarreraCoordinadorController@restaurar');

  Route::Resource('admin/MallasMaterias','AcadMallasMateriasController');
  Route::get('/admin/MallasMaterias/{id}/restaurar', 'AcadMallasMateriasController@restaurar');
  Route::post('/admin/MallasMaterias/filtro', 'AcadMallasMateriasController@filtro');
});




////////////////////////////////informacion global  ESTUDIANTE//////////////////////////////
Route::get('informacionGlobal','InformacionGlobalController@index');

//*****************  STUDIANTE INFORMACION PERSONAL **************************
Route::post('informacionGlobal/create','InformacionGlobalController@AcaEstuInfoPer');

Route::post('informacionGlobal/ifacademica','InformacionGlobalController@infacademica');

Route::post('informacionGlobal','InformacionGlobalController@infoBecas');
Route::post('informacionGlobal/createEstuLaboral','InformacionGlobalController@AcaEstuLabEco');

//rutas docentes
//Informacion docente
//Principal
Route::Resource('/docentes/main','DocentesController');
Route::post('/docentes/main/infPer','DocentesController@vistaInfPer');
Route::post('/docentes/main/infAcadLab','DocentesController@vistaInfAcadLab');
Route::post('/docentes/main/infBeca','DocentesController@vistaInfBeca');
Route::post('/docentes/personal','DocentesController@saveInfoPer');

Route::post('/docentes/infAcademica','DocentesController@saveInfAcada');

Route::post('/docentes/beca','DocentesController@saveInfoBeca');

Route::post('/docentes/provincias','DocentesController@getProvincias');
Route::post('/docentes/cantones','DocentesController@getCantones');
