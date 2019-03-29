@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-4">
        			{!! Form::model($data,['route' => ['periodo.update',$data->id],'method'=>'PUT']) !!}
        				<div class="form-group">
                            <label>Nombre Periodo</label>
                            {!!Form::text('nombre_periodo',null,['class'=>'form-control'])!!}
                        </div>
                        <div class="form-group">
                            <label>Anio Periodo</label>
                            {!!Form::text('anio_periodo',null,['class'=>'form-control'])!!}
                        </div>
                        <div class="form-group">
                            <label>Seleccionar Ciclo:</label>
                            <select name="id_ciclo" class="form-control">
                                @foreach($ciclo as $ci)
                                    @if($data->id_ciclo)
                                        <option selected value="{{$ci->id}}">{{$ci->nombre_ciclo}}</option>
                                    @else
                                        <option value="{{$ci->id}}">{{$ci->nombre_ciclo}}</option>
                                    @endif
                                @endforeach 
                            </select>
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