@extends('layouts.principal')
@section('content')
  <div id="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">
          {!! Form::model($editaret,['route' => ['sexo.update',$editaret->id],'method'=>'PUT']) !!}
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Datos Etnia
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Nombre de Etiqueta</label>
                {!!Form::text('etiqueta',null,['class'=>'form-control'])!!}
              </div>
              <div class="form-group">
                <button class="btn btn-primary btn-block">Aceptar</button>
                <a class="btn btn-block btn-secondary" role="button" href="{!!URL::to('/admin/sexo');!!}">Cancelar</a>
              </div>
              {!! Form::close() !!}
              @include('mensaje.mensajeerror')
            </div>
          </div>  <!--fin del card-3 -->
        </div>
      </div>
    </div>
  </div>
@endsection
