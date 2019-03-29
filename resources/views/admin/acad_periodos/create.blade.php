@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-4">
        			{!! Form::open(['url' => 'admin/periodo', 'method' => 'POST']) !!}
        				<div class="form-group">
        					<label>Nombre Periodo</label>
					    	{!!Form::text('nombre_periodo',null,['class'=>'form-control'])!!}
        				</div>
        				<div class="form-group">
        					<label>Anio Periodo</label>
					    	{!!Form::text('anio_periodo',null,['class'=>'form-control'])!!}
        				</div>
        				<div class="form-group">
        					<label>Seleccionar Ciclo:</label>
        					<select name="id_ciclo" class="form-control">
        						@foreach($ciclo as $ci)
        							<option value="{{$ci->id}}">{{$ci->nombre_ciclo}}</option>
        						@endforeach				
        					</select>
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
				              Periodo</div>
				            <div class="card-body">
				              <div class="table-responsive">
				                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				                  <thead>
				                    <tr>
										<th>Nombre Periodo</th>
										<th>Año</th>
										<th>Creado</th>
										<th>Modificado</th>
										<th>Modificar</th>
										<th>Estado</th>		
									</tr>
				                  </thead>
				                  <tbody>
				                	@foreach($data as $datas)
									<tr>
										<td>{{$datas->nombre_periodo}}</td>
										<td>{{$datas->anio_periodo}}</td>
										<td>{{$datas->fecha_cre}}</td>
										<td>{{$datas->fecha_mod}}</td>
										<td>
											{!!link_to_route('periodo.edit', $title = 'Editar', $parameters = $datas->id, $attributes = ['class'=>'btn btn-warning']);!!}
										</td>
										<td>
											@if($datas->deleted_at!='')
												<a class="btn btn-primary btn-block" href="/admin/periodo/{{$datas->id}}/restaurar">Restaurar</a>
											@else
												{!! Form::open(['route' =>['periodo.destroy',$datas->id],'method'=>'DELETE']) !!}
											    <div class="form-group">
											    	{!!Form::submit('Eliminar',['class'=>'btn btn-danger btn-block'])!!}
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