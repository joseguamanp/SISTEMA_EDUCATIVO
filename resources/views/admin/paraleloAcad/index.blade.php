@extends('layouts.principal')
@section('content')
	<div id="content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					{!! Form::open(['url' => 'admin/paraleloAcad', 'method' => 'POST']) !!}
					<div class="form-group">
						<div class="form-group">
							<label>Paralelo Academico</label>
							<input class="form-control" type="text" name="nombre_paralelo" required pattern="[A-Za-zá-úÁ-Ú0-9--_ ]+">
						</div>
						<div class="form-group">
							<label>Abreviatura</label>
							<input class="form-control" type="text" name="abreviatura" required pattern="[A-Za-zá-úÁ-Ú0-9--_ ]+">
						</div>
						<label>Seleccionar 	Paralelo Senecyt</label>
						<select class="form-control" name="id_homologacion_sene" required>
							<option value="">--Seleccione--</option>
							@foreach($getdatos['Paralelo'] as $getdata)
								<option value="{{$getdata->id}}">{{$getdata->etiqueta}}</option>
							@endforeach
						</select>
						<div class="form-group">
							<label>Observaciones</label>
							<textarea style="width: 250px; height:125px; resize:none" class="form-control" name="observacion"></textarea>
						</div>
					</div>

					<div class="form-group">
						<button class="btn btn-sucess btn-block">Aceptar</button>
					</div>

					{!! Form::close() !!}
					@include('mensaje.mensajeerror')
				</div>
				<div class="col-md-9">
					<div class="card mb-3">
						<div class="card-header">
							<i class="fas fa-table"></i>
							Paralelos Academicos</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
									<tr>
										<th>Nombre</th>
										<th>Abreviatura</th>
										<th>Paralelo Senecyt</th>
										<th>Editar</th>
										<th>Estado</th>
									</tr>
									</thead>
									<tbody>
									@foreach($data as $datas)
										<tr>
											<td>{{$datas->nombre_paralelo}}</td>
											<td>{{$datas->abreviatura}}</td>
											<td>{{$datas->etiqueta}}</td>
											<td>
												@if($datas->deleted_at!='')
													{!!link_to_route('paraleloAcad.edit', $title = 'Editar', $parameters = $datas->id, $attributes = ['class'=>'btn disabled']);!!}
												@else
													{!!link_to_route('paraleloAcad.edit', $title = 'Editar', $parameters = $datas->id, $attributes = ['class'=>'btn btn-warning']);!!}
												@endif
											</td>
											<td>
												@if($datas->deleted_at!='')
													<a class="btn btn-primary btn-block" href="paraleloAcad/{{$datas->id}}/restaurar">Restaurar</a>
												@else
													{!! Form::open(['route' => ['paraleloAcad.destroy',$datas->id],'method'=>'DELETE']) !!}
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