@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-6">
        			{!! Form::model($data,['route' => ['paraleloAcad.update',$data->id],'method'=>'PUT']) !!}
        				<div class="form-group">
							<div class="form-group">
								<label>Paralelo Academico</label>
								<input type="text" name="nombre_paralelo" required pattern="[A-Za-zá-úÁ-Ú0-9--_ ]+" class="{!!Form::text('nombre_paralelo',null,['class'=>'form-control'])!!}
							</div>
							<div class="form-group">
								<label>Abreviatura</label>
								<input type="text" name="abreviatura" required pattern="[A-Za-zá-úÁ-Ú0-9--_ ]+" class="{!!Form::text('abreviatura',null,['class'=>'form-control'])!!}
							</div>
							<label>eleccionar 	Paralelo</label>
							<select class="form-control" name="id_homologacion_sene">
								@foreach($getdatos['Paralelo'] as $getdata)
									@if($data->id_homologacion_sene==$getdata->id)
										<option selected="yes" value="{{$getdata->id}}">{{$getdata->etiqueta}}</option>
									@else
										<option value="{{$getdata->id}}">{{$getdata->etiqueta}}</option>
									@endif
								@endforeach
							</select>
							<div class="form-group">
								<label>Observaciones</label>
								<textarea style="width: 530px; height:125px; resize:none" class="form-control" name="observacion"
										{!!Form::textarea ('observacion',null,['class'=>'form-control'])!!}
								</textarea>
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