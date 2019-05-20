@extends('layouts.header_inicio')

@section('content')
  <!-- Faq area start -->
  <div class="container">
    <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:90px;">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" href="#p-view-1" role="tab" data-toggle="tab" aria-selected="true">Misión</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#p-view-2" role="tab" data-toggle="tab" aria-selected="false">Visión</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#p-view-3" role="tab" data-toggle="tab" aria-selected="false">Himno</a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane fade show active mt-4" id="p-view-1" role="tabpanel">
          <h4>Misión</h4>
          <p>
            Redug Lares dolor sit amet, consectetur adipisicing elit. Animi vero excepturi magnam ducimus adipisci voluptas, praesentium maxime necessitatibus in dolor dolores unde ab, libero quo. Aut, laborum sequi.
          </p>
        </div>
        <div class="tab-pane fade mt-4" id="p-view-2" role="tabpanel">
          <h4>Visión</h4>
          <p>
            voluptas, praesentium maxime cum fugiat,magnam ducimus adipisci voluptas, praesentium architecto ducimus, doloribus fuga itaque omnis.
          </p>
        </div>
        <div class="tab-pane fade mt-4" id="p-view-3" role="tabpanel">
          <h4>Himno</h4>
          <p>
            voluptas, praesentium maxime cum fugiat,magnam ducimus adipisci voluptas, praesentium architecto ducimus, doloribus fuga itaque omnis placeat.
          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- End Faq Area -->
@endsection
@section('script')
<script type="text/javascript">
  activeOption("op-nosotros");
  themeNormal();
</script>
@endsection
