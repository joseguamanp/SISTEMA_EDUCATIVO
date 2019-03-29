@extends('layouts.principal')
@section('content')
<div id="content-wrapper">
    <div class="container-fluid">
            <div class="text text-primary">Materias por Paralelo</div>
            <div class="row">
                <div>
                    <input type="radio" name="radio" id="consultar" value="1" checked="yes"> <label>Consultar</label>
                </div>
                <div>
                   <input type="radio" name="radio" id="registrar_datos" value="0"><label>Registrar</label> 
                </div>
            </div>
            <div id="mensaje"></div>
        	<div class="row">
                <div class="col-lg-6">
                           <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                                <div class="form-group">
                                    <label>Seleccionar  Periodo</label>
                                    <select class="form-control" name="id_periodo" id="id_periodo" onchange="periodo(this)" required="yes">
                                        <option value="">-----------Seleccionar-----------</option>
                                        @foreach($getdatos['periodo'] as $getdata)
                                        <option value="{{$getdata->id}}" data="{{$getdata->id}}">{{$getdata->nombre_periodo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                </div>
                <div class="col-lg-6">
                            <div class="form-group">
                                <label>Seleccionar  Malla</label>
                                <select class="form-control" name="id_malla" id="id_malla" required="yes" onchange="malla(this)">
                                    <option value="">-----------Seleccionar-----------</option>
                                    @foreach($getdatos['malla'] as $getdata)
                                    <option value="{{$getdata->id}}" data="{{$getdata->id}}">{{$getdata->nombre_malla}}</option>
                                    @endforeach
                                </select>
                            </div>
                </div>
            </div>
            <div class="row" id="desaparecer">   
                    <div class="col-lg-6">
                            <div class="form-group">
                                <label>Seleccionar  Sede</label>
                                <select class="form-control" name="id_sede" id="id_sede" required="yes" onchange="sede(this)"></select>
                            </div>
                                <div class="form-group">
                                    <label>Seleccionar  Carrera</label>
                                    <select class="form-control" name="id_carrera" id="id_carrera" required="yes" onchange="carrera(this)">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Seleccionar  Jornada</label>
                                    <select class="form-control" name="id_jornada" id="id_jornada" required="yes" onchange="jornada(this)"></select>
                                </div>
                    </div>  
                    <div class="col-lg-6"> 
                                <div class="form-group">
                                    <label>Seleccionar  Nivel</label>
                                    <select class="form-control" name="id_nivel" id="id_nivel" required="yes" onchange="nivel(this)"></select>
                                </div>
                                <div class="form-group">
                                    <label>Seleccionar  Materia</label>
                                    <select class="form-control" name="id_materia" id="id_materia" required="yes"></select>
                                </div>
                                <div class="form-group">
                                    <label>Seleccionar  Paralelo</label>
                                    <select class="form-control" name="id_paralelo" id="id_paralelo" required="yes"></select>
                                </div>
                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-primary btn-block" id="ingresar_materia_paralelo">Registrar</button>
                    </div>  
            </div>		
            <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-6">
                    <div class="card-header">
                              <i class="fas fa-table"></i>
                              Materias por Periodo</div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered">
                              <thead>
                                <tr>
                                    <th>Periodo</th>
                                     <th>Malla</th>
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
    <script type="text/javascript" src="{{ asset('js/ajax/materiaxparalelo.js') }}"></script>
@endsection