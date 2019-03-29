@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-4">
        			{!! Form::open(['url' => 'admin/Areas_Materias', 'method' => 'POST']) !!}
        				<div class="form-group">
        					<label>Nombre Areas Materias</label>
                                                <input class="form-control" type="text" name="nombre_area" required="yes">
        				</div>
                                        <div class="form-group">
        					<label>Descripción</label>
                                                <input class="form-control" type="text" name="descripcion" required="yes">
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
				             Detalle</div>
				            <div class="card-body">
				              <div class="table-responsive">
				                <table class="table table-bordered small" id="dataTable" width="100%" cellspacing="0">
				                  <thead>
				                    <tr>
										<th>Etiqueta</th>
                                                                                <th>Descripción</th>
										<th>Creado</th>
										<th>Modificado</th>
										<th>Editar</th>
										<th>Estado</th>		
									</tr>
				                  </thead>
				                  <tbody>
				                	@foreach($data as $datas)
									<tr>
										<td>{{$datas->nombre_area}}</td>
                                                                                <td>{{$datas->descripcion}}</td>
										<td>{{$datas->fecha_cre}}</td>
										<td>{{$datas->fecha_mod}}</td>
										<td>
                                                                                    @if($datas->deleted_at != '')
                                                                                    
                                                                                    <input type="submit" class="btn btn-default btn-sm" value="Editar" disabled="yes">
                                                                                    
                                                                                    @else
											{!!link_to_route('Areas_Materias.edit', 
                                                                                            $title = 'Editar', 
                                                                                            $parameters = $datas->id, 
                                                                                            $attributes = ['class'=>'btn btn-warning btn-sm']);!!}
                                                                                    @endif
										</td>
										<td>
											@if($datas->deleted_at!='')
												<a class="btn btn-primary btn-block btn-sm" href="/admin/Areas_Materias/{{$datas->id}}/restaurar">Restaurar</a>
											@else
													{!! Form::open(['route' => ['Areas_Materias.destroy',$datas->id],'method'=>'DELETE']) !!}
											    <div class="form-group">
											    	{!!Form::submit('Desactivar',['class'=>'btn btn-danger btn-block btn-sm'])!!}
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