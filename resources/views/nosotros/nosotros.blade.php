@extends('layouts.header_inicio')

@section('content')

  <!-- Faq area start -->

  <div class="container">

    <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top:120px;margin-bottom:50px;height:400px">
      <div class="tab-menu">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
          <li class="active">
            <a href="#p-view-1" role="tab" data-toggle="tab">Misión</a>
          </li>
          <li>
            <a href="#p-view-2" role="tab" data-toggle="tab">Visión</a>
          </li>
          <li>
            <a href="#p-view-3" role="tab" data-toggle="tab">Himno</a>
          </li>
        </ul>
      </div>
      <div class="tab-content">
        <div class="tab-pane active" id="p-view-1">
          <div class="tab-inner">
            <div class="event-content head-team">
              <h4>Misión</h4>
              <p>
                Redug Lares dolor sit amet, consectetur adipisicing elit. Animi vero excepturi magnam ducimus adipisci voluptas, praesentium maxime necessitatibus in dolor dolores unde ab, libero quo. Aut, laborum sequi.
              </p>
              <p>
                voluptas, praesentium maxime cum fugiat,magnam ducimus adipisci voluptas, praesentium architecto ducimus, doloribus fuga itaque omnis placeat.
              </p>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="p-view-2">
          <div class="tab-inner">
            <div class="event-content head-team">
              <h4>Visión</h4>
              <p>
                voluptas, praesentium maxime cum fugiat,magnam ducimus adipisci voluptas, praesentium architecto ducimus, doloribus fuga itaque omnis.
              </p>
              <p>
                Redug Lares dolor sit amet, consectetur adipisicing elit. Animi vero excepturi magnam ducimus adipisci voluptas, praesentium maxime necessitatibus in dolor dolores unde ab, libero quo. Aut.
              </p>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="p-view-3">
          <div class="tab-inner">
            <div class="event-content head-team">
              <h4>Himno</h4>
              <p>
                voluptas, praesentium maxime cum fugiat,magnam ducimus adipisci voluptas, praesentium architecto ducimus, doloribus fuga itaque omnis placeat.
              </p>
              <p>
                voluptas, praesentium maxime cum fugiat,magnam ducimus adipisci voluptas, praesentium architecto ducimus, doloribus fuga itaque omnis.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- end Row -->

  <!-- End Faq Area -->



@endsection
