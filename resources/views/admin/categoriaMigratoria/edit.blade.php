@extends('layouts.principal')
@section('content')

<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-4">
        			{!! Form::model($data,['route' => ['categoriaMigratoria.update',$data->id],'method'=>'PUT']) !!}
        				<div class="form-group">
        					<label>Nombre de Etiqueta</label>
							<input type="text" class="form-control" name="etiqueta" required pattern="[A-Za-zá-úÁ-Ú ]+" class="form-control" value="{{$data->etiqueta}}">
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