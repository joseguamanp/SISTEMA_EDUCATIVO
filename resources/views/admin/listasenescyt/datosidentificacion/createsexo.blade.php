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
              Mantenimiento Sexo
            </div>
            <div class="card-body">
              <div class="form-group row">
                <label for="etiqueta" class="col-lg-2 col-md-3 col-form-label text-lg-left">
                  Etiqueta
                </label>
                <div class="col-lg-8 col-md-6">
                  {!! Form::text('etiqueta',null,['class'=>'form-control mb-2', 'id' => 'etiqueta'])!!}
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                  @include('mensaje.mensajeerror')
                </div>
                <div class="col-lg-2 col-md-3">
                  <button class="btn btn-primary btn-block"  onclick="verificarInput('etiqueta');">
                    Guardar
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin de card -->
        </div>
        <!-- FIN DE DATOS DE SEXO -->

        <div class="col-md-12">
          <div class="card mb-3">
            <div class="card-header">
              <i class="fas fa-table"></i>
              Opciones
            </div>
            <div class="card-body">
              <!-- ******* INICIO HERRAMIENTAS ********* -->
              <div class="" style="background:yellow">

                <!-- ******* INICIO DE MOSTRAR ********* -->
                <div class="row col-lg-7 col-sm-12 mb-2">
                  <label for="mostrar" class="col-lg-2 col-sm-6 col-form-label text-lg-left text-sm-right" style="font-size:14px">
                    Mostrar
                  </label>
                  <div class="col-lg-10 col-sm-6">
                    <select class="form-control" id="numeroItems" onchange="cambiarNumeroItems(this.value);" style="width:70px">
                      <option value="3">3</option>
                      <option value="10">10</option>
                      <option value="25">25</option>
                      <option value="50">50</option>
                    </select>
                  </div>
                </div>
                <!-- ******* FIN DE MOSTRAR ********* -->

                <!-- ******* INICIO BUSCADOR ********* -->
                <div class="row col-lg-5 col-sm-12 mb-2" style="">
                  <label for="buscar" class="col-lg-3 col-sm-3 col-form-label text-sm-right" style="font-size:14px">
                    Buscar
                  </label>
                  <div class="col-lg-9 col-sm-9" style="">
                    <input type="text" id="buscar" name="buscar" class="form-control" onkeyup="BuscarRegistro(this)">
                  </div>
                </div>
                <!-- ******* FIN DEL BUSCADOR ******* -->
              </div>
              <!-- ******* FIN DE HERRAMIENTAS ********* -->
              <div class="table-responsive small">
                <table class="table" id="tabla" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Etiqueta</th>
                      <th style="width:150px;">Creado</th>
                      <th style="width:150px;">Modificado</th>
                      <th style="width:20px;">Editar</th>
                      <th style="width:30px;">Estado</th>
                    </tr>
                  </thead>
                  <tbody id="datos"> </tbody>
                </table>
                <div class="form-group" style="background:yellow;width:100%">
                  <div>
                    <label>Mostrando <span id="cant_ini">0</span> - <span id="cant_fin">0</span> de <span id="totalRegistros">0</span> registros </label>
                  </div>
                  <nav class="col-md-12 text-center" aria-label="Page navigation example">
                    <ul class="pagination justify-content-end" id="paginador"></ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>  <!--fin del card-->
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

@section('script')
  <script type="text/javascript">
    var ruta_global = '{{ url("") }}';
    var ruta_local='/admin/sexo/';
  </script>
@endsection
