@extends('layouts.principal')
@section('content')
  <div id="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          {!! Form::open(['url' => 'admin/malla', 'method' => 'POST']) !!}

          <div class="form-group">
            <label>Nombre de malla</label>
            <input class="form-control" type="text" name="nombre_malla">
          </div>

          <div class="form-group">
            <label>Nombre corto de malla</label>
            <input class="form-control" type="text" name="nombre_corto">
          </div>

          <div class="form-group">
            <label>Numero de semanas del periodo academico</label>
            <input class="form-control" type="number" name="num_sem_per_aca" min="1">
          </div>

          <div class="form-group">
            <button class="btn btn-primary btn-block">Aceptar</button>
          </div>

          {!! Form::close() !!}
          @include('mensaje.mensajeerror')
        </div>
        <div class="col-md-9">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Mallas</div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>Nombre malla</th>
                        <th>Nombre corto</th>
                        <th>No. semanas peri. acad.</th>
                        <th>Creado</th>
                        <th>Modificado</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($data as $datas)
                        <tr>
                          <td>{{$datas->nombre_malla}}</td>
                          <td>{{$datas->nombre_corto}}</td>
                          <td>{{$datas->num_sem_per_aca}}</td>
                          <td>{{$datas->fecha_cre}}</td>
                          <td>{{$datas->fecha_mod}}</td>
                          <td>
                            {!!link_to_route('malla.edit', $title = 'Editar', $parameters = $datas->id, $attributes = ['class'=>'btn btn-warning btn-sm']);!!}
                          </td>
                          <td>
                            @if($datas->deleted_at!='')
                              <a class="btn btn-primary btn-block btn-sm" href="/admin/malla/{{$datas->id}}/restaurar">Restaurar</a>
                            @else
                              {!! Form::open(['route' => ['malla.destroy',$datas->id],'method'=>'DELETE']) !!}
                              <div class="form-group">
                                {!!Form::submit('Eliminar',['class'=>'btn btn-danger btn-block btn-sm'])!!}
                              </div>
                              {!! Form::close() !!}
                            @endif
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>  <!--fin del card-3 -->
          </div>
        </div>
      </div>
    </div>
  @endsection
