<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Principal</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
      
<style>
.dropdown-submenu {
    position: relative;
}

.dropdown-submenu .dropdown-menu {
    top: 0;
    left: 100%;
    margin-top: -1px;
}
</style>
  </head>

  <body id="page-top" >

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top barra-fija">

      @if(Session::has('ADMINISTRADOR'))
        <div>
          <label id="btn-menu" class="mt-2 mr-2"><i class="fas fa-bars fa-lg btn-menu"></i>
          </label>
        </div>
      @endif
      <a class="navbar-brand mr-1" href="{!!URL::to('/roles');!!}">Principal</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">

      </button>

      <!-- Navbar Search -->
      <!-- Navbar -->
      @guest
        <ul class="navbar-nav ml-auto ml-md-8">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
        </ul>
      @else
      <ul class="navbar-nav ml-auto ml-md-8">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><label>Bienvenido: </label>
            {!!Auth::user()->nombre!!} {!!Auth::user()->apellido!!}
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#clave">Restaurar Clave</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
              <i class="fa fa-window-close" aria-hidden="true"></i>
            Salir</a>
          </div>
        </li>
      </ul>
      @endguest
    </nav>


    <div id="wrapper">

    @if(Session::has('ADMINISTRADOR'))

      <div id="dashboard">
        <nav class="navbar-nav">
          <ul id="nivel-1" class="nav navbar-nav mt-3">

            <!--************* SENESCYT ************* -->
            <li class="panel panel-default">
              <a data-toggle="collapse" href="#senescyt"><i class="fas fa-fw fa-folder"></i>
                <span>Mantenimiento Senescyt</span><i id="caret" class="fas fa-caret-down"></i>
              </a>

              <div id="senescyt" class="panel-collapse collapse">
                <div class="panel-body">
                  <ul class="nav navbar-nav" id="nivel-2">

                    <!--************* GENERALES ************* -->
                    <li class="panel panel-default" id="nivel-2">
                      <a data-toggle="collapse" href="#op-generales">Generales
                        <i id="caret" class="fas fa-caret-down text-right"></i>
                      </a>
                      <div id="op-generales" class="panel-collapse collapse">
                        <div class="panel-body">
                          <ul class="nav navbar-nav" id="nivel-3">
                            <li>
                              <a tabindex="-1" href="{!!URL::to('/admin/sexo');!!}">Sexo</a>
                            </li>
                            <li>
                              <a tabindex="-1" href="{!!URL::to('/admin/genero');!!}">Genero</a>
                            </li>
                            <li>
                              <a tabindex="-1" href="{!!URL::to('/admin/estadocivil');!!}">Estado Civil</a>
                            </li>
                            <li>
                              <a tabindex="-1" href="{!!URL::to('/admin/datosetnia');!!}">Etnia</a>
                            </li>
                            <li>
                              <a tabindex="-1" href="{!!URL::to('/admin/datostipodoc');!!}">Tipo documento</a>
                            </li>
                            <li>
                              <a tabindex="-1" href="{!!URL::to('admin/tipoSangre');!!}">Tipo de Sangre</a>
                            </li>
                            <li>
                              <a tabindex="-1" href="#">Nacionalidad</a>
                            </li>
                            <li>
                              <a tabindex="-1" href="#">Pueblo</a>
                            </li>
                            <li>
                              <a tabindex="-1" href="#">Fecha de Nacimiento</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>

                    <!--************* DISCAPACIDAD ************* -->
                    <li class="panel panel-default" id="nivel-2">
                      <a data-toggle="collapse" href="#op-discapacidad">Discapacidad
                        <i id="caret" class="fas fa-caret-down text-right"></i>
                      </a>
                      <div id="op-discapacidad" class="panel-collapse collapse">
                        <div class="panel-body">
                          <ul class="nav navbar-nav" id="nivel-3">
                            <li><a href="#">Tipo de discapacidad</a></li>
                          </ul>
                        </div>
                      </div>
                    </li>

                    <!--************* UBICACION ************* -->
                    <li class="panel panel-default" id="nivel-2">
                      <a data-toggle="collapse" href="#op-ubicacion">Ubicación
                        <i id="caret" class="fas fa-caret-down text-right"></i>
                      </a>
                      <div id="op-ubicacion" class="panel-collapse collapse">
                        <div class="panel-body">
                          <ul class="nav navbar-nav" id="nivel-3">
                            <li><a tabindex="-1" href="{!!URL::to('/admin/paises');!!}">Paises</a></li>
                            <li><a tabindex="-1" href="{!!URL::to('/admin/provincias');!!}">Provincia</a></li>
                            <li><a tabindex="-1" href="{!!URL::to('/admin/cantones');!!}">Cantones</a></li>
                          </ul>
                        </div>
                      </div>
                    </li>

                    <!--************* COLEGIATURA ************* -->
                    <li class="panel panel-default" id="nivel-2">
                      <a data-toggle="collapse" href="#op-colegiatura">Colegiatura
                        <i id="caret" class="fas fa-caret-down text-right"></i>
                      </a>
                      <div id="op-colegiatura" class="panel-collapse collapse">
                        <div class="panel-body">
                          <ul class="nav navbar-nav" id="nivel-3">
                            <li><a href="{!!URL::to('/admin/tipoColegio');!!}">Tipo de Colegio</a></li>
                            <li><a href="{!!URL::to('/admin/modCarrera');!!}">Modalidad de Carrera</a></li>
                            <li><a href="#">Fecha de Carrera</a></li>
                            <li><a href="{!!URL::to('/admin/tipoMatricula');!!}">Tipo de matricula</a></li>
                          </ul>
                        </div>
                      </div>
                    </li>

                    <!--************* OCUPACION ************* -->
                    <li class="panel panel-default" id="nivel-2">
                      <a data-toggle="collapse" href="#op-ocupacion">Ocupación
                        <i id="caret" class="fas fa-caret-down text-right"></i>
                      </a>
                      <div id="op-ocupacion" class="panel-collapse collapse">
                        <div class="panel-body">
                          <ul class="nav navbar-nav" id="nivel-3">
                            <li>
                              <a href="{!!URL::to('/admin/estuOcup');!!}">Estudiante Ocupación</a>
                            </li>
                            <li>
                              <a href="#">Empleo de ingreso</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>

                    <!--************* ESTUDIANTE ************* -->
                    <li class="panel panel-default" id="nivel-2">
                      <a data-toggle="collapse" href="#op-estudiante">Estudiante
                        <i id="caret" class="fas fa-caret-down text-right"></i>
                      </a>
                      <div id="op-estudiante" class="panel-collapse collapse">
                        <div class="panel-body">
                          <ul class="nav navbar-nav" id="nivel-3">
                            <li>
                              <a href="{!!URL::to('/admin/perdidaGra');!!}">Perdio Gratuidad</a>
                            </li>
                            <li>
                              <a href="">Recibe bono de desarrollo</a>
                            </li>
                            <li>
                              <a href="{!!URL::to('/admin/EstudianteIngreso');!!}">Estudiante Ingreso</a>
                            </li>
                            <li>
                              <a tabindex="-1" href="#">Ocupación Id</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>

                    <!--************* PRACTICAS ************* -->
                    <li class="panel panel-default" id="nivel-2">
                      <a data-toggle="collapse" href="#op-practicas">Prácticas
                        <i id="caret" class="fas fa-caret-down text-right"></i>
                      </a>
                      <div id="op-practicas" class="panel-collapse collapse">
                        <div class="panel-body">
                          <ul class="nav navbar-nav" id="nivel-3">
                            <li>
                              <a tabindex="-1" href="#">Realizado Practicas</a>
                            </li>
                            <li>
                              <a tabindex="-1" href="#">Tipo de Institución</a>
                            </li>
                            <li>
                              <a tabindex="-1" href="{!!URL::to('/admin/sectorEcon');!!}">Sector Económico</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>

                    <!--************* PROYECTO VINCULACION ************* -->
                    <li class="panel panel-default" id="nivel-2">
                      <a data-toggle="collapse" href="#op-proyecto-vin">Proyecto Vinculación
                        <i id="caret" class="fas fa-caret-down text-right"></i>
                      </a>
                      <div id="op-proyecto-vin" class="panel-collapse collapse">
                        <div class="panel-body">
                          <ul class="nav navbar-nav" id="nivel-3">
                            <li><a tabindex="-1" href="{!!URL::to('/admin/alcanceproyecto');!!}">Tipo de Alcance</a></li>
                            <li><a tabindex="-1" href="{!!URL::to('/admin/vinculacionsociedad');!!}">Participa en Proyecto</a></li>
                          </ul>
                        </div>
                      </div>
                    </li>

                    <!--************* BECAS ************* -->
                    <li class="panel panel-default" id="nivel-2">
                      <a data-toggle="collapse" href="#op-becas">Becas
                        <i id="caret" class="fas fa-caret-down text-right"></i>
                      </a>
                      <div id="op-becas" class="panel-collapse collapse">
                        <div class="panel-body">
                          <ul class="nav navbar-nav" id="nivel-3">
                            <li><a tabindex="-1" href="{!!URL::to('/admin/tipobeca');!!}">Tipo de Becas</a></li>
                            <li><a tabindex="-1" href="#">Tipo financiamiento</a></li>
                          </ul>
                        </div>
                      </div>
                    </li>

                    <!--************* RAZON ************* -->
                    <li class="panel panel-default" id="nivel-2">
                      <a data-toggle="collapse" href="#op-razon">Razón
                        <i id="caret" class="fas fa-caret-down text-right"></i>
                      </a>
                      <div id="op-razon" class="panel-collapse collapse">
                        <div class="panel-body">
                          <ul class="nav navbar-nav" id="nivel-3">
                            <li><a tabindex="-1" href="{!!URL::to('/admin/razon1');!!}">Primera Razón</a></li>
                            <li><a tabindex="-1" href="{!!URL::to('/admin/razon2');!!}">Segundo Razón</a></li>
                            <li><a tabindex="-1" href="{!!URL::to('/admin/razon3');!!}">Tercera Razón</a></li>
                            <li><a tabindex="-1" href="{!!URL::to('/admin/razon4');!!}">Cuarta Razón</a></li>
                            <li><a tabindex="-1" href="{!!URL::to('/admin/razon5');!!}">Quinta Razón</a></li>
                            <li><a tabindex="-1" href="{!!URL::to('/admin/razon6');!!}">Sexta Razón</a></li>
                          </ul>
                        </div>
                      </div>
                    </li>

                    <!--************* FORMACION FAMILIAR ************* -->
                    <li class="panel panel-default" id="nivel-2">
                      <a data-toggle="collapse" href="#op-formacion-fam">Formación familiar
                        <i id="caret" class="fas fa-caret-down text-right"></i>
                      </a>
                      <div id="op-formacion-fam" class="panel-collapse collapse">
                        <div class="panel-body">
                          <ul class="nav navbar-nav" id="nivel-3">
                            <li>
                              <a tabindex="-1" href="{!!URL::to('/admin/formacionpadre');!!}">
                                Nivel formación Padre
                              </a>
                            </li>
                            <li>
                              <a tabindex="-1" href="{!!URL::to('/admin/formacionmadre');!!}">
                                Nivel formación Madre
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>

                    <!--************* RAZON ************* -->
                    <li class="panel panel-default" id="nivel-2">
                      <a data-toggle="collapse" href="#op-razon">Razón
                        <i id="caret" class="fas fa-caret-down text-right"></i>
                      </a>
                      <div id="op-razon" class="panel-collapse collapse">
                        <div class="panel-body">
                          <ul class="nav navbar-nav" id="nivel-3">
                            <li><a tabindex="-1" href="{!!URL::to('/admin/razon1');!!}">Primera Razón</a></li>
                            <li><a tabindex="-1" href="{!!URL::to('/admin/razon2');!!}">Segundo Razón</a></li>
                            <li><a tabindex="-1" href="{!!URL::to('/admin/razon3');!!}">Tercera Razón</a></li>
                            <li><a tabindex="-1" href="{!!URL::to('/admin/razon4');!!}">Cuarta Razón</a></li>
                            <li><a tabindex="-1" href="{!!URL::to('/admin/razon5');!!}">Quinta Razón</a></li>
                            <li><a tabindex="-1" href="{!!URL::to('/admin/razon6');!!}">Sexta Razón</a></li>
                          </ul>
                        </div>
                      </div>
                    </li>

                  </ul>
                </div>
              </div>
            </li>

