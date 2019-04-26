@extends('layouts.principal')
@section('content')
  <div id="content-wrapper">

    <div class="container-fluid">

      <div class="row">

        <!-- INICIO DE DATOS DE SEXO -->
        <div class="col-md-12">
          {!! Form::open(['url' => 'admin/sexo', 'method' => 'POST']) !!}
          <!-- Inicio de Card -->
          <div class="card mb-3">
            <div class="card-header">
              Mantenimiento Sexo
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="etiqueta" class="col-lg-2 col-md-3 col-form-label text-lg-left">
                  Etiqueta
                </label>
                <div class="col-lg-8 col-md-6">
                  {!! Form::text('etiqueta',null,['class'=>'form-control mb-2', 'id' => 'etiqueta'])!!}
                  @include('mensaje.mensajeerror')
                </div>
                <div class="col-lg-2 col-md-3">
                  <button class="btn btn-primary btn-block">Aceptar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin de card -->
          {!! Form::close() !!}
        </div>
        <!-- FIN DE DATOS DE SEXO -->

        <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Opciones
            </div>
            <div class="card-body">
              <div class="table-responsive small">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Etiqueta</th>
                      <th style="width:130px;">Creado</th>
                      <th style="width:130px;">Modificado</th>
                      <th style="width:20px;">Editar</th>
                      <th style="width:30px;">Estado</th>
                    </tr>
                  </thead>
                  <tbody style="overflow:auto">
                    @foreach($datos as $datas)
                      <tr style="height:20px">
                        <td>{{$datas->etiqueta}}</td>
                        <td>{{$datas->fecha_cre}}</td>
                        <td>{{$datas->fecha_mod}}</td>
                        <td>
                          @if($datas->deleted_at!='')
                            <input type="button" value="Editar" disabled="yes" class="btn btn-default" />
                          @else
                            {!!link_to_route('sexo.edit', $title = 'Editar', $parameters = $datas->id, $attributes = ['class'=>'btn btn-warning btn-block btn-sm']);!!}
                          @endif
                        </td>
                        <td>
                          @if($datas->deleted_at!='')
                            <a class="btn btn-primary btn-block btn-sm" href="/admin/sexo/{{$datas->id}}/restaurar">Restaurar</a>
                          @else
                            {!! Form::open(['route' => ['sexo.destroy',$datas->id],'method'=>'DELETE']) !!}
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
