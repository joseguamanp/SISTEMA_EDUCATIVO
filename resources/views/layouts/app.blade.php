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
     @yield('content')
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
    
  </body>

</html>