    $("#ingresar").click(function(){ 
          var id_carrera=$("#id_carrera").val();   
          var id_sede=$("#id_sede").val();
          var id_jornada=$("#id_jornada").val();
          var id_paralelo=$('#id_paralelo').val();
          var token=$('#token').val();
          cadena="id_carrera="+id_carrera+
              "&id_sede="+id_sede+
              "&id_jornada="+id_jornada+
              "&id_paralelo="+id_paralelo;
              datos="";
        $.ajax({
          url:"http://localhost:8000/admin/asignacion",
          headers:{'X-CSRF-TOKEN':token},
          type:"POST",
          dataType:'json', 
          data:cadena,
          success:function(data){
                 mostrar();
                 mensajes();
            }
        });
});
function mostrar() {
  var datos="";
  var clase="";
  var clase1="";
  var nombre="";
  var ruta="http://localhost:8000/admin/datos";
  $.get(ruta,function(res){
      $(res).each(function(key,value){
          if (value.deleted_at==null) {
            var clase="btn-danger";
            var clase1="btn-default";
            var nombre="eliminar";
            var click="eliminar(this);";
            var desabilitar="";
          }else{
            var clase="btn-info";
            var nombre="restaurar";
            var click="restaurar(this);";
            var desabilitar="disabled='yes'";
          }
          datos+="<tr>";
          datos+="<td>"+value.nombreCarrera+"</td>";
          datos+="<td>"+value.nombre_sede+"</td>";
          datos+="<td>"+value.etiqueta+"</td>";
          datos+="<td>"+value.nombre_paralelo+"</td>";
          datos+="</td><td><button value="+value.id+" "+desabilitar+" OnClick='Mostrar(this);' class='btn btn-success' data-toggle='modal' data-target='#cantidad'>Editar</button>";
          datos+="</td><td><button value="+value.id+" OnClick='"+click+"' class='btn "+clase+"'>"+nombre+"</button></td></tr>";
          datos+="</tr>";    
          $("#datos").html(datos);  
      });
            
  }); 
}
function eliminar(btn) {
  var route="http://localhost:8000/admin/asignacion/"+btn.value+"";
  var token=$('#token').val();
  $.ajax({
          url:route,
          headers:{'X-CSRF-TOKEN':token},
          type:"DELETE",
          dataType:'json', 
          success:function(){
                mostrar();
            }
        });
}
$(document).ready(function(){
   mostrar();
});

function restaurar(btn) {
  var route="http://localhost:8000/admin/asignacion/"+btn.value+"/restaurar";
  var token=$('#token').val();
  $.ajax({
          url:route,
          headers:{'X-CSRF-TOKEN':token},
          type:"GET",
          dataType:'json', 
          success:function(){
                mostrar();
            }
        });
}
$(document).ready(function(){
   mostrar();
});
function mensajes() {
  var msj="";
  msj+="<div class='alert alert-primary alert-dismissable'>";
  msj+="<button type='button' class='close' data-dismiss='alert'>&times;</button>";
  msj+="<strong>Excelente!</strong> Datos Ingresados";
  msj+="</div>";
  $("#mensaje").html(msj);
    
}



