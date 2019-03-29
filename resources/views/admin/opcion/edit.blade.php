@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-4">
					{!! Form::model($opcion,['route' => ['opcion.update',$opcion->id],'method'=>'PUT']) !!}
					    <label>nombre de opcion</label>
					    {!!Form::text('nombre_opcion',null,['class'=>'form-control'])!!}
					    <div class="form-group">
							{!!Form::label('Seleccionar:')!!} <br>
							@foreach($rol as $roles)		
							@if($opcion->id_rol==$roles->id)
								<input type="radio" name="rol[]" checked value="{!!$roles->id!!}">
								{!!$roles->nombre!!}<br>
							@else
								<input type="radio" name="rol[]" value="{!!$roles->id!!}">
								{!!$roles->nombre!!}<br>
							@endif   	
							@endforeach
						</div>
					    <button class="btn btn-success btn-block">aceptar</button>
					{!! Form::close() !!}
					@include('mensaje.mensajeerror')
				</div>
			</div>
	</div>
</div>
@endsection