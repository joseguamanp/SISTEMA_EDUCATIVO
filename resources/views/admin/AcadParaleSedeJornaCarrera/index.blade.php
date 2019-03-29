@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-4">
        			{!! Form::open(['url' => 'admin/parSedeJornCarrera', 'method' => 'POST']) !!}
        				<div class="form-group">
        					<label>Seleccionar Carrera:</label>
        					@foreach($getdatos['carrera'] as $getdata)
					    		<option value="{{$getdata->id}}">{{$getdata->nombreCarrera}}</option>
					    	@endforeach
        				</div>
        				<div class="form-group">
        					<label>Seleccionar Sede:</label>
        					@foreach($getdatos['sedes'] as $getdata)
					    		<option value="{{$getdata->id}}">{{$getdata->nombre_sede}}</option>
					    	@endforeach
        				</div>
        				<div class="form-group">
        					<label>Seleccionar Jornada:</label>
        					@foreach($getdatos['jornada'] as $getdata)
					    		<option value="{{$getdata->id}}">{{$getdata->etiqueta}}</option>
					    	@endforeach
        				</div>
        				<div class="form-group">
        					<label>Seleccionar Paralelo:</label>
        					@foreach($getdatos['paralelo'] as $getdata)
					    		<option value="{{$getdata->id}}">{{$getdata->nombre_paralelo}}</option>
					    	@endforeach
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
										<th>Carrera</th>
										<th>sede</th>
										<th>Jornada</th>
										<th>Paralelo</th>
										<th>editar</th>
										<th>Estado</th>		
									</tr>
				                  </thead>
				                  <tbody>
				                	@foreach($data as $datas)
									<tr>
										<td>{{$datas->nombreCarrera}}</td>
										<td>{{$datas->nombre_sede}}</td>
										<td>{{$datas->etiqueta}}</td>
										<td>{{$datas->nombre_paralelo}}</td>
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