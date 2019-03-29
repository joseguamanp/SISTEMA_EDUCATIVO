@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
    	<div class="row">    		
    		<div class="col-md-7">    			    			
    			<div class="form-group row">
			       	<label for="id_periodo" class="col-md-3 col-form-label">Nuevo Período</label>
			       	<div class="col-md-9">
			       		<select class="form-control" name="id_nuevoPeriodo" id="id_nuevoPeriodo" required="yes">
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
			        <label for="id_periodo" class="col-md-3 col-form-label">Períodos anteriores</label>
					<div class="col-md-9">
						<select class="form-control" name="id_periodoAnterior" id="id_periodoAnterior" required="yes" onchange="buscarRegistros();">
				        	<option value="" data-carrera="0">--SELECCIONE--</option>
				        	@foreach( $periodoAnterior as $pa )
			                	<option value="{{ $pa->id }}" data-periodo="{{$pa->nombre_periodo}}">
			                		{{ $pa->nombre_periodo }}
			                	</option>
			              	@endforeach
				        </select>
					</div>
			    </div>	

			    <div class="form-group row">			      			     		        			      
					<div class="col-md-5"> 							    	
			    		<a href="{!!URL::to('/admin/academicoParaleloPeriodo');!!}" class="btn btn-primary">Ir a Paralelos por período</a>						       
	    			</div>
    			</div>					    
    		</div> 	

    		<div class="col-md-5"> 							    	
		    		<button class="btn btn-sucess btn-primary" id="btnregistrarPeriodo" onclick="registrarNuevoPeriodo();">Guardar en nuevo período</button>		    		      
    		</div>		      			     		        			      
		        
        		<div id="mensaje" class="col-md-7"></div>

				@include('mensaje.mensajeerror')
    		</div>          		
    	</div>

    	<div class="row mt-4" id="divdataTableChk">
    		<div class="col-md-12">    			
				<div class="card mb-3">
		            <div class="card-header">
		              	<i class="fas fa-table"></i>
		              	Datos del período a copiar 
		            </div>
		            <div class="card-body">
	              		<div class="table-responsive">
	                		<table class="table table-bordered" id="dataTableChk" width="100%" cellspacing="0">            
					            <thead>				                    
				                    <tr class="small">
				                    	<th><input type="checkbox" id="chkseleccion" value=""> Seleccionar todo</th>
				                    	<th>Carrera</th>
										<th>Sede</th>
										<th>Jornada</th>
										<th>Paralelo</th>																		
									</tr>									
					            </thead>
					            <tbody id="datosChk">
					            	
					            </tbody>
				        	</table>
				    	</div>
					</div>
		    	</div>  <!--fin del card-3 -->
        	</div>
    	</div>

    	<div class="row mt-4" id="divdatatable">
    		<div class="col-md-12">    			
				<div class="card mb-3">
		            <div class="card-header">
		              	<i class="fas fa-table"></i>
		              	Académico Nuevo Período
		            </div>
		            <div class="card-body">
	              		<div class="table-responsive">
	                		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">            
					            <thead>				                    
				                    <tr class="small">		
				                    	<th>Carrera</th>			                    										
										<th>Sede</th>
										<th>Jornada</th>
										<th>Paralelo</th>									
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
<script type="text/javascript" src="{{ asset('js/infNuevoPeriodo.js') }}"></script>
@endsection
