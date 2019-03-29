@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
        <div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					{!! Form::model($user,['route' => ['usuario.update',$user->id],'method'=>'PUT']) !!}
					    <div class="form-group">
					    	{!!Form::label('cedula:')!!}
					    	{!!Form::number('cedula',null,['class'=>'form-control'])!!}
					    </div>
					    <div class="form-group">
					    	{!!Form::label('Password:')!!}
					    	{!!Form::password('password',['class'=>'form-control'])!!}
					    </div>
					    <div class="form-group">
					    	{!!Form::label('nombre:')!!}
					    	{!!Form::text('nombre',null,['class'=>'form-control'])!!}
					    </div>
					    <div class="form-group">
					    	{!!Form::label('apellido:')!!}
					    	{!!Form::text('apellido',null,['class'=>'form-control'])!!}
					    </div>
					     <div class="form-group">
					    	{!!Form::label('Seleccionar:')!!} <br>
					    	
					    	@foreach($rol as $roles)
					    		@foreach($rolusu as $value)
						    		@if($value->id==$roles->id)
						    		<input type="checkbox" name="rol[]" checked value="{!!$roles->id!!}"> {!!$roles->nombre!!} <br>
						    		@endif
					    		@endforeach    		 
					    	@endforeach
					    </div>
					    <div class="form-group">
					    	{!!Form::submit('Registrar',['class'=>'btn btn-primary btn-block'])!!}
					    </div>
					{!! Form::close() !!}
					@include('mensaje.mensajeerror')
				</div>
			</div>
		</div>
</div>

@endsection