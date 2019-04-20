<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Plataforma Académica</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

  <!-- Bootstrap CSS File -->
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap/css/bootstrap.min.css') }}">

    <!-- Libraries CSS Files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/nivo-slider/css/nivo-slider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/owlcarousel/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/owlcarousel/owlcarousel.transitions.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/animate/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/venobox/venobox.css') }}">

    <!-- Nivo Slider Theme -->
    <link rel="stylesheet" href="{{ asset('css/nivo-slider-theme.css') }}">

    <!-- Main Stylesheet File -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Responsive Stylesheet File -->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">


  <!-- =======================================================
    Theme Name: eBusiness
    Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12">

            <!-- Navigation -->
            <nav class="navbar navbar-default">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".bs-example-navbar-collapse-1" aria-expanded="false">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
                <!-- Brand -->
                <a class="navbar-brand page-scroll sticky-logo" href="{!!URL::to('');!!}">
                  <h1>Colegio</h1>
                  <!-- Uncomment below if you prefer to use an image logo -->
                  <!-- <img src="img/logo.png" alt="" title=""> -->
								</a>
              </div>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse main-menu bs-example-navbar-collapse-1" id="navbar-example">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active">
                    <a class="page-scroll" href="#home">Inicio</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#about">Nosotros</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#services">Servicios</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#team">Equipo</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#portfolio">Galería</a>
                  </li>

                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Drop Down<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href=# >Drop Down 1</a></li>
                      <li><a href=# >Drop Down 2</a></li>
                    </ul>
                  </li>

                  <li>
                    <a class="page-scroll" href="#blog">Blog</a>
                  </li>
                  <li>
                    <a class="page-scroll" href="#contact">Contáctanos</a>
                  </li>
                   @guest
                  <li>
                    <a class="page-scroll" href="{{ route('login') }}">Login</a>
                  </li>
                  @else
                  <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    Bienvenido:  {!!Auth::user()->nombre!!} {!!Auth::user()->apellido!!}<span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#">Restaurar Clave</a></li>
                      <li><a href="#" data-toggle="modal" data-target="#logoutModal">
                          <i class="fa fa-window-close" aria-hidden="true"></i>
                          Salir</a></li>
                    </ul>
                  </li>
                  @endguest
                </ul>
              </div>
              <!-- navbar-collapse -->
            </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->

  <div id="content">

    @yield('content')

  </div>

  <!-- Start Footer bottom Area -->
  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <h2>Colegio</h2>
                </div>

                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                <div class="footer-icons">
                  <ul>
                    <li>
                      <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-google"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-pinterest"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>información</h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                </p>
                <div class="footer-contacts">
                  <p><span>Tel:</span> +123 456 789</p>
                  <p><span>Email:</span> contact@example.com</p>
                  <p><span>Working Hours:</span> 9am-5pm</p>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="footer-content">
              <div class="footer-head">
                <h4>Instagram</h4>
                <div class="flicker-img">
                  <a href="#"><img src="img/portfolio/1.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/2.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/3.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/4.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/5.jpg" alt=""></a>
                  <a href="#"><img src="img/portfolio/6.jpg" alt=""></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>Hardcore</strong>. All Rights Reserved
              </p>
            </div>
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
              -->
              Designed by <a href="#">Team-Mijin</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
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
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script type="text/javascript" src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('lib/bootstrap/js/bootstrap.min.js') }}"></script>
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
