@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
        <div class="container-fluid">
			<div class="row">
				<div class="col-md-4">
					@include('mensaje.mensajeerror')
					@include('mensaje.mensajedeingreso')
					{!! Form::open(['route' => 'usuario.store','method'=>'POST']) !!}
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
					    		<input type="checkbox" name="rol[]" value="{!!$roles->id!!}"> {!!$roles->nombre!!} <br>	    		 
					    	@endforeach
					    </div>
					    <div class="form-group">
					    	{!!Form::submit('Registrar',['class'=>'btn btn-primary btn-block'])!!}
					    </div>
					{!! Form::close() !!}
				</div>
				<div class="col-md-8">
					<div class="card mb-3">
				            <div class="card-header">
				              <i class="fas fa-table"></i>
				              Usuario</div>
				            <div class="card-body">
				              <div class="table-responsive">
				                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				                  <thead>
				                    <tr>
										<th>Cedula</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Creado</th>
										<th>Modificado</th>
										<th>Editar</th>
										<th>Estado</th>
									</tr>
				                  </thead>
				                  <tbody>
				                	@foreach($user as $usuario)
									<tr>
										<td>{{$usuario->cedula}}</td>
										<td>{{$usuario->nombre}}</td>
										<td>{{$usuario->apellido}}</td>
										<td>{{$usuario->fecha_cre}}</td>
										<td>{{$usuario->fecha_mod}}</td>
										<td>
											@if($usuario->deleted_at!='')
												<input type="submit" class="btn btn-default" disabled="true" value="Editar">
											@else
												{!!link_to_route('usuario.edit', $title = 'Editar', $parameters = $usuario->id, $attributes = ['class'=>'btn btn-warning']);!!}
											@endif
										</td>
										<td>
											@if($usuario->deleted_at!='')
												<a class="btn btn-primary btn-block" href="/admin/usuario/{{$usuario->id}}/restaurar">Restaurar</a>
											@else
													{!! Form::open(['route' => ['usuario.destroy',$usuario->id],'method'=>'DELETE']) !!}
											    <div class="form-group">
											    	{!!Form::submit('Desactivar',['class'=>'btn btn-danger btn-block'])!!}
											    </div>
											    {!! Form::close() !!}
											@endif
										</td>
									</tr>
								@endforeach
				                  </tbody>
				                </table>
				              </div>
				            </div>
		          		</div>  <!--fin del card-3 -->
				</div>
			</div>
		</div>
</div>
@endsection