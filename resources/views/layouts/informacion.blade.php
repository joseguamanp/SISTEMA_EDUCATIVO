<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Principal</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-datepicker.css')}} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/academico-estu.css')}} ">
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

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

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
      <!-- Sidebar -->
      @if(Session::has('ADMINISTRADOR'))
      <div class="sidebar navbar-nav">
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-folder"></i>
            <span>Mantenimiento Senescyt</span>
            </a>
            <ul class="dropdown-menu">
              <li class="dropdown-submenu">
                <a class="test text-success dropdown-item" tabindex="-1" href="#">Generales<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a tabindex="-1" href="{!!URL::to('/admin/sexo');!!}">Sexo</a></li>
                  <li><a tabindex="-1" href="{!!URL::to('/admin/genero');!!}">Genero</a></li>
                  <li><a tabindex="-1" href="{!!URL::to('/admin/estadocivil');!!}">Estado Civil</a></li>
                  <li><a tabindex="-1" href="{!!URL::to('/admin/datosetnia');!!}">Etnia</a></li>
                   <li><a tabindex="-1" href="{!!URL::to('/admin/datostipodoc');!!}">Tipo documento</a></li>
                  <li><a tabindex="-1" href="{!!URL::to('admin/tipoSangre');!!}">Tipo de sangre</a></li>
                  <li><a tabindex="-1" href="#">Nacionalidad</a></li>
                  <li><a tabindex="-1" href="#">Pueblo</a></li> 
                  <li><a tabindex="-1" href="#">Fecha de Nacimiento</a></li>
                </ul>
              </li>
              <li class="dropdown-submenu">
                    <a class="test text-success dropdown-item" href="#">Discapacidad<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a tabindex="-1" href="{!!URL::to('/admin/discapacidad');!!}">Tipo de Discapacidad</a></li>
                    </ul>
              </li>
              <li class="dropdown-submenu">
                    <a class="test text-success dropdown-item" href="#">Ubicación<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a tabindex="-1" href="{!!URL::to('/admin/paises');!!}">Paises</a></li>
                      <li><a tabindex="-1" href="{!!URL::to('/admin/provincias');!!}">Provincia</a></li>
                      <li><a tabindex="-1" href="{!!URL::to('/admin/cantones');!!}">Cantones</a></li>
                    </ul>
              </li>
              <li class="dropdown-submenu">
                    <a class="test text-success dropdown-item" href="#">Colegiatura<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a tabindex="-1" href="{!!URL::to('/admin/tipoColegio');!!}">Tipo de Colegio</a></li>
                      <li><a tabindex="-1" href="{!!URL::to('/admin/modCarrera');!!}">Modalidad de Carrera</a></li>
                      <li><a tabindex="-1" href="#">Fecha de Carrera</a></li>
                      <li><a tabindex="-1" href="{!!URL::to('/admin/tipoMatricula');!!}">Tipo de matricula</a></li>
                    </ul>
              </li>
              <li class="dropdown-submenu">
                    <a class="test text-success dropdown-item" href="#">Ocupación<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a tabindex="-1" href="{!!URL::to('/admin/estuOcup');!!}">Estudiante Ocupación</a></li>
                      <li><a tabindex="-1" href="#">Empleo de ingreso</a></li>
                    </ul>
              </li>
              <li class="dropdown-submenu">
                    <a class="test text-success dropdown-item" href="#">Estudiante<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a tabindex="-1" href="{!!URL::to('/admin/perdidaGra');!!}">Perdio Gratuidad</a></li>
                      <li><a tabindex="-1" href="">Recibe bono de desarrollo</a></li>
                      <li><a tabindex="-1" href="{!!URL::to('/admin/EstudianteIngreso');!!}">Estudiante Ingreso</a></li>
                      <li><a tabindex="-1" href="#">Ocupación Id</a></li>
                    </ul>
              </li>
            <!---->
            <li class="dropdown-submenu">
                    <a class="test text-success dropdown-item" href="#">Practicas<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a tabindex="-1" href="#">Realizado Practicas</a></li>
                      <li><a tabindex="-1" href="#">Tipo de Institución</a></li>
                      <li><a tabindex="-1" href="{!!URL::to('/admin/sectorEcon');!!}">Sector Economico</a></li>
                    </ul>
              </li>
              <!---->
              <li class="dropdown-submenu">
                    <a class="test text-success dropdown-item" href="#">Proyecto vinculación<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a tabindex="-1" href="{!!URL::to('/admin/alcance');!!}">Tipo Alcance</a></li>
                    </ul>
              </li>
              <li class="dropdown-submenu">
                    <a class="test text-success dropdown-item" href="#">Becas<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a tabindex="-1" href="{!!URL::to('/admin/tipobeca');!!}">Tipo de Becas</a></li>
                      <li><a tabindex="-1" href="#">Tipo financiamiento</a></li>
                    </ul>
              </li>
               <li class="dropdown-submenu">
                    <a class="test text-success dropdown-item" href="#">Razón<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a tabindex="-1" href="{!!URL::to('/admin/razon1');!!}">Primera Razón</a></li>
                      <li><a tabindex="-1" href="{!!URL::to('/admin/razon2');!!}">Segundo Razón</a></li>
                      <li><a tabindex="-1" href="{!!URL::to('/admin/razon3');!!}">Tercera Razón</a></li>
                      <li><a tabindex="-1" href="{!!URL::to('/admin/razon4');!!}">Cuarta Razón</a></li>
                      <li><a tabindex="-1" href="{!!URL::to('/admin/razon5');!!}">Quinta Razón</a></li>
                      <li><a tabindex="-1" href="{!!URL::to('/admin/razon6');!!}">Sexta Razón</a></li>
                    </ul>
              </li>
               <li class="dropdown-submenu">
                    <a class="test text-success dropdown-item" href="#">Formación Familiar<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a tabindex="-1" href="{!!URL::to('/admin/formacionpadre');!!}">Nivel formación Padre</a></li>
                      <li><a tabindex="-1" href="{!!URL::to('/admin/formacionmadre');!!}">Nivel formación Madre</a></li>
                    </ul>
              </li>
            </ul>
          </div>
          <!----------mantenimiento academico---->
          <div class="nav-item dropdown">

            <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-fw fa-folder"></i>
              <span>Mantenimiento Academico</span>
            </a>
            <ul class="dropdown-menu">
              <li class="dropdown-submenu">
                <a class="test text-success dropdown-item" href="{!!URL::to('/admin/carreras');!!}">Carrera<span class="caret"></span></a>
              </li>
              <li>
                <a class="test text-success dropdown-item" href="{!!URL::to('/admin/areasInstituto');!!}">Área Institución<span class="caret"></span></a>
              </li>
              <li>
                <a class="test text-success dropdown-item" href="{!!URL::to('/admin/ciclos');!!}">Ciclos<span class="caret"></span></a>
              </li>
              <li>
                <a class="test text-success dropdown-item" href="{!!URL::to('/admin/nivelFormacion');!!}">Nivel Formación<span class="caret"></span></a>
              </li>
              <li>
                <a class="test text-success dropdown-item" href="{!!URL::to('/admin/malla');!!}">Malla<span class="caret"></span></a>
              </li>
              <li>
                <a class="test text-success dropdown-item" href="{!!URL::to('/admin/categoriaMigratoria');!!}">Migratoria<span class="caret"></span></a>
              </li>
              <li>
                <a class="test text-success dropdown-item" href="{!!URL::to('/admin/periodo');!!}">Periodo<span class="caret"></span></a>
              </li>
            </ul>
        </div>
      </div>
      @endif
      <div id="content-wrapper">
    <div class="container-fluid">
      <div class="col-md-10">
        <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#Personal">Información Personal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#Academica">Información Academica</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#Economica">Información Laboral Economica</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#Beca">Información Beca</a>
        </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane container active" id="Personal">
            @yield('personal')
        </div>
        <div class="tab-pane container fade" id="Academica">
          @yield('academica')

        </div>
        <div class="tab-pane container fade" id="Economica">
          @yield('economia')
        </div>
        <div class="tab-pane container fade" id="Beca">
          @yield('beca')
        </div>
      </div>
      </div>
      
    </div>
