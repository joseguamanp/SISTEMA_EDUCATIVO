@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-4">
					{!! Form::open(['url' => 'admin/opcion', 'method' => 'POST']) !!}
					    <label>nombre de opcion</label>
					    <input class="form-control" type="text" name="nombre">
					     <label>estado</label>
					    <input class="form-control" type="text" name="estado" value="A">
					    <div class="form-group">
							{!!Form::label('Seleccionar:')!!} <br>
										    	
							@foreach($rol as $roles)
								<input type="checkbox" name="rol[]" value="{!!$roles->id!!}">{!!$roles->nombre!!}<br>   		 
							@endforeach
						</div>
					    <button class="btn btn-success btn-block">aceptar</button>
					{!! Form::close() !!}
					@include('mensaje.mensajeerror')
				</div>
				<div class="col-md-8">
        				<div class="card mb-3">
				            <div class="card-header">
				              <i class="fas fa-table"></i>
				              Opciones</div>
				            <div class="card-body">
				              <div class="table-responsive">
				                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				                  <thead>
				                    <tr>
										<th>Roles</th>
										<th>Opción</th>
										<th>Creado</th>
										<th>Modificado</th>
										<th>Editar</th>
										<th>Eliminar</th>
									</tr>
				                  </thead>
				                  <tbody>
				                	@foreach($opcion as $op)
									<tr>
										<td>{{$op->nombre}}</td>
										<td>{{$op->nombre_opcion}}</td>
										<td>{{$op->fecha_cre}}</td>
										<td>{{$op->fecha_mod}}</td>
										<td>
											@if($op->deleted_at!='')
												<input type="submit" class="btn btn-default" disabled="true" value="Editar">
											@else
												{!!link_to_route('opcion.edit', $title = 'Editar', $parameters = $op->id, $attributes = ['class'=>'btn btn-warning']);!!}
											@endif
										</td>
										<td>
											@if($op->deleted_at!='')
												<a class="btn btn-primary btn-block" href="/admin/opcion/{{$op->id}}/restaurar">Restaurar</a>
											@else
													{!! Form::open(['route' => ['opcion.destroy',$op->id],'method'=>'DELETE']) !!}
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