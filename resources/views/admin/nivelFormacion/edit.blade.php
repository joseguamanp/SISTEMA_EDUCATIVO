@extends('layouts.principal')
@section('content')
  <div id="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">

          {!! Form::model($data,['route' => ['nivelFormacion.update',$data->id],'method'=>'PUT']) !!}

          <div class="form-group">
            <label>Nombre</label>
            {!!Form::text('nombre',null,['class'=>'form-control'])!!}
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-block">Aceptar</button>
            <a class="btn btn-block btn-secondary" role="button" href="{!!URL::to('/admin/nivelFormacion');!!}">Cancelar</a>
          </div>

          {!! Form::close() !!}
          @include('mensaje.mensajeerror')
        </div>
      </div>
    </div>
  </div>
@endsection
