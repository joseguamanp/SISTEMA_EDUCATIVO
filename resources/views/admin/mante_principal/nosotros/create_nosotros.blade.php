@extends('layouts.principal')
@section('content')

  <div class="main-panel">
    <!-- Nav tabs -->
    <div class="row mt-2">
      <div class="col text-center">
        <h5>Nosotros</h5>
      </div>
    </div>

    <ul class="nav nav-tabs vertical-align-middle scroll mt-2" role="tablist">
      <li class="nav-item tab-col-mo-6">
        <a class="nav-link active" href="#p-view-1" role="tab" data-toggle="tab" aria-selected="true">Nuevo</a>
      </li>
      <li class="nav-item tab-col-mo-6">
        <a class="nav-link" href="#p-view-2" role="tab" data-toggle="tab" aria-selected="false">Agregados</a>
      </li>
    </ul>
    <div class="tab-content">

      <div class="tab-pane fade show active row mt-4 pl-3 pr-3" id="p-view-1" role="tabpanel">

        <div class="sec-registro">
          <div class="row">
            <div class="col">
              <h5>Crea un nuevo registro</h5>
              <p>Aquí puedes registrar la información que se presentará en el apartado de "Nosotros"</p>
              <p>Si quieres ingresar un himno puedes usar nuestra <a href="#" id="btn-himno">sección de himno</a></p>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-lg-6">
              <label for="titulo" class="col-form-label">Titulo</label>
              <input class="form-control" name="titulo" id="titulo" placeholder="Título">
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-lg-12">
              <label for="descripcion">Descripción</label>
              <textarea class="form-control" name="descripcion" id="descripcion" rows="8" cols="80" placeholder="Descripción"></textarea>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col text-right">
              <button class="btn btn-primary" onclick="insertarRegistro()">Guardar</button>
            </div>
          </div>
        </div>
        <!-- INICIO DE HIMNO -->
        <div class="row sec-himno">
          <div class="col-lg-12">
            <div class="row">
              <div class="col">
                <h5>Añade el himno de tu institución</h5>
                <a href="#" id="btn-atras">Volver atras</a>
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-lg-6">
                <label for="" class="col-form-label">Titulo</label>
                <input class="form-control" placeholder="Título">
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-lg-3">
                <label for="" class="col-form-label">Elige el número de estrofas</label>
                <input class="form-control" value="2" style="width:50px">
              </div>
            </div>
            <div class="row mt-4">
              <div class="col-lg-12">
                <div class="row btn-tool">
                  <div class="col-lg-2">
                    <label for="" class="col-form-label">Estrofa 1</label>
                  </div>
                  <div class="col text-right">
                    <button type="button" class="btn-left"><i class="fas fa-align-left"></i></button>
                    <button type="button" class="btn-center"><i class="fas fa-align-center"></i></button>
                    <button type="button" class="btn-right"><i class="fas fa-align-right"></i></button>
                    <button type="button" class="btn-justify"><i class="fas fa-align-justify"></i></button>
                  </div>
                </div>
                <textarea class="form-control" name="name" rows="8" cols="80" placeholder="Descripción"></textarea>
              </div>
              <div class="col-lg-12">
                <label for="" class="col-form-label">Estrofa 2</label>
                <textarea class="form-control" name="name" rows="8" cols="80" placeholder="Descripción"></textarea>
              </div>
            </div>
            <div class="row mt-3">
              <div class="col text-right">
                <button class="btn btn-primary">Guardar</button>
              </div>
            </div>
          </div>
        </div>
        <!-- FIN DE HIMNO -->
      </div>

      <div class="tab-pane fade mt-4" id="p-view-2" role="tabpanel">
        <div class="accordion" id="accordion"></div>
      </div>

    </div>
  </div>

@endsection

