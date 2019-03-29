@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    {!! Form::model($data,['route' => ['tipoDiscapacidad.update',$data->id],'method'=>'PUT']) !!}
                     
                        <div class="form-group">
                            <label>Tipo de discapacidad</label>
                             {!!Form::text('etiqueta',null,['required' => 'yes', 'class' =>'form-control'])!!}
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sucess btn-block">Aceptar</button>
                        </div>
                        
                    {!! Form::close() !!}
                    @include('mensaje.mensajeerror')
                </div>
            </div>
    </div>
</div>
@endsection