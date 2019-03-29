@extends('layouts.principal')
@section('content')
  <div id="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">

          {!! Form::open(['url' => 'admin/vinculacionsociedad', 'method' => 'POST']) !!}
          @csrf
          <div class="form-group">
            <label>Nombre de Etiquetas</label>
            <input class="form-control" type="text" name="etiqueta">
          </div>

          <div class="form-group">
            <button class="btn btn-primary btn-block">Aceptar</button>
          </div>

          {!! Form::close() !!}
          @include('mensaje.mensajeerror')

        </div>

        <div class="col-md-8">

          <div class="card mb-3">

            <div class="card-header">
              <i class="fas fa-table"></i>Paticipa en proyecto de vinculación con la sociedad
            </div>

            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Etiqueta</th>
                      <th>Creado</th>
                      <th>Modificado</th>
                      <th>Editar</th>
                      <th>Desactivar</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($data as $datas)
                      <tr>
                        <td>{{$datas->etiqueta}}</td>
                        <td>{{$datas->fecha_cre}}</td>
                        <td>{{$datas->fecha_mod}}</td>
                        <td>
                          @if($datas->deleted_at!='')
                            <input type="submit" disabled="yes" class="btn btn-sm" value="Editar">
                          @else
                            {!!link_to_route('vinculacionsociedad.edit',
                              $title = 'Editar',
                              $parameters = $datas->id,
                              $attributes = ['class'=>'btn btn-warning btn-sm']);!!}
                            @endif
                          </td>
                          <td>
                            @if($datas->deleted_at!='')
                              <a class="btn btn-primary btn-block btn-sm" href="/admin/vinculacionsociedad/{{$datas->id}}/restaurar">Activar</a>
                            @else
                              {!!Form::open(['route'=> ['vinculacionsociedad.destroy',$datas->id],
                                'method'=>'DELETE']) !!}

                                <div class="form-group">
                                  {!!Form::submit('Desactivar',['class'=>'btn btn-danger btn-block btn-sm'])!!}
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
