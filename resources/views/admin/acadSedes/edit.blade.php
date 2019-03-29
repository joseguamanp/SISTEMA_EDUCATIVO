@extends('layouts.principal')
@section('content')
  <div id="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          {!! Form::model($data,['route' => ['academicoSedes.update',$data->id],'method'=>'PUT']) !!}

          <div class="form-group">
            <label>Nombre de la sede</label>
            <input  class='form-control' name="nombre_sede" required="yes" value="{{ $data->nombre_sede }}">
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label>Provincias</label>
            <select class="form-control" name="id_provincia" required="yes">
              <option value="">--SELECCIONE--</option>
              @foreach( $provincias as $provincia )
                @if($data->id_provincia == $provincia->id)
                  <option value="{{ $provincia->id }}" selected="yes">
                    {{$provincia->etiqueta}}
                  </option>
                @else
                  <option value="{{ $provincia->id }}" >
                    {{$provincia->etiqueta}}
                  </option>
                @endif
              @endforeach
            </select>
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label>Cantones</label>
            <select class="form-control" name="id_canton" required="yes">
              <option value="">--SELECCIONE--</option>
              @foreach( $cantones as $canton )
                @if($data->id_canton == $canton->id)
                  <option value="{{ $canton->id }}" selected="yes">{{ $canton->etiqueta }}</option>
                @else
                  <option value="{{ $canton->id }}">{{ $canton->etiqueta }}</option>
                @endif
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label>Observaciones</label>
            <textarea name="observacion" cols="35" rows="5" class="form-control">{{$data->observacion}}</textarea>
          </div>

          <div class="form-group">
            <button class="btn btn-primary btn-block">Aceptar</button>
            <a class="btn btn-block btn-secondary" role="button" href="{!!URL::to('/admin/academicoSedes');!!}">Cancelar</a>
          </div>

          {!! Form::close() !!}
          @include('mensaje.mensajeerror')
        </div>
      </div>
    </div>
  </div>
@endsection
