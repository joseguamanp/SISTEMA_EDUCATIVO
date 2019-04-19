@extends('layouts.principal')

@section('content')
  <div id="carrusel" class="carousel slide fade-carousel" data-ride="carousel">
  <!-- Overlay -->


  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#carrusel" data-slide-to="0" class="active"></li>
    <li data-target="#carrusel" data-slide-to="1"></li>
    <li data-target="#carrusel" data-slide-to="2"></li>
  </ul>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/img/imagen_01.jpg" width="100%">
      <div class="hero">
        <div class="carousel-caption">
          <h2>Escuela Técnica Militar Gotitas del Saber</h4>
          <h4>#Posi!!</h4>
          <a class="btn btn-primary">Ver más</a>
        </div>
      </div>

    </div>
    <div class="carousel-item">
      <img src="/img/imagen_02.jpg" width="100%">
      <div class="hero">
        <div class="carousel-caption">
            <h2>La Escuela más Chévere</h2>
            <h4>#Mijin</h4>
            <a class="btn btn-primary">Ver más</a>
        </div>
      </div>
    </div>
    <div class="carousel-item slides">
      <img src="/img/imagen_03.jpg" width="100%">
      <div class="hero">
        <div class="carousel-caption">
            <h2>Matricula a tu Bendición</h2>
            <h4>#Luchona</h4>
            <a class="btn btn-primary">Ver más</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#carrusel" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carrusel" data-slide="next">
    <span class="carousel-control-next-icon"></span>
    <span class="sr-only">Next</span>
  </a>

</div>

@endsection
