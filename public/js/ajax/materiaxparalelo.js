
function periodo(par) {
    var op = $('option:selected',par).attr('data');
    if (op != 0){
        llenar("#id_sede",op,"/admin/materiaparalelosede");
    }
}
function sede(par) {
    var op = $('option:selected',par).attr('data');
    if (op != 0){
        llenar("#id_carrera",op,"/admin/materiaparalelocarrera");
    }
}
function carrera(par) {
    var op = $('option:selected',par).attr('data');
    if (op != 0){
        llenar("#id_jornada",op,"/admin/materiaparalelojornada");
    }
}
function jornada(par) {
    var op = $('option:selected',par).attr('data');
    if (op != 0){
        llenar("#id_paralelo",op,"/admin/materiaparaleloparalelo");
    }
}
function malla(par) {
    var op = $('option:selected',par).attr('data');
    if (op != 0){
        llenar("#id_nivel",op,"/admin/materiaparalelomalla");
    }
}
function nivel(par) {
    var op = $('option:selected',par).attr('data');
    if (op != 0){
        llenar("#id_materia",op,"/admin/materiaparalelonivel");
    }
}
function llenar(idSelect, dato, url) {
    var periodo = $("#id_periodo").val();
    var sede = $("#id_sede").val();
     var carrera = $("#id_carrera").val();
     var malla = $("#id_malla").val();
     var nivel = $("#id_nivel").val();
     var jornada = $("#id_jornada").val();
     var paralelo = $("#id_paralelo").val();
    var token=$('#token').val();
    if (periodo != null || sede != null || carrera != null || malla != null || jornada != null || paralelo != null) {
        cadena="id_periodo="+periodo+
                "&id_sede="+sede+
                "&id_carrera="+carrera+
                "&id_jornada="+jornada+
                "&id_paralelo="+paralelo+
                "&id_malla="+malla+
                "&id_nivel="+nivel;
        mostrarfiltro(cadena);

    }
    if (idSelect=="#id_sede") {
        cadena="id_periodo="+dato;
    }
    if (idSelect=="#id_carrera") {
        cadena="id_periodo="+periodo+
                "&id_sede="+dato;
    }
    if (idSelect=="#id_jornada") {
        cadena="id_periodo="+periodo+
                "&id_sede="+sede+
                "&id_carrera="+dato;
    }
    if (idSelect=="#id_paralelo") {
        cadena="id_periodo="+periodo+
                "&id_sede="+sede+
                "&id_carrera="+carrera+
                "&id_jornada="+dato;
    }
    if (idSelect=="#id_nivel") {
        cadena="id_malla="+dato;
    }
    if (idSelect=="#id_materia") {
        cadena="id_malla="+malla+
               "&id_nivel="+dato;
    }
    $.ajax({
        url: ruta_global+url,
        headers:{'X-CSRF-TOKEN':token},
          type:"POST",
          dataType:'json',
        data:cadena,
        success: function (data) {
            $(idSelect).empty();
            $(idSelect).append("<option value='' data=''></option>");
            $.each(data, function (i,item){
                if (idSelect=="#id_sede") {
                $(idSelect).append("<option value='"+item.id+"' data='"+item.id+"'>"+item.nombre_sede+"</option>");
                }
                if (idSelect=="#id_carrera") {
                $(idSelect).append("<option value='"+item.id+"' data='"+item.id+"'>"+item.nombreCarrera+"</option>");
                }
                if (idSelect=="#id_jornada" || idSelect=="#id_nivel") {
                $(idSelect).append("<option value='"+item.id+"' data='"+item.id+"'>"+item.etiqueta+"</option>");
                }
                if (idSelect=="#id_paralelo") {
                $(idSelect).append("<option value='"+item.id+"' data='"+item.id+"'>"+item.nombre_paralelo+"</option>");
                }
                if (idSelect=="#id_materia") {
                $(idSelect).append("<option value='"+item.id+"' data='"+item.id+"'>"+item.nombre_materia+"</option>");
                }
            });
        }
    });
}

function mostrar() {
  var datos="";
  var ruta=ruta_global+"/admin/materiaparalelomostrar";
  $.get(ruta,function(res){
      $(res).each(function(key,value){
          datos+="<tr>";
          datos+="<td>"+value.nombre_malla+"</td>";
          datos+="<td>"+value.nombre_materia+"</td>";
          datos+="<td>"+value.nombre_paralelo+"</td>";
          datos+="</tr>";    
          $("#datos").html(datos);  
      });
            
  }); 
}
function mostrarfiltro(cadena) {
  var ruta="/admin/materiaparalelomostrarfiltrar";
  var token=$('#token').val();
  var datos="";
  $.ajax({
          url:ruta_global+ruta,
          headers:{'X-CSRF-TOKEN':token},
          type:"POST",
          dataType:'json', 
          data:cadena,
          success:function(data){
                 $(data).each(function(key,value){
                              datos+="<tr>";
                              datos+="<td>"+value.nombre_periodo+"</td>";
                              datos+="<td>"+value.nombre_malla+"</td>";
                              datos+="<td>"+value.nombre_paralelo+"</td>";
                              datos+="</tr>";  
                });
                  $("#datos").html(datos);
            }
        }); 
}

$(document).ready(function(){
    $("#desaparecer").hide();
});

$("#registrar_datos").click(function(){
    $("#desaparecer").show();
});
$("#consultar").click(function(){
    $("#desaparecer").hide();
});
$("#ingresar_materia_paralelo").click(function(){ 
  var link=ruta_global+"/admin/materiaparalelo";
          var id_periodo=$("#id_periodo").val();
          var id_carrera=$("#id_carrera").val();   
          var id_sede=$("#id_sede").val();
          var id_jornada=$("#id_jornada").val();
          var id_paralelo=$('#id_paralelo').val();
          var id_malla = $("#id_malla").val();
          var id_nivel = $("#id_nivel").val();
          var id_materia = $('#id_materia').val();
          var token=$('#token').val();
          cadena="id_periodo="+id_periodo+
              "&id_carrera="+id_carrera+
              "&id_sede="+id_sede+
              "&id_jornada="+id_jornada+
              "&id_paralelo="+id_paralelo+
              "&id_malla="+id_malla+
              "&id_nivel="+id_nivel+
              "&id_materia="+id_materia;
              datos="";
        $.ajax({
          url:link,
          headers:{'X-CSRF-TOKEN':token},
          type:"POST",
          dataType:'json', 
          data:cadena,
          success:function(data){
                 mensajes(data);
            }
        });
});

function mensajes(data) {
  var msj="";
  msj+="<div class='alert alert-primary alert-dismissable'>";
  msj+="<button type='button' class='close' data-dismiss='alert'>&times;</button>";
  msj+="<strong>Excelente!</strong>"+data;
  msj+="</div>";
  $("#mensaje").html(msj);
    
}
