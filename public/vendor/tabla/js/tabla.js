
var paginador;
var totalPaginas=0;
var numerosPorPagina = 3;
var cantIni;
var cantFin;
var filtro = "";
var ordenar = false;

function ordenarRegistros(elemento){
  if(ordenar == false){
    ordenar = !ordenar;
    $(elemento).removeClass("btn-default");
    $(elemento).addClass("btn-primary");
    obtenerTotalRegistros();
  }else{
    ordenar = !ordenar;
    $(elemento).removeClass("btn-primary");
    $(elemento).addClass("btn-default");
    obtenerTotalRegistros();
  }
}

$(document).ready(function(){
  obtenerTotalRegistros();
});

function obtenerTotalRegistros(){
  var token=$('#token').val();
  $.ajax({
    headers:{'X-CSRF-TOKEN':token},
    data:{'search':filtro},
    type:"post",
    dataType:"json",
    url:ruta_global+ruta_local+"count"
  }).done(function(resultado){
    crearPaginador(resultado);
  }).fail(function(resultado){
    alert("Error al obtener el total de registros");
  });
}

function crearPaginador(totalItems){

  if($('#paginador').empty()){
    $('#totalRegistros').text(totalItems);
    var pag = 0;
    var itemsPorPagina = $('#numeroItems').val();
    paginador = $(".pagination");
    totalPaginas = Math.ceil(totalItems/itemsPorPagina);

    $('<li class="page-item"><a href="#" class="page-link first-link">Primera</a></li>').appendTo(paginador);
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

    paginador.find(".prev-link").parents("li").addClass("disabled");
    paginador.find(".first-link").parents("li").addClass("disabled");

    if(totalPaginas <= 1){
      paginador.find(".next-link").parents("li").addClass("disabled");
      paginador.find(".last-link").parents("li").addClass("disabled");
    }

    paginador.find(".num-link:first").addClass("active");
    paginador.find(".num-link:first").parents("li").addClass("active");

    paginador.find("li .first-link").click(function(){
      var irpagina=0;
      cargarPagina(irpagina);
      return false;
    });

    paginador.find("li .prev-link").click(function(){
      var irpagina =parseInt(paginador.data("pag"))-1;
      cargarPagina(irpagina);
      return false;
    });

    paginador.find("li .num-link").click(function(){
      var irpagina =$(this).html().valueOf()-1;
      cargarPagina(irpagina);
      return false;
    });

    paginador.find("li .next-link").click(function(){
      var irpagina = parseInt(paginador.data("pag"))+1;
      cargarPagina(irpagina);
      return false;
    });

    paginador.find("li .last-link").click(function(){
      var irpagina =totalPaginas-1;
      cargarPagina(irpagina);
      return false;
    });
    cargarPagina(0);
  }
}

function cargarPagina(pagina){
  mostrarRegistros(pagina);

  if(pagina >= 1){
    $('#paginador').find(".first-link").parents("li").removeClass("disabled");
    $('#paginador').find(".prev-link").parents("li").removeClass("disabled");
  }else{
    $('#paginador').find("li .first-link").parents("li").addClass("disabled");
    $('#paginador').find(".prev-link").parents("li").addClass("disabled");
  }

  if(pagina == (totalPaginas-1)){
    $('#paginador').find(".next-link").parents("li").addClass("disabled");
    $('#paginador').find(".last-link").parents("li").addClass("disabled");
  }else{
    $('#paginador').find(".next-link").parents("li").removeClass("disabled");
    $('#paginador').find(".last-link").parents("li").removeClass("disabled");
  }

  $('#paginador').data("pag",pagina);
  if(numerosPorPagina>1){
    $(".num-link").hide();
    if(pagina < (totalPaginas-numerosPorPagina)){
      $(".num-link").slice(pagina,numerosPorPagina + pagina).show();
    }else{
      if(totalPaginas > numerosPorPagina){
        $(".num-link").slice(totalPaginas-numerosPorPagina).show();
      }else{
        $(".num-link").slice(0).show();
      }
    }
  }
  $('#paginador').children().removeClass("active");
  $('#paginador').children().eq(pagina+2).addClass("active");

  var rango = parseInt($('#numeroItems').val());
  inicio = ((pagina+1) * rango) - (rango-1);

  $("#cant_ini").text(inicio);

  if(rango >= parseInt($('#totalRegistros').text())){
    $('#cant_fin').text($('#totalRegistros').text());
  }else{
    if( (pagina+1) == totalPaginas ){
      $('#cant_fin').text($('#totalRegistros').text());
    }else{
      $('#cant_fin').text((pagina+1)*rango);
    }
  }
}