@section('script')
  <script type="text/javascript">

    $(document).ready(function(){
      mostrarRegistro();
    });

  $('.sec-himno').hide();

  $('#btn-himno').click(function(){
    $('.sec-registro').hide();
    $('.sec-himno').show();
  });

  $('#btn-atras').click(function(){
    $('.sec-himno').hide();
    $('.sec-registro').show();
  });

  $('.btn-left').click(function(){
    var elemento;
    elemento = $(this).parents('.btn-tool').siblings('textarea');
    elemento.removeClass('p-center');
    elemento.removeClass('p-right');
    elemento.removeClass('p-justify');
    elemento.addClass('p-left');
  });
  $('.btn-center').click(function(){
    var elemento;
    elemento = $(this).parents('.btn-tool').siblings('textarea');
    elemento.removeClass('p-left');
    elemento.removeClass('p-right');
    elemento.removeClass('p-justify');
    elemento.addClass('p-center');
  });
  $('.btn-right').click(function(){
    var elemento;
    elemento = $(this).parents('.btn-tool').siblings('textarea');
    elemento.removeClass('p-left');
    elemento.removeClass('p-center');
    elemento.removeClass('p-justify');
    elemento.addClass('p-right');
  });
  $('.btn-justify').click(function(){
    var elemento;
    elemento = $(this).parents('.btn-tool').siblings('textarea');
    elemento.removeClass('p-left');
    elemento.removeClass('p-center');
    elemento.removeClass('p-right');
    elemento.addClass('p-justify');
  });

  var ruta_global = '{{ url("") }}';
  var ruta_local='/admin/prin/nosotros/';
  var token ='{{ csrf_token() }}';

  function insertarRegistro(){
    var titulo = $('#titulo').val();
    var descripcion = $('#descripcion').val();
    var cadena = {"titulo": titulo, "descripcion": descripcion};
    $.ajax({
      headers:{'X-CSRF-TOKEN':token},
      url:ruta_global+ruta_local,
      type:"POST",
      dataType:'json',
      data:cadena,
    }).done(function(resultado){
      mostrarRegistro();
      swal("Guardado!", "Se ha registrado dato!", "success");
    });
  }

  function mostrarRegistro(){
    $.ajax({
      headers:{'X-CSRF-TOKEN':token},
      url:ruta_global+ruta_local+"show",
      type:"post",
      dataType:"json"
    }).done(function(resultado){
      crearAcordion(resultado);
    }).fail(function(resultado){
      alert("error al mostrar los registros");
    });
  }

  function actualizarRegistro(elemento){
    var id = $(elemento).val();
    var titulo=$("#title"+id).val();
    var descripcion=$("#descripcion"+id).val();
    var ruta=ruta_global+ruta_local+id;
    $.ajax({
      headers:{'X-CSRF-TOKEN':token},
      url:ruta,
      type:"PUT",
      dataType:'json',
      data:{'id':id, 'titulo': titulo, 'descripcion': descripcion},
    }).done(function(){
      titulo=$("#title"+id).val().toUpperCase();
      $("#title"+id).val("");
      $("#title"+id).val(titulo);
      $("#btn"+id).html("");
      $("#btn"+id).html(titulo);
      swal("Editado!", "Se ha actualizado el dato!", "success");
    });
  }

  function eliminarRegistro(elemento) {
    var id = $(elemento).val();
    var ruta=ruta_global+ruta_local+id;
    $.ajax({
      headers:{'X-CSRF-TOKEN':token},
      url:ruta,
      type:"DELETE",
      dataType:'json',
    }).done(function(resultado){
      modificarAgregado(resultado,id);
      swal("Se ha eliminado el dato!","", "error");
    });
  }

  function restaurarRegistro(elemento) {
    var id = $(elemento).val();
    var ruta=ruta_global+ruta_local+id+"/restaurar";
    var token=$('#token').val();
    $.ajax({
      headers:{'X-CSRF-TOKEN':token},
      url:ruta,
      type:"GET",
      dataType:'json',
    }).done(function(resultado){
      modificarAgregado(resultado, id);
      swal("Se ha restaurado el dato!","", "info");
    });
  }

  function crearAcordion(data){
    var div="";
    $('#accordion').empty();
    $(data).each(function(key,value){
      if (value.deleted_at==null) {
        var clase = 'collapsed';
        var btn_res = "<button class='btn btn-primary mt-2 btn-sm' value='"+value.id+"' id='btn-res"+value.id+"' onclick='restaurarRegistro(this)' hidden>Restaurar</button>";
      }else{
        var clase = 'disabled';
        var btn_res = "<button class='btn btn-primary mt-2 btn-sm' value='"+value.id+"' id='btn-res"+value.id+"' onclick='restaurarRegistro(this)'>Restaurar</button>";
      }
      div +=  "<div class='card' style='border:none'>"+
                "<div class='card-header' id='heading"+value.id+"'>"+
                  "<div class='row'>"+
                    "<h2 class='mb-0 '>"+
                      "<button class='btn btn-link "+clase+"' type='button' id='btn"+value.id+"' data-toggle='collapse' data-target='#collapse"+value.id+"' aria-expanded='true' aria-controls='collapse"+value.id+"'>"+
                        "<span class='small'>"+value.titulo+"</span>"+
                      "</button>"+
                    "</h2>"+
                    "<div class='col text-right'>"+btn_res+"</div>"+
                  "</div>"+
                "</div>"+
                "<div id='collapse"+value.id+"' class='collapse' aria-labelledby='heading"+value.id+"' data-parent='#accordion'>"+
                  "<div class='card-body' style='border:none'>"+
                    "<input class='form-control mb-2' id='title"+value.id+"' value='"+value.titulo+"'></input>"+
                    "<textarea class='form-control' id='descripcion"+value.id+"' rows='8' cols='80' placeholder='Descripción'>"+value.descripcion+"</textarea>"+
                  "</div>"+
                  "<div class='row mt-3'>"+
                    "<div class='col text-right'>"+
                      "<button class='btn btn-danger mr-2' value='"+value.id+"' onclick='eliminarRegistro(this)'>Eliminar</button>"+
                      "<button class='btn btn-primary' value='"+value.id+"' onclick='actualizarRegistro(this)'>Guardar</button>"+
                    "</div>"+
                  "</div>"+
                  "<hr>"+
                "</div>"+
              "</div>";
    });
    $('#accordion').html(div);
  }

  function modificarAgregado(data, id){

    if (data.deleted_at == null) {
      $('#btn'+id).removeClass('disabled');
      $('#btn'+id).addClass('collapsed');
      $('#btn-res'+id).attr('hidden','yes');
    }else{
      $('#btn'+id).removeClass('collapsed');
      $('#btn'+id).addClass('disabled');
      $('#collapse'+id).collapse('hide');
      $('#btn-res'+id).removeAttr('hidden');
    }

  }

  </script>
@endsection
