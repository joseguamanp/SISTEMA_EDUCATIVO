@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
            
        {!! Form::open(['url' => 'admin/AcadPeriodos', 'method' => 'POST']) !!}
        
            <div class="row">
                
                <div class="col-md-3">
                    <div class="form-group">
        		<label>Nombre Periodos</label>
			<input class="form-control" type="text" name="etiqueta" required pattern="[A-Za-zá-úÁ-Ú0-9-? ]+">
                    </div>				
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Nombre corto</label>
                        <input class="form-control" type="text" name="nombrecorto" required pattern="[A-Za-zá-úÁ-Ú0-9-? ]+">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Año Periodo</label>
                        <input class="form-control" type="text" name="añoperiodo" required pattern="[0-9-? ]+">
                    </div> 
                </div>
                <div class="col-md-3">
                            <label>Nombre Ciclo</label>
                            <select class="form-control" name="id_ciclo" required>
                                <option value="">--Seleccione--</option>
                                @foreach($getdato['id_ciclo'] as $dato)
                                    <option value="{{$dato->id}}">{{$dato->nombre_ciclo}}</option>
                                @endforeach
                            </select>
                </div>
                <div class="col-md-3">
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
                </div>
                 <div class="col-md-3">
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
                    </div>
                <div class="col-md-3">
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
                    </div>
                <div class="col-md-3">
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
                    </div>
                <div class="col-md-3">
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
                    </div>
                <div class="col-md-3">
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
                    </div>
                
                <div class="col-md-3">
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
                    </div>
                <div class="col-md-3">
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
             </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="form-group">
                    <button class="btn btn-sucess btn-block">Aceptar</button>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>

        
        {!! Form::close() !!}
        @include('mensaje.mensajeerror')


<!--<div class="row">-->
            <div class="col-md-12">
        	<div class="card mb-3">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                        Detalle
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table style="text-align: center" class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="small">
				    <tr>
                                        <!--<th>Nombre Período</th>
                                        <th>Nombre Corto</th>
                                        <th>Año Período</th>-->
                                        <th>Nombre Ciclo</th>
                                        <th>Clases Ini-Fin</th>

                                        <th>Matrícula Ordinaria Ini-Fin</th>

                                        <th>Matrícula Extraordinaria Ini-Fin</th>

                                        <th>Matrícula Especial Ini-Fin</th>

                                        <!-- <th>Creado</th>
                                        <th>Modificado</th> -->
                                        <th>Editar</th>
                                        <th>Estado</th>		
                                    </tr>
				</thead>
				<tbody>
                                    @foreach($data as $datas)
                                        <tr>
                                            <!-- <td>{{$datas->nombre_periodo}}</td>
                                            <td>{{$datas->nombre_corto}}</td>
                                            <td>{{$datas->anio_periodo}}</td>  -->
                                            <td>{{$datas->nombre_ciclo}}</td>
                                            <td>{{$datas->fecha_inicio_clases." - ".$datas->fecha_fin_clases}}</td>

                                            <td>{{$datas->fecha_inicio_matricula_ord." - ".$datas->fecha_fin_matricula_ord}}</td>

                                            <td>{{$datas->fecha_inicio_matricula_ext." - ".$datas->fecha_fin_matricula_ext}}</td>

                                            <td>{{$datas->fecha_inicio_matricula_esp." - ".$datas->fecha_fin_matricula_esp}}</td>


                                            <!-- <td>{{$datas->fecha_cre}}</td>
                                            <td>{{$datas->fecha_mod}}</td> -->
                                            <td>
                                                @if($datas->deleted_at != '')
                                                    <input type="submit" class="btn btn-default" value="Editar" disabled="yes">
                                                @else
                                                    {!!link_to_route('AcadPeriodos.edit', 
                                                        $title = 'Editar', 
                                                        $parameters = $datas->id, 
                                                        $attributes = ['class'=>'btn btn-warning']);!!}
                                                @endif
                                            </td>
                                            <td>
                                                @if($datas->deleted_at!='')
                                                    <a class="btn btn-primary btn-block" href="AcadPeriodos/{{$datas->id}}/restaurar">Restaurar</a>
                                                @else
                                                    {!! Form::open(['route' => ['AcadPeriodos.destroy',$datas->id],'method'=>'DELETE']) !!}
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
            <!--</div>-->
    </div>
</div>
@endsection

@section('script')
  <script>
      $(document).ready(function(){

          fechaPicker('ini');
          fechaPicker('fin');
          fechaPicker('inima');
          fechaPicker('finma');
          fechaPicker('iniext');
          fechaPicker('finext');
          fechaPicker('iniesp');
          fechaPicker('finesp');

          $('.dropdown-submenu a.test').on("click", function(e){
              $(this).next('ul').toggle();
              e.stopPropagation();
              e.preventDefault();
          });
      });
  </script>
   @endsection