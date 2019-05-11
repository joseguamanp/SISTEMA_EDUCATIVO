<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Plataforma Académica</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS File -->
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
  <!-- Libraries CSS Files -->
  <link rel="stylesheet" type="text/css" href="{{ asset('lib/nivo-slider/css/nivo-slider.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('lib/owlcarousel/owl.carousel.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('lib/owlcarousel/owl.transitions.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('lib/animate/animate.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('lib/venobox/venobox.css') }}">

  <!-- Nivo Slider Theme -->
  <link rel="stylesheet" href="{{ asset('css/nivo-slider-theme.css') }}">

  <!-- Main Stylesheet File -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- Responsive Stylesheet File -->
  <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

</head>

<body data-spy="scroll" data-target="#navbar-example">
  <div id="preloader"></div>
  <header>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="{!!URL::to('');!!}" id="logo" style="font-size:32px">Colegio</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{!!URL::to('');!!}">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="{!!URL::to('nosotros');!!}">Nosotros</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#blog">Noticias</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#team">Equipo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Contáctanos</a>
            </li>
            @guest
              <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li>
            @else
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-user-circle"></i>
                  Usuario
                  <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" role="menu">
                  <li>
                    <a href="{!!URL::to('/roles');!!}">Cuenta</a>
                  </li>
                  <li>
                    <a href="#" data-toggle="modal" data-target="#logoutModal">Salir</a>
                  </li>
                </ul>
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
  </header>


  <div id="content">
    @yield('content')
  </div>

  <!-- Start Footer bottom Area -->
  <footer>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>Hardcore</strong>. All Rights Reserved
              </p>
            </div>
            <div class="text-center">
              Designed by <a href="#">Team-Mijin</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <h5 class="modal-title" id="exampleModalLabel">Aviso</h5>
        </div>
        <div class="modal-body">¿Está seguro que desea cerrar sesión?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            {{ __('Aceptar') }}
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- JavaScript Libraries -->
  <script type="text/javascript" src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('lib/venobox/venobox.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('lib/knob/jquery.knob.js') }}"></script>
  <script type="text/javascript" src="{{ asset('lib/wow/wow.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('lib/parallax/parallax.js') }}"></script>
  <script type="text/javascript" src="{{ asset('lib/easing/easing.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('lib/nivo-slider/js/jquery.nivo.slider.js') }}"></script>
  <script type="text/javascript" src="{{ asset('lib/appear/jquery.appear.js') }}"></script>
  <script type="text/javascript" src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>

  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('contactform/contactform.js') }}"></script>

  <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
