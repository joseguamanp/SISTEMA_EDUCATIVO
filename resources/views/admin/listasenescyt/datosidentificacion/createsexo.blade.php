@extends('layouts.principal')
@section('content')
  <div id="content-wrapper">
    <div class="container-fluid small">

       <!-- ********** INICIO AREA INSERT *******-->
      <div class="">
        <div class="mb-4">
          <h4>Mantenimiento</h4>
        </div>
        <div class="row">
          <div class="ml-3">
            <label class="col-form-label" for="etiqueta">Etiqueta</label>
          </div>
          <div class="col-lg-8 justify-content-center" >
            {!! Form::text('etiqueta',null,['class'=>'form-control mb-2', 'id' => 'etiqueta', 'required' => 'required'])!!}
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            @include('mensaje.mensajeerror')
          </div>
          <div class="col-lg-2">
            <button class="btn btn-primary btn-block" onclick="verificarInput('etiqueta');" style="width:100%">Guardar</button>
          </div>
        </div>
      </div>
      <!-- ********** FIN AREA INSERT *******-->

      <!-- ******* INICIO AREA MOSTRAR Y BUSCAR ********* -->
      <div class="mt-5">
        <div class="mb-4">
          <label class="col-form-control" style="font-size:32px;margin-top:10px;">Registros</label>
          <button class="ml-3 mb-2 btn btn-default btn-sm" onclick="ordenarRegistros(this)">A-Z</button>
        </div>
        <div class="row">
          <!-- INICIO MOSTRAR -->
          <div class="col-lg-8 col-sm-12">
            <div class="row col-lg-12 mb-3">
              <div class="">
                <label for="numeroItems" class="col-form-label text-right mr-1">Mostrar</label>
              </div>
              <div class="ml-2 mr-2">
                <select class="form-control" id="numeroItems" onchange="cambiarNumeroItems(this.value);">
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                </select>
              </div>
              <div class="">
                <label for="numeroItems" class="col-form-label" >registros</label>
              </div>
            </div>
          </div><!-- FIN MOSTRAR -->

          <!-- INICIO BUSCAR -->
          <div class="col-lg-4 col-sm-12 mb-3">
            <div class="row">
              <div class="ml-3 mr-1">
                <label for="buscar" class="col-form-label text-lg-right" >Buscar</label>
              </div>
              <div class="col">
                <input type="text" id="buscar" name="buscar" class="form-control" onkeyup="BuscarRegistro(this)">
              </div>
            </div>
          </div>
        </div><!-- FIN BUSCAR -->
      </div>
      <!-- ******* FIN AREA MOSTRAR Y BUSCAR ********* -->

      <!-- *********** INICIO AREA TABLA ********* -->
        <div class="table-responsive">
          <table class="table" id="tabla" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th style="width:300px;">Etiqueta</th>
                <th style="width:160px;">Creado</th>
                <th style="width:160px;">Modificado</th>
                <th style="width:20px;">Editar</th>
                <th style="width:20px;">Estado</th>
              </tr>
            </thead>
            <tbody id="datos"> </tbody>
          </table>
        </div>
      <!-- ********** FIN AREA TABLA *************-->

      <!-- **** INICIO AREA CONTADOR Y PAGINADOR ****-->
      <div class="row">
        <div class="col-lg-5 mb-3">
          <label class="col-form-label" >
            Mostrando <span id="cant_ini">0</span> - <span id="cant_fin">0</span> de <span id="totalRegistros">0</span> registros
          </label>
        </div>
        <div class="col-lg-7 ">
          <nav>
            <ul class="pagination justify-content-end" id="paginador"></ul>
          </nav>
        </div>
      </div>
      <!-- **** FIN AREA CONTADOR Y PAGINADOR ****-->

    </div>
  </div>


  <!-- **** INICIO DE MODAL ****-->
  <div class="modal fade" id="editar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Editar Etiqueta</h4>
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
  <!-- **** FIN DE MODAL ****-->

@endsection

@section('script')
  <script type="text/javascript">
  var ruta_global = '{{ url("") }}';
  var ruta_local='/admin/sexo/';
  </script>
@endsection
