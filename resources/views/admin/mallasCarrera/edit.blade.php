@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-6">
        			{!! Form::model($data,['route' => ['mallasCarrera.update',$data->id],'method'=>'PUT']) !!}
        				<div class="form-group">
							<label>Seleccionar 	Malla</label>
							<select class="form-control" name="id_malla">
								@foreach($getdato['mall'] as $getdata)
									@if($data->id_malla==$getdata->id)
										<option selected="yes" value="{{$getdata->id}}">{{$getdata->nombre_malla}}</option>
									@else
										<option value="{{$getdata->id}}">{{$getdata->nombre_malla}}</option>
									@endif
								@endforeach
							</select>
        				</div>
						<div class="form-group">
							<label>Seleccionar 	Carrera</label>
							<select class="form-control" name="id_carrera">
								@foreach($getdato['carrera'] as $getdata)
									@if($data->id_carrera==$getdata->id)
										<option selected="yes" value="{{$getdata->id}}">{{$getdata->nombreCarrera}}</option>
									@else
										<option value="{{$getdata->id}}">{{$getdata->nombreCarrera}}</option>
									@endif
								@endforeach
							</select>
						</div>
					<div class="form-group">
						<label>Título</label>
						<input type="text" name="titulo" required pattern="[A-Za-zá-úÁ-Ú ]+" class="{!!Form::text('titulo',null,['class'=>'form-control'])!!}
					</div>
                    <div class="row">
						<div class="col-md-4">
							<button class="btn btn-sucess btn-block">Aceptar</button>
						</div>
					</div>
        		</div>
        </div>
		{!! Form::close() !!}
		@include('mensaje.mensajeerror')
    </div>
</div>
@endsection