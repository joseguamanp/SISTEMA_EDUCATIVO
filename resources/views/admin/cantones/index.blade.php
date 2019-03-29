@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-4">
        			{!! Form::open(['url' => 'admin/cantones', 'method' => 'POST']) !!}
        				<div class="form-group">
        					<label>Nombre de Cantón</label>
					    	<input class="form-control" type="text" name="etiqueta" required pattern="[A-Za-zá-úÁ-Ú ]+">
        				</div>

        				<div class="form-group">
        					<label>Pais</label>
					    	<select name="id_provincias" id="id_provincias" class="form-control" required>
					    		<option value="0">--Seleccione--</option>
					    		@foreach($data['provincias'] as $dato)
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
				              Cantones</div>
				            <div class="card-body">
				              <div class="table-responsive">
				                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				                  <thead>
				                    <tr>
										<th>Cantones</th>
										<th>Provincias</th>
										<th>Editar</th>
										<th>Estado</th>		
									</tr>
				                  </thead>
				                  <tbody>
				                	@foreach($data['cantones'] as $datas)
									<tr>
										<td>{{$datas->etiqueta}}</td>
											@foreach($data['provincias'] as $provincia)
												@if($datas->id_provincia == $provincia->id)
													<td>{{$provincia->etiqueta}}</td>
												@endif
											@endforeach
										<td>
											@if($datas->deleted_at!='')
												{!!link_to_route('cantones.edit', $title = 'Editar', $parameters = $datas->id, $attributes = ['class'=>'btn btn-warning disabled']);!!}
											@else
												{!!link_to_route('cantones.edit', $title = 'Editar', $parameters = $datas->id, $attributes = ['class'=>'btn btn-warning']);!!}
											@endif
										</td>
										<td>
											@if($datas->deleted_at!='')
												<a class="btn btn-primary btn-block" href="cantones/{{$datas->id}}/restaurar">Restaurar</a>
											@else
													{!! Form::open(['route' => ['cantones.destroy',$datas->id],'method'=>'DELETE']) !!}
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