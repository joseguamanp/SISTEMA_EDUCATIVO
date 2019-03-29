@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-3">
    			{!! Form::open(['url' => 'admin/academicoCarreraCoordinador', 'method' => 'POST']) !!}

    				<!-- Select Basic -->
			        <div class="form-group">
			          <label>Carreras</label>
			          
			            <select class="form-control" name="id_carrera" required="yes">
			              <option value="">--SELECCIONE--</option>
			              @foreach( $data['carreras'] as $carrera )
			                <option value="{{ $carrera->id }}">{{ $carrera->nombreCarrera }}</option>
			              @endforeach
			            </select>
			   
			        </div>

			    				<!-- Select Basic -->
			        <div class="form-group">
			          	<label>Docentes</label>
			            <select class="form-control" name="id_docente" required="yes">
			              <option value="">--SELECCIONE--</option>
			              @foreach( $data['AcadDoceInfoPersonal'] as $docente )
			                <option value="{{ $docente->id }}">{{ $docente->primerApellido }} {{ $docente->segundoApellido }} {{ $docente->primerNombre }} {{ $docente->segundoNombre }}</option>
			              @endforeach
			            </select>
			        </div>
    				<div class="form-group">
        					<button class="btn btn-sucess btn-block">Aceptar</button>
        				</div>   
        				<input name="id_usu_cre" value="{{ Auth::user()->id }}" hidden="yes">     							
        				<input name="id_usu_mod" value="{{ Auth::user()->id }}" hidden="yes">     								
				{!! Form::close() !!}
				@include('mensaje.mensajeerror')
    		</div>

        	<div class="col-md-9">
				<div class="card mb-3">

		            <div class="card-header">
		              	<i class="fas fa-table"></i>
		              	Académico carrera coordinador
		            </div>

		            <div class="card-body">

	              		<div class="table-responsive">

	                		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					            
					            <thead>
				                    
				                    <tr>
										<th>Carrera</th>
										<th>Docente</th>
										<th>Creado</th>
										<th>Modificado</th>
										<th>Editar</th>
										<th>Desactivar</th>		
									</tr>

					            </thead>

					            <tbody>
				                	@foreach($acad as $datas)
										<tr>
											@foreach( $data['carreras'] as $carrera )
											@if($datas->id_carrera == $carrera->id)
												<td class="small">{{ $carrera->nombreCarrera }}</td>		
											@endif
											@endforeach

											@foreach( $data['AcadDoceInfoPersonal'] as $docente )
											@if($datas->id_docente == $docente->id)
												<td class="small">{{ $docente->primerApellido }} {{ $docente->segundoApellido }} {{ $docente->primerNombre }} {{ $docente->segundoNombre }}</td>
											@endif
											@endforeach																						
											<td class="small">{{ $datas->fecha_cre }}</td>
											<td class="small">{{ $datas->fecha_mod }}</td>

											<td>
												@if($datas->deleted_at!='')

												<input type="submit" disabled="yes" class="btn" value="Editar">

												@else
													{!!link_to_route(
														'academicoCarreraCoordinador.edit', 
														$title = 'Editar', 
														$parameters = $datas->id, 
														$attributes = ['class'=>'btn btn-warning']);!!}
												@endif

											</td>
											<td>
												@if($datas->deleted_at!='')
													<a class="btn btn-primary btn-block" href="/admin/academicoCarreraCoordinador/{{$datas->id}}/restaurar">Activar</a>
												@else
													{!!Form::open([
														'route' => ['academicoCarreraCoordinador.destroy',
														$datas->id],
														'method'=>'DELETE']) !!}
													    <div class="form-group">
													    	{!!Form::submit('Desactivar',[
													    	'class'=>'btn btn-danger btn-block'])!!}
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