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

  <nav id="mainNav" class="navbar navbar-expand navbar-dark bg-dark static-top barra-fija">

    @if(Session::has('ADMINISTRADOR'))
      <div>
        <label id="btn-menu" class="mt-2 mr-2"><i class="fas fa-bars fa-lg btn-menu"></i></label>
      </div>
    @endif
    <a class="navbar-brand mr-1" href="{!!URL::to('/roles');!!}">Principal</a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#"></button>

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

        <div id="dashboard-contenido">

          <nav class="navbar-nav">
            <ul id="nivel-1" class="nav navbar-nav mt-3">
              @foreach($lista as $lis)
                <li class="panel panel-default">
                  @if($lis->escalon>0)
                    @if($lis->escalon==$lis->id)
                      <?php $valor=$lis->id ?>
                      <a data-toggle="collapse" href="#senescyt{{$valor}}"><i class="fas fa-fw fa-folder"></i>
                        <span>{{$lis->nombre}}</span><i id="caret" class="fas fa-caret-down"></i>
                      </a>
                    @else
                      <div id="senescyt{{$valor}}" class="panel-collapse collapse">
                        <div class="panel-body">
                          <ul class="nav navbar-nav" id="nivel-2">
                            <li class="panel panel-default" id="nivel-2">
                              @if($lis->escalon==$valor && $lis->escalon!=$lis->id)
                                <?php $etiqueta=$lis->nombre ?>
                                <a data-toggle="collapse" href="#op-{{$etiqueta}}">{{$lis->nombre}}
                                  <i id="caret" class="fas fa-caret-down text-right"></i>
                                </a>
                              @else
                                <div id="op-{{$etiqueta}}" class="panel-collapse collapse">
                                  <div class="panel-body">
                                    <ul class="nav navbar-nav" id="nivel-3">
                                      <li>
                                        <a tabindex="-1" href="{{$lis->rutas}}">{{$lis->nombre}}</a>
                                      </li>
                                    </ul>
                                  </div>
                                </div>
                              @endif
                            </li>
                          </ul>
                        </div>
                      </div>
                    @endif
                  @endif
                </li>
              @endforeach
            </ul>
          </nav>
          </div>
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
  <script type="text/javascript" src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/sweetalert.js') }}"></script>
  @yield('script')

  <script type="text/javascript">
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
