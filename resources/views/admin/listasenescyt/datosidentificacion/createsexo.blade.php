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
                    <select class="form-control" name="mostrar" id="mostrar" style="width:70px">
                      <option value="10">10</option>
                      <option value="15">15</option>
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
                  <tbody id="datos"> </tbody>
                </table>
                <div lass="form-group" style="background:yellow;width:100%">
                  <div c>
                    <label class="col-form-label">Mostrando 10 de 15 registros</label>
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
          <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="update('etiqueta1');">Editar</button>
          <button type="button" class="btn btn-secundary" data-dismiss="modal" OnClick='limpiar();'>Cancelar</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')

  <script type="text/javascript">

  var ruta_local='/admin/sexo/';
  var ruta_global = '{{ url('') }}';
  var paginador;
  var totalPaginas;
  var numerosPorPagina = 3;

  function creaPaginador(totalItems){
    var pag = 0;
    var itemsPorPagina = $('#mostrar').val();
    paginador = $(".pagination");
    totalPaginas = Math.ceil(totalItems/itemsPorPagina);

    $('<li><a href="#" class="page-link first-link">Primera</a></li>').appendTo(paginador);
    $('<li class="page-item"><a href="#" class="page-link prev-link"><</a></li>').appendTo(paginador);
    while(totalPaginas > pag){
      $('<li class="page-item"><a href="#" class="page-link num-link" data-id='+pag+'>'+(pag+1)+'</a></li>').appendTo(paginador);
      pag++;
    }
    if(numerosPorPagina > 1){
      $(".num-link").hide();
      $(".num-link").slice(0,numerosPorPagina).show();
    }
    $('<li class="page-item"><a href="#" class="page-link next-link">></a></li>').appendTo(paginador);
    $('<li class="page-item"><a href="#" class="page-link last-link">Última</a></li>').appendTo(paginador);

    paginador.find(".num-link:first").addClass("active");
		paginador.find(".num-link:first").parents("li").addClass("active");
    paginador.find(".prev-link").hide();

    paginador.find("li .first-link").click(function(){
			var irpagina=0;
			cargaPagina(irpagina);
			return false;
		});

    paginador.find("li .prev-link").click(function(){
			var irpagina =parseInt(paginador.data("pag"))-1;
			cargaPagina(irpagina);
			return false;
		});

    paginador.find("li .num-link").click(function(){
      var irpagina =$(this).html().valueOf()-1;
      cargaPagina(irpagina);
      return false;
		});

    paginador.find("li .next-link").click(function(){
      var irpagina = parseInt(paginador.data("pag"))+1;
      cargaPagina(irpagina);
      return false;
    });

    paginador.find("li .last-link").click(function(){
			var irpagina =totalPaginas-1;
			cargaPagina(irpagina);
			return false;
		});

    cargaPagina(0);
  }

  function cargaPagina(pagina){
    var itemsPorPagina = $('#mostrar').val();
    var desde = pagina * itemsPorPagina;
    var token=$('#token').val();
    $.ajax({
      headers:{'X-CSRF-TOKEN':token},
      data:{"param1":"dame", "limit":itemsPorPagina, "offset":desde},
      type:"post",
      dataType:"json",
      url:ruta_global+ruta_local+"prueba"
    }).done(function(resultado){
      construirTabla(resultado);
    }).fail(function(resultado){
      alert("error en cargaPagina");
    });

    if(pagina >= 1) paginador.find(".prev-link").show();
		else paginador.find(".prev-link").hide();

    if(pagina <(totalPaginas- numerosPorPagina)) paginador.find(".next-link").show();
		else paginador.find(".next-link").hide();

    paginador.data("pag",pagina);
    if(numerosPorPagina>1){
				$(".num-link").hide();
				if(pagina < (totalPaginas- numerosPorPagina)){
					$(".num-link").slice(pagina,numerosPorPagina + pagina).show();
				}else if(totalPaginas > numerosPorPagina){
					$(".num-link").slice(totalPaginas- numerosPorPagina).show();
				}else{
          $(".num-link").slice(0).show();
        }
		}
    paginador.children().removeClass("active");
		paginador.children().eq(pagina+2).addClass("active");
  }

  function prueba(){
    var total;
    var token=$('#token').val();
    $.ajax({
      headers:{'X-CSRF-TOKEN':token},
      data:{"param1":"cuantos"},
      type:"post",
      dataType:"json",
      url:ruta_global+ruta_local+"prueba"
    }).done(function(resultado){
      total = resultado.length;
      creaPaginador(total);
    }).fail(function(resultado){
      alert("error en la prueba");
    });
  }

  $(document).ready(function(){
    prueba();
  });

  function mostrar() {
    var ruta=ruta_global+ruta_local+"show";
    $.get(ruta,function(res){
      construirTabla(res);
    });
  }

  function verificarInput(id_input){
    var data = $('#'+id_input).val();
    var size = data.length;
    if(size != 0 ) ajaxInsert(data);
  }

  function ajaxInsert(data){
    var token=$('#token').val();
    $.ajax({
      headers:{'X-CSRF-TOKEN':token},
      url:ruta_global+ruta_local,
      type:"POST",
      dataType:'json',
      data:{'etiqueta': data}
    }).done(function(data){
      mostrar();
      swal("Guardado!", "Se ha registrado dato!", "success");
    });
  }

  function editar(elemento){
    var rutas=ruta_global+ruta_local+elemento.value+"/edit";
    $.get(rutas,function(res){
      $("#id").val(res.id);
      $("#etiqueta1").val(res.etiqueta);
    });
  }

  function update(title){
    var etiqueta=$("#"+title).val();
    var id=$("#id").val();
    var ruta=ruta_global+ruta_local+id;
    var token=$("#token").val();
    $.ajax({
      headers:{'X-CSRF-TOKEN':token},
      url:ruta,
      type:"PUT",
      dataType:'json',
      data:{'id':id, 'etiqueta': etiqueta},
    }).done(function(){
      mostrar();
      swal("Editado!", "Se ha actualizado el dato!", "success");
    });
  }

  function limpiar() {
    $("#etiqueta1").val("");
  }

  function eliminar(elemento) {
    var ruta=ruta_global+ruta_local+elemento.value+"";
    var token=$('#token').val();
    $.ajax({
      headers:{'X-CSRF-TOKEN':token},
      url:ruta,
      type:"DELETE",
      dataType:'json',
    }).done(function(resultado){
      actualizarFila(elemento, resultado);
      swal("Se ha eliminado el dato!","", "error");
    });
  }

  function restaurar(elemento) {
    var ruta=ruta_global+ruta_local+elemento.value+"/restaurar";
    var token=$('#token').val();
    $.ajax({
      headers:{'X-CSRF-TOKEN':token},
      url:ruta,
      type:"GET",
      dataType:'json',
    }).done(function(resultado){
      actualizarFila(elemento, resultado);
      swal("Se ha restaurado el dato!","", "info");
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
    $(data).each(function(key,value){
      if (value.deleted_at==null) {
        var clase="btn-danger btn-sm";
        var funcion="eliminar(this);";
        var deshabilitar="";
      }else{
        var clase="btn-info btn-sm";
        var funcion="restaurar(this);";
        var deshabilitar="disabled='yes'";
      }
      datos+="<tr>";
      datos+="<td>"+value.etiqueta+"</td>";
      datos+="<td>"+value.fecha_cre+"</td>";
      datos+="<td>"+value.fecha_mod+"</td>";
      datos+="</td><td><button id='btneditar' value="+value.id+" "+deshabilitar+" OnClick='editar(this);' class='btn btn-success btn-sm' data-toggle='modal' data-target='#editar'>Editar</button>";
      datos+="</td><td><button value="+value.id+" OnClick='"+funcion+"' class='btn "+clase+"'><i class='fa fa-window-close' aria-hidden='true'></i></button></td></tr>";
      datos+="</tr>";
      $("#datos").html(datos);
    });
  }

  function actualizarFila(elemento, data){
    var cont = 0;
    $(elemento).parents("tr").find("td").each(function(){
      switch(cont){
        case 0: $(this).html(data.etiqueta);break;
        case 1: $(this).html(data.fecha_cre);break;
        case 2: $(this).html(data.fecha_mod);break;
        case 3:
        if(data.deleted_at==null){
          var btn = "<button class='btn btn-success btn-sm' value="+data.id+" onclick='editar(this);' data-toggle='modal' data-target='#editar'>Editar</button>";
        }else{
          var btn = "<button class='btn btn-success btn-sm' value="+data.id+" disabled='yes' onclick='editar(this);' data-toggle='modal' data-target='#editar'>Editar</button>";
        }
        $(this).html(btn);
        break;
        case 4:
        if (data.deleted_at == null ) {
          var btn = "<button class='btn btn-danger btn-sm' value="+data.id+" onclick='eliminar(this)'><i class='fa fa-window-close' aria-hidden='true'></i></button>";
        }else{
          var btn = "<button class='btn btn-info btn-sm' value="+data.id+" onclick='restaurar(this)'><i class='fa fa-window-close' aria-hidden='true'></i></button>";
        }
        $(this).html(btn);
        break;
      }
      cont++;
    });
  }
  </script>
@endsection
