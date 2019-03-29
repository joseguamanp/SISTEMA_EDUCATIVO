@extends('layouts.principal')
@section('content')
<div id="content-wrapper"> 
    <div class="container-fluid">
    	<div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <div class="custom-radio custom-control">
                        <input class="custom-control-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="1" onchange="checkRb('#inlineRadio1');" checked>
                        <label class="custom-control-label" for="inlineRadio1">Registrar</label>
                    </div>

                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2" onchange="checkRb('#inlineRadio2');">
                        <label class="custom-control-label" for="inlineRadio2">Consultar</label>
                    </div>    
                </div> 
                
                <div class="form-group">
                    <label>Seleccionar sedes</label>
                    <select class="form-control" name="id_sede" id="id_sede" required>
                        <option value="0" data-sedes="0">--Seleccione--</option>
                        @foreach($getdatos['sedes'] as $sedes)
                            <option value="{{$sedes->id}}" data-sedes='{{$sedes->id}}'>{{$sedes->nombre_sede}}</option>
                        @endforeach
                    </select>
                </div> 

                <div class="form-group">
                    <label>Seleccionar  carrera</label>
                    <select class="form-control" name="id_carrera" id="id_carrera" onchange="getParalelos(1);" required>
                        <option value="0" data-carreras="0">--Seleccione--</option>
                            @foreach($getdatos['carrera'] as $carrera)                                                                    
                                        <option value="{{$carrera->id}}" data-carreras='{{$carrera->id}}'>{{$carrera->nombreCarrera}}</option>                                                                                                            
                            @endforeach
                    </select>
                </div> 
                
                <div class="form-group">
                    <label>Seleccionar  jornada</label>
                    <select class="form-control" name="id_jornada" id="id_jornada" onchange="getParalelos(1);" required>
                        <option value="0" data-jornada="0">--Seleccione--</option>
                        @foreach($getdatos['jornada'] as $jornada)
                            <option value="{{$jornada->id}}" data-jornada="{{$jornada->id}}">{{$jornada->etiqueta}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group" id="cont_paralelo">
                    <label>Seleccionar Paralelo</label>
                    <select class="form-control" name="id_paralelo" id="id_paralelo" required>
                        <option value="0" data-jornada="0">--Seleccione--</option>
                        @foreach($getdatos['paralelo'] as $paralelos)
                            <option value="{{$paralelos->id}}" data-paralelos="{{$paralelos->id}}">{{$paralelos->nombre_paralelo}}</option>
                        @endforeach
                    </select>
                </div>                

                <div class="form-group">
                    <input type="submit" id="guardarAsig" title="Guardar" class="btn btn-success btn-block" onclick="guardarAsignacion();">
                    <input type="submit" id="buscarAsig" title="Buscar" class="btn btn-success btn-block" onclick="consultarAsignacion(1);">
                </div>
    		</div>
		@include('mensaje.mensajeerror')

            <div class="col-md-8">
                <div class="row" style="padding-top: 6%;">
            <div class="col-md-12">
                <div class="card mb-6">
                    <div class="card-header">
                        <i class="fas fa-table"></i>
                              Mallas Carreras
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered"  id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nombre Paralelo</th>
                                        <th>Editar</th>
                                    </tr>
                                </thead>
                                <form action="" id="formEdit">

                                <tbody id="tabla">      
                                    @foreach($getdatos['paralelo'] as $paralelo)
                                        <tr>
                                            <td>{{$paralelo->nombre_paralelo}}</td>
                                            <td>
                                                {!!link_to_route('cantones.edit', $title = 'Editar', $parameters = $paralelo->id, $attributes = ['class'=>'btn btn-warning disabled']);!!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>

                                </form>
                            </table>
                        </div>
                    </div>
                </div>  <!--fin del card-3 -->
            </div>
        </div>        
            </div>
        
    </div>
</div>
@endsection