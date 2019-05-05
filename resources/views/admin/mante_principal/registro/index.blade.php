@extends('layouts.principal')
@section('content')
  <div id="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <!-- INICIO DE DATOS DE SEXO -->
        <div class="col-md-12">
          <!-- Inicio de Card -->
          <div class="card mb-3">
            <div class="card-header">
              Ingreso de Datos
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-4 col-md-4 col-lg-4">
                  <div class="row">
                    <div class="col-md-6">
                      <img src="img/team/3.jpg" class="img-thumbnail">
                    </div>
                    <div class="col-md-6">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Subir foto</label>
                      </div>
                    </div>
                  </div>  
                </div> 
                <div class="col-sm-8 col-md-8 col-lg-8"><br>
                  <div class="row">
                        <div class="col-sm-2 col-md-2 col-lg-2">
                        <label>Primer Nombre:</label>
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                          <input class="form-control" type="text" name="pri_nombre">
                        </div>
                        <div class="col-sm-2 col-md-2 col-lg-2">
                           <label>Segundo Nombre:</label>           
                        </div>
                        <div class="col-sm-4 col-md-4 col-lg-4">
                          <input class="form-control" type="text" name="seg_nombre">
                        </div>
                  </div> <br>
                  <div class="row">
                      <div class="col-sm-2 col-md-2 col-lg-2">
                         <label>Primer Apellido:</label>
                      </div>
                      <div class="col-sm-4 col-md-4 col-lg-4">
                        <input class="form-control" type="text" name="pri_apellido">
                      </div>
                      <div class="col-sm-2 col-md-2 col-lg-2">
                         <label>Segundo Apellido:</label>           
                      </div>
                      <div class="col-sm-4 col-md-4 col-lg-4">
                        <input class="form-control" type="text" name="seg_apellido">
                      </div>
                  </div><br>
                  <div class="row">
                    <div class="col-sm-2 col-md-2 col-lg-2">
                       <label>Cedula:</label>
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                      <input class="form-control" type="number" name="cedula">
                    </div>
                    <div class="col-sm-2 col-md-2 col-lg-2">
                       <label>Email:</label>           
                    </div>
                    <div class="col-sm-4 col-md-4 col-lg-4">
                      <input class="form-control" type="email" name="email">
                    </div>
                </div> <br>
                  <div class="row">
                  <div class="col-md-6 col-lg-6">
                    <p class="text-center">Fecha de nacimiento</p>
                    <div class="row">            
                      <div class="col-xs-4 col-sm-4 col-md-4">
                        <select class="form-control" name="dias">
                          <option>Días</option>
                          @foreach($fecha['dia'] as $fe)
                              <option>{{$fe}}</option>
                          @endforeach
                        </select>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                          <select class="form-control" name="mes">
                            <option>Mes</option>
                            @foreach($fecha['mes'] as $fe)
                              <option>{{$fe}}</option>
                          @endforeach
                          </select>
                        </div>
                        <div class="col-xs-4 col-sm-4 col-md-4">
                        <select class="form-control" name="anio">
                          <option>Año</option>

                          @foreach($fecha['anio'] as $fe)
                              <option>{{$fe}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                </div>
                  <p class="col-lg-2">Cargo:</p>
                  <div class="col-lg-4">
                      <select class="form-control" name="idcargo">
                        <option>Seleccionar cargo</option>
                      </select>
                  </div>
                </div>
                </div>
              </div> 
            </div>
            <div class="card-footer">
               <div class="text-center">
                    <button class="btn btn-primary">Guardar<i class="fa fa-chevron-right" aria-hidden="true"></i></button>
              </div>
            </div>
          </div>
          <!-- Fin de card -->
        </div>
      </div>
    </div>
  </div>
@endsection