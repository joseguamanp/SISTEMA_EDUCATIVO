@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-6">
        			{!! Form::model($data,['route' => ['MallasMaterias.update', $data->id], 'method' => 'PUT']) !!}
        				<div class="form-group">
        					<label>Seleccionar 	Malla</label>
					    	<select class="form-control" name="id_malla">
					    		@foreach($getdatos['malla'] as $getdata)
                                @if($data->id_malla==$getdata->id)
					    		    <option selected="yes" value="{{$getdata->id}}">{{$getdata->nombre_malla}}</option>
                                @else
                                    <option value="{{$getdata->id}}">{{$getdata->nombre_malla}}</option>
                                @endif
					    		@endforeach
					    	</select>
        				</div>
        				<div class="form-group">
        					<label>Seleccionar 	Materia</label>
					    	<select class="form-control" name="id_materia">
					    		@foreach($getdatos['materia'] as $getdata)
                                @if($data->id_materia==$getdata->id)
                                    <option selected="yes" value="{{$getdata->id}}">{{$getdata->nombre_materia}}</option>
                                @else
                                    <option value="{{$getdata->id}}">{{$getdata->nombre_materia}}</option>
                                @endif
                                @endforeach
					    	</select>
        				</div>
        				<div class="form-group">
        					<label>Seleccionar 	Nivel</label>
					    	<select class="form-control" name="id_nivel">
					    		@foreach($getdatos['nivel'] as $getdata)
                                @if($data->id_nivel==$getdata->id)
                                    <option selected="yes" value="{{$getdata->id}}">{{$getdata->etiqueta}}</option>
                                 @else
                                    <option value="{{$getdata->id}}">{{$getdata->etiqueta}}</option>
                                @endif
                                @endforeach
					    	</select>
        				</div>
        				<div class="form-group">
        					<label>Optativa Sn</label>
                            <select class="form-control" name="optativa_sn">
					    	@foreach($getdatos['decision'] as $getdata)
                            @if($data->optativa_sn==$getdata)
                                <option selected="yes" value="{{$getdata}}">{{$getdata}}</option>
                            @else
                                <option value="{{$getdata}}">{{$getdata}}</option>
                            @endif
                            @endforeach
                            </select>
        				</div>
        		</div>
        		<div class="col-md-6">
        				<div class="form-group">
        					<label>Numero de horas semanales</label>
                            {!!Form::number('num_horas_semanas', null, ['class'=>'form-control'])!!}
        				</div>
        				<div class="form-group">
        					<label>Numero de horas totales</label>
                            {!!Form::number('num_horas_totales', null, ['class'=>'form-control'])!!}
        				</div>
        				<div class="form-group">
        					<label>Numero de creditos</label>
                            {!!Form::number('num_creditos', null, ['class'=>'form-control'])!!}
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