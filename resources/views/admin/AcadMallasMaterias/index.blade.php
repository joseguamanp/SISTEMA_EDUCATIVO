@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-6">
        			{!! Form::open(['url' => 'admin/MallasMaterias', 'method' => 'POST']) !!}
        				<div class="form-group">
        					<label>Seleccionar 	Malla</label>
					    	<select class="form-control" name="id_malla">
					    		@foreach($getdatos['malla'] as $getdata)
					    		<option value="{{$getdata->id}}">{{$getdata->nombre_malla}}</option>
					    		@endforeach
					    	</select>
        				</div>
        				<div class="form-group">
        					<label>Seleccionar 	Materia</label>
					    	<select class="form-control" name="id_materia">
					    		@foreach($getdatos['materia'] as $getdata)
                                <option value="{{$getdata->id}}">{{$getdata->nombre_materia}}</option>
                                @endforeach
					    	</select>
        				</div>
        				<div class="form-group">
        					<label>Seleccionar 	Nivel</label>
					    	<select class="form-control" name="id_nivel">
					    		@foreach($getdatos['nivel'] as $getdata)
                                <option value="{{$getdata->id}}">{{$getdata->etiqueta}}</option>
                                @endforeach
					    	</select>
        				</div>
        				<div class="form-group">
        					<label>Optativa Sn</label>
					    	<select class="form-control" name="optativa_sn">
                            @foreach($getdatos['decision'] as $getdata)
                                <option value="{{$getdata}}">{{$getdata}}</option>
                            @endforeach
                            </select>
        				</div>
        		</div>
        		<div class="col-md-6">
        				<div class="form-group">
        					<label>Numero de horas semanales</label>
					    	<input class="form-control" type="number" name="num_horas_semanas">
        				</div>
        				<div class="form-group">
        					<label>Numero de horas totales</label>
					    	<input class="form-control" type="number" name="num_horas_totales">
        				</div>
        				<div class="form-group">
        					<label>Numero de creditos</label>
					    	<input class="form-control" type="number" name="num_creditos">
        				</div>
        				<div class="form-group">
        					<label>Observaciones</label>
					    	<textarea class="form-control" name="observacion"></textarea>
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