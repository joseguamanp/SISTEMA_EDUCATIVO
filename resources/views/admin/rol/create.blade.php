@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-4">
        			{!! Form::open(['url' => 'admin/rol', 'method' => 'POST']) !!}
        				<div class="form-group">
        					<label>Nombre de rol</label>
					    	<input class="form-control" type="text" name="nombre">
        				</div>
        				<div class="form-group">
        					<button class="btn btn-sucess btn-block">Aceptar</button>
        				</div>
        				
					{!! Form::close() !!}
					@include('mensaje.mensajeerror')
        		</div>
        		<div class="col-md-8">
        				<div class="card mb-3">
				            <div class="card-header">
				              <i class="fas fa-table"></i>
				              Roles</div>
				            <div class="card-body">
				              <div class="table-responsive">
				                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				                  <thead>
				                    <tr>
										<th>Roles</th>
										<th>Creado</th>
										<th>Modificado</th>
										<th>Editar</th>
										<th>Estado</th>
									</tr>
				                  </thead>
				                  <tbody>
				                	@foreach($rol as $roles)
									<tr>
										<td>{{$roles->nombre}}</td>
										<td>{{$roles->fecha_cre}}</td>
										<td>{{$roles->fecha_mod}}</td>
										<td>
											@if($roles->deleted_at!='')
												<input type="submit" class="btn btn-default" disabled="true" value="Editar">
											@else
												{!!link_to_route('rol.edit', $title = 'Editar', $parameters = $roles->id, $attributes = ['class'=>'btn btn-warning']);!!}
											@endif
										</td>
										<td>
											@if($roles->deleted_at!='')
												<a id="restaurar" class="btn btn-primary btn-block" href="/admin/rol/{{$roles->id}}/restaurar">Restaurar</a>
											@else
													{!! Form::open(['route' => ['rol.destroy',$roles->id],'method'=>'DELETE']) !!}
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