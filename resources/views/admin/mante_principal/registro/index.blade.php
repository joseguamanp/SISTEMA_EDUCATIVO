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
                <div class="col-lg-2">
                   <label>Primer Nombre:</label>
                </div>
                <div class="col-lg-4">
                  <input class="form-control" type="text" name="pri_nombre">
                </div>
                <div class="col-lg-2">
                   <label>Segundo Nombre:</label>           
                </div>
                <div class="col-lg-4">
                  <input class="form-control" type="text" name="seg_nombre">
                </div>
              </div> <br>
              <div class="row">
                <div class="col-lg-2">
                   <label>Primer Apellido:</label>
                </div>
                <div class="col-lg-4">
                  <input class="form-control" type="text" name="pri_nombre">
                </div>
                <div class="col-lg-2">
                   <label>Segundo Apellido:</label>           
                </div>
                <div class="col-lg-4">
                  <input class="form-control" type="text" name="seg_nombre">
                </div>
              </div> <br>
              <div class="row">
                <div class="col-lg-2">
                   <label>Cedula:</label>
                </div>
                <div class="col-lg-4">
                  <input class="form-control" type="number" name="pri_nombre">
                </div>
                <div class="col-lg-2">
                   <label>Email:</label>           
                </div>
                <div class="col-lg-4">
                  <input class="form-control" type="email" name="seg_nombre">
                </div>
              </div> <br>
               <div class="row">
                <div class="col-lg-6">
                  <div class="col-md-12">
                    Fecha de nacimiento
                  </div> 
                  <div class="row">
                    <p class="col-sm-2">Días</p>
                    <div class="col-sm-2">
                     <input class="form-control" type="number" name="dia">
                    </div>
                    <p class="col-sm-2">Mes</p>
                    <div class="col-md-2">
                      <input class="form-control" type="text" name="mes">
                    </div>
                     <p class="col-sm-2">Año</p>
                    <div class="col-md-2">
                      <input class="form-control" type="number" name="anio">
                    </div>
                  </div>
                </div>
                
                <div class="col-lg-2">
                   <label>Cargo:</label>           
                </div>
                <div class="col-lg-2">
                  <input class="form-control" type="email" name="seg_nombre">
                </div>
              </div>
            </div>
          </div>
          <!-- Fin de card -->
        </div>
      </div>
    </div>
  </div>

  <!-- **** INICIO DE MODAL ****-->
  <div class="modal fade" id="editar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Editar Sexo</h4>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="id">
          {!! Form::text('etiqueta',null,['class'=>'form-control mb-2', 'id' => 'etiqueta1'])!!}
          <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
          @include('mensaje.mensajeerror')
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="actualizarRegistro('etiqueta1');">Editar</button>
          <button type="button" class="btn btn-secundary" data-dismiss="modal" OnClick='limpiarInputModal();'>Cancelar</button>
        </div>
      </div>
    </div>
  </div>
@endsection