</div>
     
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

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
    <script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/chart.js/Chart.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/sb-admin.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/demo/datatables-demo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/iniciarTroqueladora.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.es.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/academico-estu.js')}}"></script>
   <script>
$(document).ready(function(){
  setDis();
  setIdiomaAn();
  setCatMigratoria();
  razonesbeca();
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script> 
<script>
  //VALIDACION DE RAZONES BECA
    function razonesbeca(){        
      var tipobeca = $("#tipobeca").val();
      var montobeca = 30000;
      var valorarancel = 80;
      var valormanutencion = 80;
        if (tipobeca == "NO APLICA"){
          $("#primerarazon").val("NO APLICA");  //NO APLICA 
          $("#segundarazon").val("NO APLICA");  //NO APLICA  
          $("#tercerarazon").val("NO APLICA");  //NO APLICA 
          $("#cuartarazon").val("NO APLICA");   //NO APLICA 
          $("#quintarazon").val("NO APLICA"); //NO APLICA
          $("#sextarazon").val("NO APLICA"); //NO APLICA
          $("#financiamientobeca").val("NO APLICA"); //NO APLICA

          $("#montobeca").val("NA");
          $("#valorarancel").val("NA");
          $("#valormanutencion").val("NA");
        }else if (tipobeca == "TOTAL" || tipobeca == "PARCIAL"){
          $("#primerarazon").val("SOCIOECONOMICA");       
          $("#segundarazon").val("EXCELENCIA ACADEMICA");         
          $("#tercerarazon").val("DEPORTISTA"); 
          $("#cuartarazon").val("PUEBLOS Y NACIONALIDADES");
          $("#quintarazon").val("DISCAPACIDAD");
          $("#sextarazon").val("OTRA");      
          $("#financiamientobeca").val("");    

          $("#montobeca").val(montobeca);
          $("#valorarancel").val(valorarancel);
          $("#valormanutencion").val(valormanutencion);
        }else{
          $("#primerarazon").val("");       
          $("#segundarazon").val("");         
          $("#tercerarazon").val(""); 
          $("#cuartarazon").val("");
          $("#quintarazon").val("");
          $("#sextarazon").val("");
          $("#financiamientobeca").val("");

          $("#montobeca").val("");
          $("#valorarancel").val("");
          $("#valormanutencion").val("");
        }                          
             
    }
</script>
  </body>

</html>