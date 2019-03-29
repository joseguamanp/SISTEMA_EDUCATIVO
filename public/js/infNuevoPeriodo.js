$('#divdatatable').attr('hidden','yes');
$("#chkseleccion").change(function () {
      $(".chktbody").prop('checked', $("#chkseleccion").prop("checked"));
 });

function buscarRegistros(){  
	var periodoAnterior = $('#id_periodoAnterior').val(); 
	if(periodoAnterior !== 0){
	  consultarRegistrosPeriodos(periodoAnterior, '/admin/academicoNuevoPeriodo/buscar');            
	}else {
		$('#datosChk').empty(); 
	}
}

function consultarRegistrosPeriodos(periodoAnterior, ruta){        
  var tbody;      
  headerAjax();
  $.ajax({
    url: ruta_global+ruta,
    type: 'post',          
    data: { 'periodoAnterior' : periodoAnterior },
    dataType: 'json',          
  }).done(function (resultado){    
  	console.log(resultado);                        
   	$('#datosChk').empty();   
   	for(var i = 0; i < resultado.length; i++){                
		  tbody +="<tr class='small'>";       
		  tbody +="<td>"+"<input type='checkbox' class='chktbody' name='chkperiodo[]' value="+resultado[i].id+">"+"</td>";
		  tbody +="<td>"+resultado[i].carrera+"</td>";                                  
		  tbody +="<td>"+resultado[i].sede+"</td>";                             
		  tbody +="<td>"+resultado[i].jornada+"</td>";
		  tbody +="<td>"+resultado[i].paralelo+"</td>";   		      
		  $("#datosChk").html(tbody);                  
      }       
  }).fail(function (resultado){  	
      alert('error');
  });           
}

function mostrarPeriodos(){
	var periodoNuevo = $('#id_nuevoPeriodo').val(); 
  var tbody;      
  headerAjax();
  $.ajax({
    url: ruta_global+"/admin/academicoNuevoPeriodo/mostrar",
    type: 'post',          
    data: { 'periodoNuevo' : periodoNuevo },
    dataType: 'json',          
  }).done(function (resultado){    
  	console.log(resultado);                        
   	$('#datos').empty();   
   	for(var i = 0; i < resultado.length; i++){                
		  tbody +="<tr class='small'>";       		  
		  tbody +="<td>"+resultado[i].carrera+"</td>";                                  
		  tbody +="<td>"+resultado[i].sede+"</td>";                             
		  tbody +="<td>"+resultado[i].jornada+"</td>";
		  tbody +="<td>"+resultado[i].paralelo+"</td>";   		                                  
		  tbody +="</tr>";    
		  $("#datos").html(tbody);                  
      }       
  }).fail(function (resultado){  	
      alert('error');
  });		
}

function registrarNuevoPeriodo(){  
	$('#mensaje').removeAttr('hidden');
	var periodoNuevo = $('#id_nuevoPeriodo').val();  	
	var periodoAnterior = $('#id_periodoAnterior').val();     
	if(periodoNuevo == 0){
		mensajes("Alerta","Debe seleccionar el nuevo periodo"); 
		$('#id_nuevoPeriodo').focus();
	}else if(periodoAnterior == 0){
		mensajes("Alerta","Debe seleccionar un periodo anterior"); 
		$('#id_periodoAnterior').focus();
	}else {
	  	var array= [];
		$('.chktbody').each(function(){
			if($(this).is(':checked')){
				array.push($(this).val());
			}
		});	
		array=array.toString();
		if (array==0){
			mensajes("Alerta","Debe seleccionar al menos un dato de la tabla"); 	
		}else {
			cadena="id_nuevoPeriodo="+periodoNuevo+
				"&chkperiodo="+array;		   
			headerAjax();    
			$.ajax({
		    	url: ruta_global+"/admin/academicoNuevoPeriodo",
			    type: 'post',          
			    data:cadena,
			    dataType: 'json',          
		  	}).done(function (resultado){   		  		     
		    	$('#divdatatable').removeAttr('hidden');    
		    	$('#divdataTableChk').attr('hidden','yes');			    	       
			    mensajes("Excelente","Registro guardado");			    			  			    
			    mostrarPeriodos();	
			    setTimeout(function(){window.location.reload(true);}, 3000);			    
		  	}).fail(function (resultado){
		     	alert('error');
		  	});
		}		 
	}		
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