<!--*********** MANTENIMIENTO ACADEMICO *********** -->
            <li>
              <a data-toggle="collapse" href="#academico"><i class="fas fa-fw fa-folder"></i>
                <span>Mantenimiento Académico</span><i id="caret" class="fas fa-caret-down"></i>
              </a>
              <div id="academico" class="panel-collapse collapse">
                <div class="panel-body">
                  <ul class="nav navbar-nav" id="nivel-2">

                    <!--************* CARRERAS ************* -->
                    <li class="panel panel-default" id="nivel-2">
                      <a data-toggle="collapse" href="#op-carreras">Carreras
                        <i id="caret" class="fas fa-caret-down text-right"></i>
                      </a>
                      <div id="op-carreras" class="panel-collapse collapse">
                        <div class="panel-body">
                          <ul class="nav navbar-nav" id="nivel-3">
                            <li>
                              <a tabindex="-1" href="{!!URL::to('/admin/modCarrera');!!}">Modalidad Carrera</a>
                            </li>
                            <li>
                              <a tabindex="-1" href="{!!URL::to('/admin/jornadaCarrera');!!}">
                                Jornada Carrera
                              </a>
                            </li>
                            <li>
                              <a tabindex="-1" href="{!!URL::to('/admin/carreras');!!}">Nombre Carrera</a>
                            </li>
                            <li>
                              <a tabindex="-1" href="{!!URL::to('/admin/titulocarrera');!!}">
                                Titulo de la carrera
                              </a>
                            </li>
                            <li>
                              <a tabindex="-1" href="{!!URL::to('/admin/mallasCarrera');!!}">Malla Carrera</a>
                            </li>
                            <li>
                              <a tabindex="-1" href="{!!URL::to('/admin/academicoCarreraCoordinador');!!}">
                                Carrera Coordinador
                              </a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>

                    <!--************* MATERIAS ************* -->
                    <li class="panel panel-default" id="nivel-2">
                      <a data-toggle="collapse" href="#op-materias">Materias
                        <i id="caret" class="fas fa-caret-down text-right"></i>
                      </a>
                      <div id="op-materias" class="panel-collapse collapse">
                        <div class="panel-body">
                          <ul class="nav navbar-nav" id="nivel-3">
                            <li>
                              <a tabindex="-1" href="{!!URL::to('/admin/materias');!!}">Nombre Materias</a>
                            </li>
                            <li>
                              <a tabindex="-1" href="{!!URL::to('/admin/Areas_Materias');!!}">Areas Materias</a>
                            </li>
                            <li>
                              <a tabindex="-1" href="{!!URL::to('/admin/MallasMaterias');!!}">Mallas Materias</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </li>

                    <!--************* AREAS INSTITUCION ************* -->
                    <li class="panel panel-default" id="nivel-2-select">
                      <a href="{!!URL::to('/admin/areasInstituto');!!}">
                        Areas Institución
                      </a>
                    </li>

                    <!--************* CICLOS ************* -->
                    <li class="panel panel-default" id="nivel-2-select">
                      <a href="{!!URL::to('/admin/ciclos');!!}">Ciclos</a>
                    </li>

                    <!--************* NIVEL FORMACION ************* -->
                    <li class="panel panel-default" id="nivel-2-select">
                      <a href="{!!URL::to('/admin/nivelFormacion');!!}">Nivel Formación</a>
                    </li>

                    <!--************* MALLAS ************* -->
                    <li class="panel panel-default" id="nivel-2-select">
                      <a href="{!!URL::to('/admin/malla');!!}">Malla</a>
                    </li>

                    <!--************* MIGRATORIA ************* -->
                    <li class="panel panel-default" id="nivel-2-select">
                      <a href="{!!URL::to('/admin/categoriaMigratoria');!!}">Migratoria</a>
                    </li>
                    <!--************* PARALELO ************* -->
                    <li class="panel panel-default" id="nivel-2-select">
                      <a href="{!!URL::to('/admin/paraleloAcad');!!}">Paralelo</a>
                    </li>

                    <!--************* PERIODO ************* -->
                    <li class="panel panel-default" id="nivel-2-select">
                      <a href="{!!URL::to('/admin/AcadPeriodos');!!}">Periodo</a>
                    </li>

                    <!--************* SEDES ************* -->
                    <li class="panel panel-default" id="nivel-2-select">
                      <a href="{!!URL::to('/admin/academicoSedes');!!}">Sedes</a>
                    </li>

                    <!--************* PARELELO SEDE JORNADA ************* -->
                    <li class="panel panel-default" id="nivel-2-select">
                      <a href="{!!URL::to('/admin/asignacion');!!}">Paralelo/Sede/Jornada/Carrera</a>
                    </li>
                    
                    <!--************* PARELELO POR PERIODO ************* -->
                    <li class="panel panel-default" id="nivel-2-select">
                      <a href="{!!URL::to('/admin/academicoParaleloPeriodo');!!}">Paralelo por periodo</a>
                    </li>

                  </ul>
                </div>

              </div>

            </li>

            <li></li><!-- NIVEL 1 -->
            <li></li><!-- NIVEL 1 -->

          </ul>
        </nav>

      </div>

    @endif

    <div id="content">

        @yield('content')

    </div>


  </div><!-- FIN DEL WRAPPER -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Esta seguro que desea salir?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Esta seguro que desea cerrar session</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-success" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
     <script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
     @yield('script')
    <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sb-admin.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.es.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/infAcademica.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/infMatriculacion.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/infDocente.js') }}"></script>}}"></script>

    <script>

      var ruta_global = '{{ url('') }}';

      $(document).ready(function(){

        $('#btn-menu').on('click' , function (){

          $('#dashboard, #content').toggleClass('active');
          $('.collapse.in').toggleClass('in');
          $('a[aria-expanded=true]').attr('aria-expanded', 'false');

        });

      });

    </script>

  </body>

</html>
