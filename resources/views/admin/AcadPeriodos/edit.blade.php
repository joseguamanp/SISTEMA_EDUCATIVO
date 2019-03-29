@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
        	<div class="row">
        		<div class="col-md-4">
        			{!! Form::model($data,['route' => ['AcadPeriodos.update',$data->id],'method'=>'PUT']) !!}	 
        				<div class="form-group">
        					<label>Nombre Periodos</label>
					    	 {!!Form::text('nombre_periodo',null,['class'=>'form-control'])!!}
        				</div>
                                        <div class="form-group">
        					<label>Nombre Corto</label>
					    	 {!!Form::text('nombre_corto',null,['class'=>'form-control'])!!}
        				</div>
                                        <div class="form-group">
        					<label>Año Periodo</label>
					    	 {!!Form::text('año_periodo',null,['class'=>'form-control'])!!}
        				</div>
        				
                                        <div class="form-group">
        					<label>Nombre Ciclo</label>
                                                
                             <select class="form-control" name="id_ciclo" required>
                                <option value="">--Seleccione--</option>
                                @foreach($getdato['id_ciclo'] as $dato)
                                    <option value="{{$dato->id}}">{{$dato->nombre_ciclo}}</option>
                                @endforeach
                            </select>
                                                
        				</div>
                                        <div class="form-group">
        					<label>Fecha Inicio de Clases</label>
					    	 <div class="input-group">
                            <input class="form-control" type="text" id="ini" onchange="cambiarFormatoFecha('ini');" required="yes">
                            <div class="input-group-append">
                                <label class="input-group-text" for="ini">
                                    <i class="fas fa-calendar-alt fa-lg"></i>
                                </label>
                            </div>
                        </div> 
        				</div>
                                        <div class="form-group">
        					<label>Fecha Fin de Clases</label>
					    	 <div class="input-group">
                            <input class="form-control" type="text" id="fin" onchange="cambiarFormatoFecha('fin');" required="yes">
                            <div class="input-group-append">
                                <label class="input-group-text" for="fin">
                                    <i class="fas fa-calendar-alt fa-lg"></i>
                                </label>
                            </div>
                        </div>
        				</div>
                                        <div class="form-group">
        					<label>fecha inicio matricula ord</label>
					    	 <div class="input-group">
                            <input class="form-control" type="text" id="inima" onchange="cambiarFormatoFecha('inima');" required="yes">
                            <div class="input-group-append">
                                <label class="input-group-text" for="inima">
                                    <i class="fas fa-calendar-alt fa-lg"></i>
                                </label>
                            </div>
                        </div>
        				</div>
                                        <div class="form-group">
        					<label>fecha fin matricula ord</label>
					    	 <div class="input-group">
                            <input class="form-control" type="text" id="finma" onchange="cambiarFormatoFecha('finma');" required="yes">
                            <div class="input-group-append">
                                <label class="input-group-text" for="finma">
                                    <i class="fas fa-calendar-alt fa-lg"></i>
                                </label>
                            </div>
                        </div>
        				</div>
                                        <div class="form-group">
        					<label>fecha inicio matricula ext</label>
					    	 <div class="input-group">
                            <input class="form-control" type="text" id="iniext" onchange="cambiarFormatoFecha('iniext');" required="yes">
                            <div class="input-group-append">
                                <label class="input-group-text" for="iniext">
                                    <i class="fas fa-calendar-alt fa-lg"></i>
                                </label>
                            </div>
                        </div>
        				</div>
                                        <div class="form-group">
        					<label>fecha fin matricula ext</label>
					    	 <div class="input-group">
                            <input class="form-control" type="text" id="finext" onchange="cambiarFormatoFecha('finext');" required="yes">
                            <div class="input-group-append">
                                <label class="input-group-text" for="finext">
                                    <i class="fas fa-calendar-alt fa-lg"></i>
                                </label>
                            </div>
                        </div>
        				</div>
                                        <div class="form-group">
        					<label>fecha ini matricula esp</label>
					    	 <div class="input-group">
                            <input class="form-control" type="text" id="iniesp" onchange="cambiarFormatoFecha('iniesp');" required="yes">
                            <div class="input-group-append">
                                <label class="input-group-text" for="iniesp">
                                    <i class="fas fa-calendar-alt fa-lg"></i>
                                </label>
                            </div>
                        </div>
        				</div>
                                        <div class="form-group">
        					<label>fecha fin matricula esp</label>
					    	 <div class="input-group">
                            <input class="form-control" type="text" id="finesp" onchange="cambiarFormatoFecha('finesp');" required="yes">
                            <div class="input-group-append">
                                <label class="input-group-text" for="finesp">
                                    <i class="fas fa-calendar-alt fa-lg"></i>
                                </label>
                            </div>
                        </div>
        				</div>
                                <div>
                    <input hidden='yes' name="fechaini" id="fechaini">  
        	</div>
                <div>
                    <input hidden='yes' name="fechafin" id="fechafin">  
        	</div>
                <div>
                    <input hidden='yes' name="fechainima" id="fechainima">  
        	</div>
                <div>
                    <input hidden='yes' name="fechafinma" id="fechafinma">  
        	</div>
                <div>
                    <input hidden='yes' name="fechainiext" id="fechainiext">  
        	</div>
                <div>
                    <input hidden='yes' name="fechafinext" id="fechafinext">  
        	</div>
                <div>
                    <input hidden='yes' name="fechainiesp" id="fechainiesp">  
        	</div>
                <div>
                    <input hidden='yes'name="fechafinesp" id="fechafinesp">  
        	</div>
        				<div class="form-group">
        					<button class="btn btn-sucess btn-block">Aceptar</button>
        				</div>
					{!! Form::close() !!}
					@include('mensaje.mensajeerror')
        		</div>
        	</div>
	</div>
</div>
@endsection