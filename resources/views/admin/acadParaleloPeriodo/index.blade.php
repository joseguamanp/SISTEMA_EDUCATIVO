@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
    	<div class="row">
    		<div class="col-md-8"> 			    
			    <div class="form-group row">
			        <label for="id_carrera" class="col-md-3 col-form-label">Seleccione carrera</label>
					<div class="col-md-8">
						<select class="form-control" name="id_carrera" id="id_carrera" required="yes">
				        	<option value="" data-carrera="0">--SELECCIONE--</option>
				        	@foreach( $carreras as $carrera )					        						        		
					                	<option value="{{ $carrera->id }}">
					                		{{ $carrera->nombreCarrera }}
					                	</option>					                	
				            @endforeach
				        </select>
					</div>
			    </div>

			    <div class="form-group row">
			       	<label for="id_periodo" class="col-md-3 col-form-label">Seleccione período</label>
			       	<div class="col-md-8">
			       		<select class="form-control" name="id_periodo" id="id_periodo" required="yes">
			            	<option value="">--SELECCIONE--</option>
			              	@foreach( $periodos as $periodo )
			                	<option value="{{ $periodo->id }}" data-periodo="{{$periodo->nombre_periodo}}">
			                		{{ $periodo->nombre_periodo }}
			                	</option>
			              	@endforeach
			            </select>
			       	</div>			       	
			    </div>			
			    <div class="form-group row">			      			     		        			      
					<div class="col-md-5"> 							    	
			    		<a href="{!!URL::to('/admin/academicoNuevoPeriodo');!!}" class="btn btn-primary">Crear nuevo período</a>						       
	    			</div>
    			</div>
        		<div id="mensaje"></div>

				@include('mensaje.mensajeerror')
    		</div>      
    		<div class="col-md-4">     					    			    	
	    		<button class="btn btn-primary btn-block" id="btnmostrarRegistos" onclick="filtrarBusqueda();">Mostrar registros guardados</button>	    	    			    			    						   			    	
	    		<button class="btn btn-danger btn-block" id="btningresarRegistros" onclick="mostrarRegistos();">Mostrar registros no guardados</button>			    		    			
    		</div> 
    	</div>

    	<div class="row mt-4">
    		<div class="col-md-12">    			
				<div class="card mb-3">
		            <div class="card-header">
		              	<i class="fas fa-table"></i>
		              	Académico paralelo por período
		            </div>
		            <div class="card-body">
	              		<div class="table-responsive">
	                		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">            
					            <thead>				                    
				                    <tr class="small">					                    										
										<th>Sede</th>
										<th>Jornada</th>
										<th>Paralelo</th>										
										<th>Estado</th>																			
									</tr>
					            </thead>
					            <tbody id="datos"></tbody>
				        	</table>
				    	</div>
					</div>
		    	</div>  <!--fin del card-3 -->
        	</div>
    	</div>
	</div>
</div>

@endsection
@section('script')
<script type="text/javascript" src="{{ asset('js/infParaleloxPeriodo.js') }}"></script>
@endsection