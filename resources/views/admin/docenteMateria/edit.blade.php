@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-6">
        			{!! Form::model($data,['route' => ['docenteMateria.update',$data->id],'method'=>'PUT']) !!}
        				<div class="form-group">
							<label>Seleccionar 	Docente</label>
							<select class="form-control" name="id_docente">
								@foreach($getdato['Docente'] as $getdata)
									@if($data->id_docente==$getdata->id)
										<option selected="yes" value="{{$getdata->id}}">{{$getdata->primerApellido}}</option>
									@else
										<option value="{{$getdata->id}}">{{$getdata->primerApellido}}</option>
									@endif
								@endforeach
							</select>
        				</div>
						<div class="form-group">
							<label>Seleccionar 	Materia</label>
							<select class="form-control" name="id_materia">
								@foreach($getdato['materia'] as $getdata)
									@if($data->id_materia_x_paralelo==$getdata->id)
										<option selected="yes" value="{{$getdata->id}}">{{$getdata->nombre_materia}}</option>
									@else
										<option value="{{$getdata->id}}">{{$getdata->nombre_materia}}</option>
									@endif
								@endforeach
							</select>
						</div>

					<div class="form-group">
						<label>Seleccionar 	Paralelo</label>
						<select class="form-control" name="id_paralelo">
							@foreach($getdato['paralelo'] as $getdata)
								@if($data->id_materia_x_paralelo==$getdata->id)
									<option selected="yes" value="{{$getdata->id}}">{{$getdata->nombre_paralelo}}</option>
								@else
									<option value="{{$getdata->id}}">{{$getdata->nombre_paralelo}}</option>
								@endif
							@endforeach
						</select>
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