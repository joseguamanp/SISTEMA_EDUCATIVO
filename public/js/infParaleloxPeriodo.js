//infParaleloxPeriodo.js
//Mostra datos por busqueda por filtro para registrar los id de sede_jornada_carrera_paralelo en un periodo
function filtrarBusqueda(){
  var periodo = $('#id_periodo').val();
  var carrera = $('#id_carrera').val();    
  if(periodo.length !== 0 && carrera.length !== 0){
      obtenerRegistros(periodo, carrera, '/admin/academicoParaleloPeriodo/buscar');            
  }
}

function obtenerRegistros(periodo, carrera, ruta){        
  var tbody;      
  headerAjax();
  $.ajax({
    url: ruta_global+ruta,
    type: 'post',          
    data: { 'periodo' : periodo, 'carrera': carrera },
    dataType: 'json',          
  }).done(function (resultado){                            
      $('#datos').empty();                           
     for(var i = 0; i < resultado.length; i++){                
          tbody +="<tr class='small'>";                                         
          tbody +="<td>"+resultado[i].sede+"</td>";                             
          tbody +="<td>"+resultado[i].jornada+"</td>";
          tbody +="<td>"+resultado[i].paralelo+"</td>";   
          if (resultado[i].deleted_at == null) {
            tbody +="<td>"+"<button class='btn btn-danger btn-sm' value="+resultado[i].id+" id='btneliminar' onclick='eliminar(this.value);'>Desactivar</button>"+"</td>"                    
          }else{
            tbody +="<td>"+"<button class='btn btn-primary btn-sm' value="+resultado[i].id+" id='btnrestaurar' onclick='restaurar(this.value);'>Restaurar</button>"+"</td>"                    
          }                                
          tbody +="</tr>";    
          $("#datos").html(tbody);                  
      }  
  }).fail(function (resultado){
      alert('error');
  });           
}

function mostrarRegistos(){ 
    var carrera = $('#id_carrera').val();        
    var tbody;            
    headerAjax();            
    $.ajax({
      url:ruta_global+"/admin/academicoParaleloPeriodo/nuevo",      
      type:"POST",
      dataType:'json', 
      data: { 'carrera': carrera },      
    }).done(function (resultado){                                                
        $('#datos').empty();                                                               
          for(var i = 0; i < resultado.length; i++){          
            tbody +="<tr class='small'>";                            
            tbody +="<td>"+resultado[i].sede+"</td>";                             
            tbody +="<td>"+resultado[i].jornada+"</td>";
            tbody +="<td>"+resultado[i].paralelo+"</td>";                            
            tbody +="<td>"+"<button class='btn btn-primary btn-sm' value="+resultado[i].id+" id='btnregistrar' onclick='registrar(this.value);'>Registrar</button>"+"</td>"                    
            tbody +="</tr>";    
            $("#datos").html(tbody);                  
          }                                                  
    }).fail(function (resultado){
            alert('error');
    });
}

function registrar(id){
  $('#mensaje').removeAttr('hidden');
  var periodo = $('#id_periodo').val();
  var carrera = $('#id_carrera').val();
  var ruta = "/admin/academicoParaleloPeriodo";
  if(periodo.length == 0){        
    mensajes("Alerta","Debe seleccionar un periodo");    
    $('#id_periodo').focus();
  }else if(carrera.length == 0){
    mensajes("Alerta","Debe seleccionar una carrera");    
    $('#id_carrera').focus();
  }else {          
    headerAjax();    
      $.ajax({
        url: ruta_global+ruta,
        type: 'post',          
        data: { 'periodo' : periodo, 'psjc': id },
        dataType: 'json',          
      }).done(function (resultado){           
        console.log(resultado);         
        $('#datos').empty();                     
        mensajes("Excelente","Registro guardado");                                            
      }).fail(function (resultado){          
          alert('error');
      });       
  }
}

function eliminar(btn) {
  var ruta="/admin/academicoParaleloPeriodo/"+btn+"";  
  headerAjax();    
  $.ajax({
    url: ruta_global+ruta,      
    type:"DELETE",
    dataType:'json',         
  }).done(function (resultado){   
      filtrarBusqueda();                                                                    
    }).fail(function (resultado){
        alert('error');
    });
}

function restaurar(btn) {
  var ruta="/admin/academicoParaleloPeriodo/"+btn+"/restaurar";
  headerAjax();    
  $.ajax({
    url: ruta_global+ruta,   
    type:"GET",
    dataType:'json',           
  }).done(function (resultado){                                                
      filtrarBusqueda();                                                  
    }).fail(function (resultado){
        alert('error');
    });
}

function mensajes(alerta, msn) {
  var msj="";
  msj+="<div class='alert alert-danger alert-dismissable'>";
  msj+="<button type='button' class='close' data-dismiss='alert'>&times;</button>";
  msj+="<strong>¡"+alerta+"!</strong> "+msn;
  msj+="</div>";
  $("#mensaje").html(msj);  
  setTimeout(function(){$('#mensaje').attr('hidden', 'yes');}, 3000);
}

function headerAjax(){
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
}
