@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-6">
        			{!! Form::model($data,['route' => ['asignacion.update', $data->id], 'method' => 'PUT']) !!}
        				<div class="form-group">
        					<label>Seleccionar 	carrera</label>
					    	<select class="form-control" name="id_carrera" required>
					    		@foreach($getdatos['carrera'] as $getdata)
                                    @if($getdata->id ==  $data->id_carrera)
					    		         <option selected="selected" value="{{$getdata->id}}">{{$getdata->nombreCarrera}}</option>
                                    @else
                                        <option value="{{$getdata->id}}">{{$getdata->nombreCarrera}}</option>
                                    @endif
					    		    @endforeach
					    	</select>
        				</div>
        				<div class="form-group">
        					<label>Seleccionar 	sedes</label>
					    	<select class="form-control" name="id_sede" required>
					    		@foreach($getdatos['sedes'] as $getdata)
                                    @if($getdata->id ==  $data->id_sede)
                                        <option selected="selected" value="{{$getdata->id}}">{{$getdata->nombre_sede}}</option>
                                    @else
                                        <option value="{{$getdata->id}}">{{$getdata->nombre_sede}}</option>
                                    @endif
                                @endforeach
					    	</select>
        				</div>
        		</div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Seleccionar  jornada</label>
                        <select class="form-control" name="id_jornada" required>
                            @foreach($getdatos['jornada'] as $getdata)
                                @if($getdata->id ==  $data->id_jornada)
                                    <option selected="selected" value="{{$getdata->id}}">{{$getdata->etiqueta}}</option>
                                @else
                                    <option value="{{$getdata->id}}">{{$getdata->etiqueta}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Seleccionar paralelo</label>
                        <select class="form-control" name="id_paralelo" required>
                            @foreach($getdatos['paralelo'] as $getdata)        
                                @if($getdata->id ==  $data->id_paralelo)
                                    <option selected="selected" value="{{$getdata->id}}">{{$getdata->nombre_paralelo}}</option>
                                @else
                                    <option value="{{$getdata->id}}">{{$getdata->nombre_paralelo}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
        </div>		
        		<div class="row">
        			<div class="col-md-12">
        				<button class="btn btn-sucess btn-block">Aceptar</button>
        			</div>
        				
        		</div>	
					{!! Form::close() !!}
					@include('mensaje.mensajeerror')
    </div>
</div>
@endsection