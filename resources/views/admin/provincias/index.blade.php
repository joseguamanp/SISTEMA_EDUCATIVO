@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-4">
        			{!! Form::open(['url' => 'admin/provincias', 'method' => 'POST']) !!}
        				<div class="form-group">
        					<label>Nombre de Provincia</label>
					    	<input class="form-control" type="text" name="etiqueta" required pattern="[A-Za-zá-úÁ-Ú ]+">
        				</div>
        				<div class="form-group">
        					<label>Pais</label>
					    	<select name="id_pais_sene" id="id_pais_sene" class="form-control" required>
					    		<option value="">--Seleccione--</option>
					    		@foreach($data['paises'] as $dato)
									<option value="{{$dato->id}}">{{$dato->etiqueta}}</option>
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
				              Provincias</div>
				            <div class="card-body">
				              <div class="table-responsive">
				                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				                  <thead>
				                    <tr>
										<th>Etiqueta</th>
										<th>Pais</th>
										<th>Editar</th>
										<th>Estado</th>		
									</tr>
				                  </thead>
				                  <tbody>
				                	@foreach($data['provincias'] as $dato)
									<tr>
										<td>{{$dato->etiqueta}}</td>
											@foreach($data['paises'] as $pais)
												@if($dato->id_pais == $pais->id)
													<td>{{$pais->etiqueta}}</td>
												@endif
											@endforeach
										<td>
											@if($dato->deleted_at!='')
												{!!link_to_route('provincias.edit', $title = 'Editar', $parameters = $dato->id, $attributes = ['class'=>'btn btn-warning disabled']);!!}
											@else
												{!!link_to_route('provincias.edit', $title = 'Editar', $parameters = $dato->id, $attributes = ['class'=>'btn btn-warning']);!!}
											@endif
										</td>
										<td>
											@if($dato->deleted_at!='')
												<a class="btn btn-primary btn-block" href="provincias/{{$dato->id}}/restaurar">Restaurar</a>
											@else
													{!! Form::open(['route' => ['provincias.destroy',$dato->id],'method'=>'DELETE']) !!}
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