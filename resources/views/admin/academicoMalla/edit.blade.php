@extends('layouts.principal')
@section('content')

  <div id="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4">

          {!! Form::model($data,['route' => ['malla.update', $data->id],'method'=>'PUT']) !!}

          <div class="form-group">
            <label>Nombre de la malla</label>
            {!!Form::text('nombre_malla',null,['class'=>'form-control'])!!}
          </div>

          <div class="form-group">
            <label>Nombre corto</label>
            {!!Form::text('nombre_corto',null,['class'=>'form-control'])!!}
          </div>

          <div class="form-group">
            <label>Numero de semanas del periodo académico</label>
            {!!Form::number('num_sem_per_aca', null, ['class'=>'form-control'])!!}
          </div>

          <div class="form-group">
            <button class="btn btn-primary btn-block">Aceptar</button>
            <a class="btn btn-block btn-secondary" role="button" href="{!!URL::to('/admin/malla');!!}">Cancelar</a>
          </div>

          {!! Form::close() !!}

          @include('mensaje.mensajeerror')

        </div>
      </div>
    </div>
  </div>
@endsection
