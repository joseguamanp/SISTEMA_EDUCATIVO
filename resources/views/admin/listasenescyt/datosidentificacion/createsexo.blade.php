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
                  <button class="btn btn-primary btn-block"  onclick="verificarInput('etiqueta','/admin/sexo');">
                    <i class="fa fa-check" aria-hidden="true"></i>
                    Guardar</button>
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
                <div class="row col-lg-12 justify-content-center mb-2">

                  <!-- ******* INICIO DE MOSTRAR ********* -->
                  <div class="row col-lg-7 col-sm-12 mb-2">
                    <label for="mostrar" class="col-lg-2 col-sm-6 col-form-label text-lg-left text-sm-right" style="font-size:14px">
                      Mostrar
                    </label>
                    <div class="col-lg-10 col-sm-6">
                      <input type="number" id="mostrar" name="mostrar" min="1" max="25" class="form-control" value="10" style="width:80px">
                    </div>
                  </div>
                  <!-- ******* FIN DE MOSTRAR ********* -->

                  <!-- ******* INICIO BUSCADOR ********* -->
                  <div class="row col-lg-5 col-sm-12 mb-2" style="">
                    <label for="buscar" class="col-lg-3 col-sm-3 col-form-label text-sm-right" style="font-size:14px">
                      Buscar
                    </label>
                    <div class="col-lg-9 col-sm-9" style="">
                      <input type="text" id="buscar" name="buscar" class="form-control" onkeyup="ajaxBuscar(this)">
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
                    <tbody id="datos">
                    </tbody>
                  </table>
                  {{$datos->render()}}
                </div>
              </div>
            </div>  <!--fin del card-->
          </div>
        </div>
      </div>
    </div>
    <div class="modal" id="editar">
      <div class="modal-dialog modal-sm">
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
            <button class="btn btn-primary btn-block"  onclick="update('etiqueta1');">Editar</button>
            <button  type="button" class="btn btn-danger" data-dismiss="modal" OnClick='limpiar();'>Cancelar</button>
          </div>

        </div>
      </div>
    </div>
  @endsection

  @section('script')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">

    var ruta_local='/admin/sexo/';
    var ruta_global = '{{ url('') }}';

    $(document).ready(function(){
      mostrar();
    });

    function mostrar() {
      var ruta=ruta_global+ruta_local+"show";
      $.get(ruta,function(res){
        construirTabla(res);
      });
    }

    function update(title){
      var etiqueta=$("#"+title).val();
      var id=$("#id").val();
      var rutas=ruta_global+ruta_local+id;
      var token=$("#token").val();
      cadenas="id="+id+
      "&etiqueta="+etiqueta;
      var datos="";
      $.ajax({
        url:rutas,
        headers:{'X-CSRF-TOKEN':token},
        type:"PUT",
        dataType:'json',
        data:cadenas,
        success:function(){
          mostrar();
          swal("Editando!", "Se ha actualizado el dato!", "success");
        }
      });
    }

    function limpiar() {
      $("#etiqueta1").val("");
    }

    function editar(btn){
      var rutas=ruta_global+ruta_local+btn.value+"/edit";
      $.get(rutas,function(res){
        $("#id").val(res.id);
        $("#etiqueta1").val(res.etiqueta);
      });
    }

    function eliminar(btn) {
      var route=ruta_global+ruta_local+btn.value+"";
      var token=$('#token').val();
      $.ajax({
        url:route,
        headers:{'X-CSRF-TOKEN':token},
        type:"DELETE",
        dataType:'json',
        success:function(){
          mostrar();
          swal("Se ha eliminado el dato!","", "error");
        }
      });
    }
    function restaurar(btn) {
      var route=ruta_global+ruta_local+btn.value+"/restaurar";
      var token=$('#token').val();
      $.ajax({
        url:route,
        headers:{'X-CSRF-TOKEN':token},
        type:"GET",
        dataType:'json',
        success:function(){
          mostrar();
          swal("Se ha restaurado el dato!","", "info");
        }
      });
    }
    function verificarInput(id_input, ruta){
      var data = $('#'+id_input).val();
      var size = data.length;
      if(size != 0 ) ajaxInsert(data, ruta);
    }

    function ajaxInsert(data,ruta){
      var token=$('#token').val();
      var cadena="etiqueta="+data;
      datos="";
      $.ajax({
        url:ruta_global+ruta,
        headers:{'X-CSRF-TOKEN':token},
        type:"POST",
        dataType:'json',
        data:cadena,
        success:function(data){
          mostrar();
          swal("Guardando!", "Se ha registrado dato!", "success");
        }
      });
    }
    function ajaxBuscar(elemento){
      var data = elemento.value;
      var token=$('#token').val();
      $.ajax({
        headers:{'X-CSRF-TOKEN':token},
        url: ruta_global+ruta_local+'search',
        type: 'post',
        data: { 'data' : data },
        dataType: 'json',
      }).done(function (resultado){
        construirTabla(resultado);
      }).fail(function (resultado){
        alert('error al buscar');
      });
    }

    function construirTabla(data){
      var datos="";
      var clase="";
      var clase1="";
      var nombre="";

      $(data).each(function(key,value){
        if (value.deleted_at==null) {
          var clase="btn-danger btn-sm";
          var clase1="btn-default";
          var nombre="eliminar";
          var click="eliminar(this);";
          var desabilitar="";
        }else{
          var clase="btn-info btn-sm";
          var nombre="restaurar";
          var click="restaurar(this);";
          var desabilitar="disabled='yes'";
        }
        datos+="<tr>";
        datos+="<td>"+value.etiqueta+"</td>";
        datos+="<td>"+value.fecha_cre+"</td>";
        datos+="<td>"+value.fecha_mod+"</td>";
        datos+="</td><td><button id='btneditar' value="+value.id+" "+desabilitar+" OnClick='editar(this);' class='btn btn-success btn-sm' data-toggle='modal' data-target='#editar'>Editar</button>";
        datos+="</td><td><button value="+value.id+" OnClick='"+click+"' class='btn "+clase+"'><i class='fa fa-window-close' aria-hidden='true'></i></button></td></tr>";
        datos+="</tr>";
        $("#datos").html(datos);
      });
    }
    </script>
  @endsection
