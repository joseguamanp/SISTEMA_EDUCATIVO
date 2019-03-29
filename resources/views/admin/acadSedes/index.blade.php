@extends('layouts.principal')
@section('content')
  <div id="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          {!! Form::open(['url' => 'admin/academicoSedes', 'method' => 'POST']) !!}
          @csrf

          <div class="form-group">
            <label>Nombre de la sede</label>
            <input  class='form-control' name="nombre_sede" required="yes">
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label>Provincias</label>
            <select class="form-control" name="id_provincia" required="yes">
              <option value="">--SELECCIONE--</option>
              @foreach( $data['provincias'] as $provincia )
                <option value="{{ $provincia->id }}">{{$provincia->etiqueta}}</option>
              @endforeach
            </select>
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label>Cantones</label>
            <select class="form-control" name="id_canton" required="yes">
              <option value="">--SELECCIONE--</option>
              @foreach( $data['cantones'] as $canton )
                <option value="{{ $canton->id }}">{{ $canton->etiqueta }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label>Observaciones</label>
            <textarea name="observacion" cols="35" rows="5" class="form-control"></textarea>
          </div>

          <div class="form-group">
            <button class="btn btn-primary btn-block">Aceptar</button>
          </div>

          <input name="id_usu_cre" value="{{ Auth::user()->id }}" hidden="yes">
          <input name="id_usu_mod" value="{{ Auth::user()->id }}" hidden="yes">
          {!! Form::close() !!}
          @include('mensaje.mensajeerror')
        </div>

        <div class="col-md-9">
          <div class="card mb-3">

            <div class="card-header">
              <i class="fas fa-table"></i>
              Académico carrera coordinador
            </div>

            <div class="card-body">

              <div class="table-responsive">

                <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">

                  <thead>
                    <tr>
                      <th>Nombre Sede</th>
                      <th>Provincia</th>
                      <th>Canton</th>
                      <th>Observación</th>
                      <th>Creado</th>
                      <th>Modificado</th>
                      <th>Editar</th>
                      <th>Desactivar</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($sedes as $sede)
                      <tr>
                        <td>{{ $sede->nombre_sede }}</td>

                        <td>
                          @foreach( $data['provincias'] as $provincia )
                            @if($provincia->id == $sede->id_provincia)
                              {{$provincia->etiqueta}}
                            @endif
                          @endforeach
                        </td>

                        <td>
                          @foreach( $data['cantones'] as $canton )
                            @if($canton->id == $sede->id_canton)
                              {{ $canton->etiqueta }}
                            @endif
                          @endforeach
                        </td>

                        <td>{{$sede->observacion}}</td>
                        <td>{{ $sede->fecha_cre }}</td>
                        <td>{{ $sede->fecha_mod }}</td>

                        <td >
                          @if($sede->deleted_at!='')

                            <input type="submit" disabled="yes" class="btn btn-sm" value="Editar">

                          @else
                            {!!link_to_route(
                              'academicoSedes.edit',
                              $title = 'Editar',
                              $parameters = $sede->id,
                              $attributes = ['class'=>'btn btn-warning btn-sm']);!!}
                            @endif

                          </td>
                          <td>
                            @if($sede->deleted_at!='')
                              <a class="btn btn-primary btn-block btn-sm" href="/admin/academicoSedes/{{$sede->id}}/restaurar">Activar</a>
                            @else
                              {!!Form::open([
                                'route' => ['academicoSedes.destroy',
                                $sede->id],
                                'method'=>'DELETE']) !!}
                                <div class="form-group ">
                                  {!!Form::submit('Desactivar',[
                                    'class'=>'btn btn-danger btn-sm btn-block'])!!}
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
