@extends('layouts.principal')
@section('content')
	<div id="content-wrapper">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-3">
					{!! Form::open(['url' => 'admin/docenteMateria', 'method' => 'POST']) !!}

					<!--<div class="form-group">
						<label>Seleccionar Periodo</label>
						<select class="form-control" name="id_periodo" requerid>
						<option value="0">--Seleccione--</option>
							@foreach($getdato['materiaparalelo'] as $getdata)
								<option value="{{$getdata->id}}">{{$getdata->nombre_materia}}</option>
							@endforeach
						</select>
					</div>-->

					<div class="form-group">
						<label>Seleccionar 	Docente</label>
						<select class="form-control" name="id_docente">
							@foreach($getdato['Docente'] as $getdata)
								<option value="{{$getdata->id}}">{{$getdata->primerApellido}}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Seleccionar 	Materia</label>
						<select class="form-control" name="id_materia_x_paralelo">
							@foreach($getdato['materia'] as $getdata)
								<option value="{{$getdata->id}}">{{$getdata->nombre_materia}}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label>Paralelo</label>
						<select class="form-control" name="id_materia_x_paralelo">
							@foreach($getdato['paralelo'] as $getdata)
								<option value="{{$getdata->id}}">{{$getdata->nombre_paralelo}}</option>
							@endforeach
						</select>
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
							Mallas Carrera</div>
						<div class="card-body">
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
									<tr>
										<th>Docente</th>
										<th>Paralelo</th>
										<th>Creado</th>
										<th>Modificado</th>
										<th>Editar</th>
										<th>Estado</th>
									</tr>
									</thead>
									<tbody>
									@foreach($data as $datas)
										<tr>
											<td>{{$datas->primerApellido}}</td>
											<td>{{$datas->nombre_paralelo}}</td>
											<td>{{$datas->fecha_cre}}</td>
											<td>{{$datas->fecha_mod}}</td>
											<td>
												@if($datas->deleted_at!='')
													{!!link_to_route('docenteMateria.edit', $title = 'Editar', $parameters = $datas->id_docente, $attributes = ['class'=>'btn disabled']);!!}
												@else
													{!!link_to_route('docenteMateria.edit', $title = 'Editar', $parameters = $datas->id_docente, $attributes = ['class'=>'btn btn-warning']);!!}
												@endif
											</td>
											<td>
												@if($datas->deleted_at!='')
													<a class="btn btn-primary btn-block" href="docenteMateria/{{$datas->id}}/restaurar">Restaurar</a>
												@else
													{!! Form::open(['route' => ['docenteMateria.destroy',$datas->id],'method'=>'DELETE']) !!}
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