function mostrarRegistros(pagina){
  var itemsPorPagina = $('#numeroItems').val();
  var desde = pagina * itemsPorPagina;
  var token=$('#token').val();
  $.ajax({
    headers:{'X-CSRF-TOKEN':token},
    data:{"search":filtro,"limit":itemsPorPagina, "offset":desde, "order": ordenar},
    type:"post",
    dataType:"json",
    url:ruta_global+ruta_local+"show"
  }).done(function(resultado){
    construirTabla(resultado);
  }).fail(function(resultado){
    alert("error al mostrar los registros");
  });
}

function cambiarNumeroItems(data){
  obtenerTotalRegistros();
}

function BuscarRegistro(elemento){
  filtro = elemento.value;
  obtenerTotalRegistros();
}

function verificarInput(id_input){
  var data = $('#'+id_input).val();
  var size = data.length;
  if(size != 0 ) insertarRegistro(data);
}

function insertarRegistro(data){
  var token=$('#token').val();
  $.ajax({
    headers:{'X-CSRF-TOKEN':token},
    url:ruta_global+ruta_local,
    type:"POST",
    dataType:'json',
    data:{'etiqueta': data}
  }).done(function(data){
    obtenerTotalRegistros();
    swal("Guardado!", "Se ha registrado dato!", "success");
  });
}

function editarRegistro(elemento){
  var rutas=ruta_global+ruta_local+elemento.value+"/edit";
  $.get(rutas,function(res){
    $("#id").val(res.id);
    $("#etiqueta1").val(res.etiqueta);
  });
}

function actualizarRegistro(title){
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
    obtenerTotalRegistros();
    swal("Editado!", "Se ha actualizado el dato!", "success");
  });
}

function limpiarInputModal() {
  $("#etiqueta1").val("");
}

function eliminarRegistro(elemento) {
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

function restaurarRegistro(elemento) {
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

function construirTabla(data){
  var datos="";
  $("#datos").empty();
  $(data).each(function(key,value){
    if (value.deleted_at==null) {
      var clase="btn-danger btn-sm";
      var funcion="eliminarRegistro(this);";
      var deshabilitar="";
    }else{
      var clase="btn-info btn-sm";
      var funcion="restaurarRegistro(this);";
      var deshabilitar="disabled='yes'";
    }
    datos+="<tr>";
    datos+="<td>"+value.etiqueta+"</td>";
    datos+="<td>"+value.fecha_cre+"</td>";
    datos+="<td>"+value.fecha_mod+"</td>";
    datos+="</td><td><button id='btneditar' value="+value.id+" "+deshabilitar+" OnClick='editarRegistro(this);' class='btn btn-success btn-sm' data-toggle='modal' data-target='#editar'>Editar</button>";
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
        var btn = "<button class='btn btn-success btn-sm' value="+data.id+" onclick='editarRegistro(this);' data-toggle='modal' data-target='#editar'>Editar</button>";
      }else{
        var btn = "<button class='btn btn-success btn-sm' value="+data.id+" disabled='yes' onclick='editarRegistro(this);' data-toggle='modal' data-target='#editar'>Editar</button>";
      }
      $(this).html(btn);
      break;
      case 4:
      if (data.deleted_at == null ) {
        var btn = "<button class='btn btn-danger btn-sm' value="+data.id+" onclick='eliminarRegistro(this)'><i class='fa fa-window-close' aria-hidden='true'></i></button>";
      }else{
        var btn = "<button class='btn btn-info btn-sm' value="+data.id+" onclick='restaurarRegistro(this)'><i class='fa fa-window-close' aria-hidden='true'></i></button>";
      }
      $(this).html(btn);
      break;
    }
    cont++;
  });
}
